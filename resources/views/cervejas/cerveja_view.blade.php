@extends('adminlte::page')

@section('title', 'Virtual Pub')

@section('content_header')

@stop
@section('content')
<div class="row">
    <div class="col-md-3">
        
        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
            @php
                if (file_exists(public_path('fotos/'.$reg->id.'.jpg'))) {
                    $foto = '../fotos/'.$reg->id.'.jpg';
                } else {
                    $foto = '../images/avatar-placeholder.svg';
                }
            @endphp
        <img class="profile-user-img img-responsive" src="{{$foto}}" alt="{{$reg->nome}}">
        
        <h3 class="profile-username text-center">{{$reg->name}}</h3>
        
        <p class="text-muted text-center">{{$reg->fabricante->fabricante_name}}</p>
        
        <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>Álcool por Volume</b> <a class="pull-right">{{$reg->ABV}}%</a>
            </li>
            <li class="list-group-item">
                <b>Following</b> <a class="pull-right">543</a>
            </li>
          <li class="list-group-item">
              <b>Friends</b> <a class="pull-right">13,287</a>
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