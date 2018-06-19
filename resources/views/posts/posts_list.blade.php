@extends('adminlte::page')

@section('title', 'Virtual Pub ADMIN')

@section('content_header')
    @can('isMantenedor')
    <h2> Area do administrador </h2>
    @endcan
    @can('isFabricante')
    <h2>Sua Lista de Postagens Publicadas</h2>
    @endcan
    <div class="row">
        <div class="col-xl-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-beer"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">total de posts cadastradas</span>
                    <span class="info-box-number">{{ count($posts) }}</span>
                </div>
               
            </div>
        </div>
    </div>
@stop

@section('content')
        @if (count($posts)==0)

        <div class="col-sm-12">
            <div class="alert alert-success">
                Não há postagens com o filtro definido
            </div>
        </div>

        @endif

        @if (session('status'))

        <div class="alert alert-success">
        {{ session('status') }}
        </div>

        @endif
        
   <div class="row">
        <div class='col-sm-1'>
            <a href='{{route('posts.create')}}' class='btn btn-primary' 
               role='button'> Novo </a>
        </div>
    </div>

    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Lista</h3>
              </div>
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Cód.</th>
                            <th>Img</th>
                            <th>Descrição</th>
                            <th>Usuário</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        @php
                        if (file_exists(public_path('postimages/'.$post->id.'.jpg'))) {
                                $foto = '../postimages/'.$post->id.'.jpg';
                        }else {
                                $foto = '../images/avatar-placeholder.svg';
                        }
                        @endphp
                        <tr>
                            <td> {{$post->id}} </td>
                            <td><img src="{{$foto}}" alt="image" style="width:50px; height: 60px;"></td>
                            <td> {{$post->description}} </td>
                            <td> {{$post->user->name}} </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Ações <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('posts.show', $post->id) }}">Consultar</a></li>
                                        <li><a href="{{ route('posts.edit', $post->id) }}"> Alterar </a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="{{ route('posts.foto', $post->id) }}"> Alterar Foto </a></li>
                                    </ul>
                                </div>
                                <form style="display: inline-block"method="post" action="{{route('posts.destroy', $post->id)}}" onsubmit="return confirm('Confirma Exclusão?')">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <button type="submit"class="btn btn-danger centered"> Excluir </button>
                                </form>
                            </td>             
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </section> 
@stop

@section('js')
<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : true
    })
  })
</script>
@stop