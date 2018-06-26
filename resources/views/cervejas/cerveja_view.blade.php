@extends('adminlte::page')

@section('title', 'Virtual Pub')

@section('content_header')

@stop
@section('content')
<div class="row">
  <div class="col-sm-12 col-md-3">
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
        <a href="{{route('users.show', $reg->fabricante->id)}}"><p class="text-muted text-center">{{$reg->fabricante->fabricante_name}}</p></a>
        <center><div class="icon text-yellow">
          <h3>
            <i class="fa fa-beer-sm"></i>
            <i class="fa fa-beer"></i>
            <i class="fa fa-beer"></i>
            <i class="fa fa-beer"></i>
            <i class="fa fa-beer"></i>
          </h3>
        </div>
      </center>
      <p>{{$reg->descricao}}</p>
        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
             <b>Álcool por Volume</b> <a class="pull-right">{{$reg->ABV}}%</a>
          </li>
          <li class="list-group-item">
            <b>Unidade Internacional de Amargor</b> <a class="pull-right">{{$reg->IBU}}</a>
          </li>
        </ul>
        <p>Unidades de Referência de Coloração</p>
        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
             <b>Método Padrão de Referência</b> <a class="pull-right">{{$reg->SRM}}</a>
          </li>
          <li class="list-group-item">
            <b>Convenção Europeia de Cervejaria (EBC)</b> <a class="pull-right">{{$reg->EBC}}</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-md-9">
    <div class="small-box" style="color: #fff; background-color: {{$reg->color->hex}}">
        <div class="inner">
          <h3>{{$reg->color->nome}}</h3>
          <p>Coloração</p>
        </div>
        <div class="icon">
          <i class="fa fa-beer"></i>
        </div>
        <p class="small-box-footer">
          &nbsp;
        </p>
    </div>
  </div>
  <div class="col-sm-12 col-md-4">
    <div class="box box-default collapsed-box box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Estilo</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <b>{{$reg->estilo->nome}}</b>
        <p>{{$reg->estilo->descricao}}</p>
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-md-1">
    
  </div>
  <div class="col-sm-12 col-md-4">
    <div class="box box-default collapsed-box box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Copo Ideal</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
          </button>
        </div>
      </div>
      <div class="box-body">
        <b>{{$reg->copo->nome}}</b>
        @php
        if (file_exists(public_path('coposimg/'.$reg->id.'.jpg'))) {
            $fotocopo = '../coposimg/'.$reg->id.'.jpg';
            echo "<center><img class='img-responsive pad' src='$fotocopo' alt='Photo'></center>";
        } else {
            echo "";
        }
        @endphp
        <p>{{$reg->copo->descricao}}</p>
      </div>
    </div>
  </div>
</div>
@stop