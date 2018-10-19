@extends('adminlte::page')

@section('title', 'Virtual-Pub | Estilos')

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
                <h3 class="box-title"> Estilos </h3>
                <div class="box-tools">
                        <div class="btn-group">
                        <a href='{{route('estilos.create')}}' class='btn btn-primary' 
                        role='button'> Novo </a>
                        </div>
                    </div>
              </div>
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Cód.</th>
                            <th>nome</th>
                            <th>descrição</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($estilos as $estilo)
                        <tr>
                            <td> {{$estilo->id}} </td>
                            <td> {{$estilo->nome}} </td>
                            <td> {{$estilo->descricao}} </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Ações <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('estilos.edit', $estilo->id) }}"> Alterar </a></li>
                                    </ul>
                                </div>
                                <form style="display: inline-block"method="post" action="{{route('estilos.destroy', $estilo->id)}}" onsubmit="return confirm('Confirma Exclusão?')">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <button type="submit"class="btn btn-danger centered"> Excluir </button>
                                </form>
                            </td>             
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pull-right">{{ $estilos->links() }}</div> 
              </div>
            </div>
          </div>
        </div>
    </section> 
@stop

