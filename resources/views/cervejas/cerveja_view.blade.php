@extends('adminlte::page')

@section('title', 'Virtual Pub')

@section('content_header')

@stop
@section('content')
<div class="row">
    <div class="col-md-3">   
        <!-- Profile Image -->
        <div class="box box-default">
            <div class="box-body box-profile">
            @php
                if (file_exists(public_path('fotos/'.$reg->id.'.jpg'))) {
                    $foto = '../fotos/'.$reg->id.'.jpg';
                } else {
                    $foto = '../images/avatar-placeholder.svg';
                }
            @endphp
                <img class="profile-user-img img-responsive" src="{{$foto}}" alt="{{$reg->nome}}">
        
                <h3 class="profile-username text-center">{{$reg->nome}}</h3>
        
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
                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header" style="background-color: {{$reg->color->hex}}">
            <h3 class="widget-user-username">Coloração</h3>
            <h5 class="widget-user-desc">{{$reg->color->nome}}</h5>
          </div>
          
          <div class="box-footer">
            <div class="row">
              <div class="col-sm-6 border-right">
                <div class="description-block">
                  <h5 class="description-header">{{$reg->EBC}}</h5>
                  <span class="description-text">Escala EBC (Convenção de Cervejeiros da Europa)</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-6 border-right">
                <div class="description-block">
                  <h5 class="description-header">{{$reg->SRM}}</h5>
                  <span class="description-text">Escala SRM (Metodo padrão de Referencia)</span>
                </div>
                <!-- /.description-block -->
              </div>
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.widget-user -->
      </div>
    
</div>
    @stop