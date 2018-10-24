@extends('adminlte::page')

@section('title', 'Busca cerveja')

@section('content_header')

@if (count($users)==0)
    <div class="alert alert-danger">
        Não há usuários na lista...
    </div>
    @endif

@stop

@section('content')
<div class="row">
@foreach($users as $reg)
<div class="col-sm 12 col-md-3">
    <!-- Widget: user widget style 1 -->
  <div class="box box-widget widget-user">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      @if($reg->isFabricante)
    <div class="widget-user-header bg-yellow-active">
      @else  
    <div class="widget-user-header bg-aqua-active">
      @endif    
      <h3 class="widget-user-username">@if($reg->isFabricante){{$reg->fabricante_name}}@else{{$reg->name}}@endif</h3>    
    </div>
    <div class="widget-user-image">
      <img class="img-circle" src="{{$reg->avatar}}" alt="User Avatar">
    </div>
      
    <div class="row">
      <div class="col-sm-6 border-right">
        <div class="description-block">
          <h5 class="description-header">{{$reg->followings()->count()}}</h5>
          <span class="description-text">SEGUINDO</span>
        </div>
                  <!-- /.description-block -->
      </div>
                <!-- /.col -->
      <div class="col-sm-6 border-right">
        <div class="description-block">
        <h5 class="description-header">{{$reg->followers()->count()}}</h5>
          <span class="description-text">SEGUIDORES</span>
        </div>
        <!-- /.description-block -->
      </div>
                
        
                <!-- /.col -->
    </div>
    <div class="row">
      <div class="description-block text-center">
        <a type="button" href="{{ route('profile.show', $reg->id)}}" class="btn btn-success centered"> visualizar perfil</a>
      </div>
              
              <!-- /.row -->
    </div>
  </div>
          <!-- /.widget-user -->
</div>
@endforeach
</div>
@stop