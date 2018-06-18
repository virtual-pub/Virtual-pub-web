@extends('adminlte::page')

@section('title', 'Virtual Pub')

@section('content_header')

@stop
@section('content')
<div class="row">
    <div class="col-md-3">
        
        <!-- Profile Image -->
        <div class="box box-warning">
            <div class="box-body box-profile">
            @php
                if (file_exists(public_path('fotos/'.$reg->id.'.jpg'))) {
                    $foto = '../fotos/'.$reg->id.'.jpg';
                } else {
                    $foto = '../images/avatar-placeholder.svg';
                }
            @endphp
        <img class="profile-user-img img-responsive" src="{{$foto}}" alt="{{$reg->nome}}">
        
            <h3 class="profile-username text-center" style="color: {{$reg->color->Tonalidade}}">{{$reg->nome}}</h3>
        
        <p class="text-muted text-center">{{$reg->fabricante->fabricante_name}}</p>
        
        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>Álcool por Volume</b> <a class="pull-right">{{$reg->ABV}}%</a>
            </li>
            <li class="list-group-item">
                <b>Unidade Internacional de Amargor</b> <a class="pull-right">{{$reg->IBU}}</a>
            </li>
            <li class="list-group-item">
                <b>Copo Ideal</b> <a class="pull-right">{{$reg->copo->nome}}</a>
            </li>
        </ul>
        <p class="text-muted text-center">Coloração</p>
        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>Escala EBC (Convenção de Cervejeiros da Europa)</b> <a class="pull-right">{{$reg->EBC}}</a>
            </li>
            <li class="list-group-item">
                <b>Escala SRM (Metodo padrão de Referencia)</b> <a class="pull-right">{{$reg->SRM}}</a>
            </li>
            <li class="list-group-item">
                <b>Tonalidade</b><a class="pull-right">{{$reg->color->nome}}</a>
            </li>
            <li class="list-group-item">
                
            <div class="text-center" style="height: 60px; background-color: {{$reg->color->Tonalidade}}; color: white;"></div>
            </li>
        </ul>
       
        
        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
    
    <div class="col-sm-3">
        
        <img />
    </div>
    
</div>
    @stop