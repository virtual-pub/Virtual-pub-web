@extends('adminlte::page')

@section('title', 'Virtual-Pub | Copos')

@section('content_header')
    
@stop

@section('content')
        
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
                        <h3 class="box-title">Copos</h3>
                        <div class="box-tools">
                            <div class="btn-group">
                                <a href='{{route('copos.create')}}' class='btn btn-primary' role='button'> Novo </a>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Cód.</th>
                                    <th>Imagem</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($copos as $copo)
                                @php
                                    if (file_exists(public_path('coposimg/'.$copo->id.'.jpg'))) {
                                        $foto = '../coposimg/'.$copo->id.'.jpg';
                                    } else {
                                        $foto = '../images/glass-placeholder.svg';
                                }
                                @endphp
                                <tr>
                                    <td> {{$copo->id}} </td>
                                    <td><img src="{{$foto}}" alt="{{$copo->nome}}" style="width:50px; height: 60px;"></td>
                                    <td> {{$copo->nome}} </td>
                                    <td> {{$copo->descricao}} </td>                               
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  Ações <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ route('copos.edit', $copo->id) }}"> Alterar </a></li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="{{ route('copos.foto', $copo->id) }}"> Alterar Foto </a></li>
                                            </ul>
                                        </div>
                                        <form style="display: inline-block"method="post" action="{{route('copos.destroy', $copo->id)}}" onsubmit="return confirm('Confirma Exclusão?')">
                                            {{ method_field('delete') }}
                                            {{ csrf_field() }}
                                            <button type="submit"class="btn btn-danger centered"> Excluir </button>
                                        </form>
                                    </td>             
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pull-right">{{ $copos->links() }}</div>    
                    </div>
                </div>
            </div>
        </div>
    </section> 
@stop