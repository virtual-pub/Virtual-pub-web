@extends('adminlte::page')

@section('title', 'Virtual-Pub | Publicações')

@section('content_header')
    
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
        

    <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        @can('isMantenedor')
                        <h3 class="box-title"> publicações </h3>
                        @endcan
                        @can('isFabricante')
                        <h3 class="box-title">Sua Lista de publicações Cadastradas</h3>
                        @endcan
                        <div class="box-tools">
                            <div class="btn-group">
                                <a href='{{route('posts.create')}}' class='btn btn-primary' role='button'> Novo </a>
                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
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
                                            @if($post->user->id == Auth::user()->id)
                                                <li><a href="{{ route('posts.edit', $post->id) }}"> Alterar </a></li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="{{ route('posts.foto', $post->id) }}"> Alterar Foto </a></li>
                                            @endif
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
                    <div class="box-footer">
                        <div class="pull-right">{{ $posts->links() }}</div> 
                    </div>
                </div>
            </div>
        </div>
    </section> 
@stop