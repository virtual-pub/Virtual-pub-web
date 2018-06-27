@extends('adminlte::page')

@section('title', 'Virtual-Pub | Cores')

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
                <h3 class="box-title"> Colorações </h3>
                <div class="box-tools">
                    <div class="btn-group">
                        <a href='{{route('colors.create')}}' class='btn btn-primary' role='button'> Novo </a>
                    </div>
                </div>
              </div>
              <div class="box-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Cód.</th>
                            <th>nome</th>
                            <th>hex</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($colors as $color)
                        <tr>
                            <td> {{$color->id}} </td>
                            <td> {{$color->nome}} </td>
                            <td style="background-color: {{$color->hex}}; color:white"> {{$color->hex}} </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Ações <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('colors.edit', $color->id) }}"> Alterar </a></li>
                                    </ul>
                                </div>
                                <form style="display: inline-block"method="post" action="{{route('colors.destroy', $color->id)}}" onsubmit="return confirm('Confirma Exclusão?')">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <button type="submit"class="btn btn-danger centered"> Excluir </button>
                                </form>
                            </td>             
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pull-right">{{ $colors->links() }}</div> 
              </div>
            </div>
          </div>
        </div>
    </section> 
@stop

