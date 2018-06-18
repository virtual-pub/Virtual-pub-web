@extends('adminlte::page')

@section('title', 'Virtual Pub ADMIN')

@section('content_header')
    @can('isMantenedor')
    <h2> Area do administrador </h2>
    @endcan
    @can('isFabricante')
    <h2>Sua Lista de Cervejas Cadastradas</h2>
    @endcan
    <div class="row">
        <div class="col-xl-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-beer"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">total de cervejas cadastradas</span>
                    <span class="info-box-number">{{ count($cervejas) }}</span>
                </div>
               
            </div>
        </div>
    </div>
@stop

@section('content')
        @if (count($cervejas)==0)

        <div class="col-sm-12">
            <div class="alert alert-success">
                Não há cervejas com o filtro definido
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
            <a href='{{route('cervejas.create')}}' class='btn btn-primary' 
               role='button'> Novo </a>
        </div>
    </div>

    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Hover Data Table</h3>
              </div>
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Cód.</th>
                            <th>img</th>
                            <th>nome</th>
                            <th>IBU</th>
                            <th>ABV</th>
                            <th>SRM</th>
                            <th>EBC</th>
                            <th>Estilo</th>
                            <th>Coloração</th>
                            <th>Copo</th>
                            <th>Fabricante</th>
                            <th>ativado</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cervejas as $cerveja)
                        @php
                            if (file_exists(public_path('fotos/'.$cerveja->id.'.jpg'))) {
                                $foto = '../fotos/'.$cerveja->id.'.jpg';
                            } else {
                                $foto = '../images/avatar-placeholder.svg';
                        }
                        @endphp
                        <tr>
                            <td> {{$cerveja->id}} </td>
                            <td><img src="{{$foto}}" alt="{{$cerveja->nome}}" style="width:50px; height: 60px;"></td>
                            <td> {{$cerveja->nome}} </td>
                            <td> {{$cerveja->IBU}} </td>
                            <td> {{$cerveja->ABV}}%</td>
                            <td> {{$cerveja->SRM}} </td>
                            <td> {{$cerveja->EBC}} </td>
                            <td> {{$cerveja->estilo->nome}} </td>
                            @section('css')
                                <link rel="stylesheet" href="{{ asset('css/style.css') }}">
                            @stop
                            <td><div class="pull-left cor" style="background-color: {{$cerveja->color->Tonalidade}}"></div><p>{{$cerveja->color->nome}}</p></td>
                            <td> {{$cerveja->copo->nome}} </td>
                            <td> {{$cerveja->fabricante->fabricante_name}} </td>
                            <td> <input type="checkbox" value="" id="{{ $cerveja->id }}"onclick="window.location.href ='{{route('cervejas.ativar', $cerveja->id)}}'" style="width:25px; height:25px"> </td>
                            <script>
                                document.getElementById(<?= $cerveja->id ?>).checked = (<?= $cerveja->ativo === 1 ?>);
                            </script>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Ações <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('cervejas.show', $cerveja->id) }}">Consultar</a></li>
                                        <li><a href="{{ route('cervejas.edit', $cerveja->id) }}"> Alterar </a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="{{ route('cervejas.foto', $cerveja->id) }}"> Alterar Foto </a></li>
                                    </ul>
                                </div>
                                <form style="display: inline-block"method="post" action="{{route('cervejas.destroy', $cerveja->id)}}" onsubmit="return confirm('Confirma Exclusão?')">
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