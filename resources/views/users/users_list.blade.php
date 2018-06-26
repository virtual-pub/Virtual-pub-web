@extends('adminlte::page')

@section('title', 'Virtual Pub ADMIN')

@section('content_header')

@stop

@section('content')
        @if (count($users)==0)

        <div class="col-sm-12">
            <div class="alert alert-success">
                Não há users com o filtro definido
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
                    <h3 class="box-title"> users </h3>
                    @endcan
                    
                    
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Cód.</th>
                                <th>nome</th>
                                <th>email</th>
                                <th>mantenedor</th>
                                <th>fabricante</th>
                                <th>user</th>
                                <th>visualizar</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td> {{$user->id}} </td>
                                <td> {{$user->name}} </td>
                                <td> {{$user->email}} </td>
                                <td> <input type="checkbox" {{ $user->isMantenedor() ? 'checked' : '' }} id="{{ $user->id }}" onclick="window.location.href ='{{route('users.isMantenedor', $user->id)}}'" style="width:25px; height:25px"> </td>
                                <td> <input type="checkbox" {{ $user->isFabricante() ? 'checked' : '' }} id="{{ $user->id }}" onclick="window.location.href ='{{route('users.isFabricante', $user->id)}}'" style="width:25px; height:25px"> </td>
                                <td> <input type="checkbox" {{ $user->isUser() ? 'checked' : '' }} id="{{ $user->id }}" onclick="window.location.href ='{{route('users.isUser', $user->id)}}'" style="width:25px; height:25px"> </td>
                                <td><a href='{{route('users.show', $user->id)}}' class='btn btn-primary' role='button'> perfil </a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">{{ $users->links() }}</div> 
                </div>
            </div>
          </div>
        </div>
    </section> 
@stop