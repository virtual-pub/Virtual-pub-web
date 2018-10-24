@extends('adminlte::page')

@section('title', 'Busca cerveja')

@section('content_header')

@if (count($cervejas)==0)
    <div class="alert alert-danger">
    Você Não favoritou nenhuma cerveja!
    </div>
    @endif

@stop

@section('content')
@foreach($cervejas as $reg)
<div class="row">
<div class="col-sm-12 col-md-4">
  <div class="box box-warning">
      <div class="box-body box-profile">
          @php
          if (file_exists(public_path('fotos/'.$reg->id.'.jpg'))) {
          $foto = '../fotos/'.$reg->id.'.jpg';
          } else {
          $foto = '../images/beer-placeholder.svg';
          }
          @endphp
          <img class="profile-user-img img-responsive" src="{{$foto}}" alt="{{$reg->nome}}">
          <h3 class="profile-username text-center">{{$reg->nome}}</h3>
          <a href="{{route('users.show', $reg->fabricante->id)}}"><p class="text-muted text-center">{{$reg->fabricante->fabricante_name}}</p></a>
          <p>{{$reg->descricao}}</p>
          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $reg->averageRating }}" data-size="xs" disabled="">
            </li>
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
            <li class="list-group-item text-center">
              <a type="button" href="{{ route('cervejas.show', $reg->id)}}" class="btn btn-success centered">Mais Informações</a>
            </li>
          </ul>
      </div>
  </div>
</div>
@endforeach
</div>
@stop
@section('js')
<script type="text/javascript">

  $("#input-id").rating();

</script>
@stop