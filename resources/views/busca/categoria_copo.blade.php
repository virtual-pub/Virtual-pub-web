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
              
                    @foreach ($dados as $d)
                    <a class="btn bg-navy" href="{{route('search.copo', $d->id)}}"> {{$d->nome}} </a>
                    <br>
                    <br>
                @endforeach
            </div>
          </div>
        </div>
    </section> 
@stop

