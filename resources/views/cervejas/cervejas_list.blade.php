@extends('adminlte::page')

@section('title', 'Virtual-Pub | Cervejas')

@section('content_header')

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
        
 
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    @can('isMantenedor')
                    <h3 class="box-title"> Cervejas </h3>
                    @endcan
                    @can('isFabricante')
                    <h3 class="box-title">Sua Lista de Cervejas Cadastradas</h3>
                    @endcan
                    @cannot('isUser')
                    <div class="box-tools">
                        <div class="btn-group">
                            <a href='{{route('cervejas.create')}}' class='btn btn-primary' role='button'> Novo </a>
                        </div>
                    </div>
                    @endcannot
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
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
                                @cannot('isUser')
                                <th>ativado</th>
                                @endcannot
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cervejas as $cerveja)
                            @php
                                if (file_exists(public_path('fotos/'.$cerveja->id.'.jpg'))) {
                                    $foto = '../fotos/'.$cerveja->id.'.jpg';
                                } else {
                                    $foto = '../images/beer-placeholder.svg';
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
                                <td><div class="pull-left cor" style="background-color: {{$cerveja->color->hex}}"></div><p>{{$cerveja->color->nome}}</p></td>
                                <td> {{$cerveja->copo->nome}} </td>
                                <td> {{$cerveja->fabricante->fabricante_name}} </td>
                                @cannot('isUser')
                                <td> <input type="checkbox" value="" id="{{ $cerveja->id }}"onclick="window.location.href ='{{route('cervejas.ativar', $cerveja->id)}}'" style="width:25px; height:25px"> </td>
                                <script>
                                    document.getElementById(<?= $cerveja->id ?>).checked = (<?= $cerveja->ativo === 1 ?>);
                                </script>
                                @endcannot
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Ações <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('cervejas.show', $cerveja->id) }}">Consultar</a></li>
                                            @cannot('isUser')
                                            <li><a href="{{ route('cervejas.edit', $cerveja->id) }}"> Alterar </a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="{{ route('cervejas.foto', $cerveja->id) }}"> Alterar Foto </a></li>
                                            @endcannot
                                        </ul>
                                    </div>
                                    @cannot('isUser')
                                    <form style="display: inline-block"method="post" action="{{route('cervejas.destroy', $cerveja->id)}}" onsubmit="return confirm('Confirma Exclusão?')">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <button type="submit"class="btn btn-danger centered"> Excluir </button>
                                    </form>
                                    @endcannot
                                </td>
                                         
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    <div class="pull-right">{{ $cervejas->links() }}</div> 
                </div>
            </div>
          </div>
        </div>
    </section> 
@stop