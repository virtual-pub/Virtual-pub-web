@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-body">
               
            </div>
        </div>
    </div>
  
    
    <div class="row">
        <h3>Recomendações de Cerveja</h3>
            @foreach($cervejas as $c)
            <div class="col-sm-12 col-md-3">
                <div class="box box-warning">
                    <div class="box-body box-profile">
                        @php
                        if (file_exists(public_path('fotos/'.$c->id.'.jpg'))) {
                        $foto = '../fotos/'.$c->id.'.jpg';
                        } else {
                        $foto = '../images/beer-placeholder.svg';
                        }
                        @endphp
                        <img class="profile-user-img img-responsive" src="{{$foto}}" alt="{{$c->nome}}">
                        <h3 class="profile-username text-center">{{$c->nome}}</h3>
                        <a href="{{route('users.show', $c->fabricante->id)}}"><p class="text-muted text-center">{{$c->fabricante->fabricante_name}}</p></a>
                        <p>{{$c->descricao}}</p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $c->averageRating }}" data-size="xs" disabled="">
                            </li>
                          <li class="list-group-item">
                             <b>Álcool por Volume</b> <a class="pull-right">{{$c->ABV}}%</a>
                          </li>
                          <li class="list-group-item">
                            <b>Unidade Internacional de Amargor</b> <a class="pull-right">{{$c->IBU}}</a>
                          </li>
                        </ul>
                        <p>Unidades de Referência de Coloração</p>
                        <ul class="list-group list-group-unbordered">
                          <li class="list-group-item">
                             <b>Método Padrão de Referência</b> <a class="pull-right">{{$c->SRM}}</a>
                          </li>
                          <li class="list-group-item">
                            <b>Convenção Europeia de Cervejaria (EBC)</b> <a class="pull-right">{{$c->EBC}}</a>
                          </li>
                          <li class="list-group-item text-center">
                            <a type="button" href="{{ route('cervejas.show', $c->id)}}" class="btn btn-success centered">Mais Informações</a>
                          </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
    </div>

</div>
@stop