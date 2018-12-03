@extends('adminlte::page')

@section('title', 'Busca cerveja')

@section('content_header')

@if (count($cervejas)==0)
    <div class="alert alert-danger">
        Não há cervejas com os filtros informados...
    </div>
    @endif    


@stop

@section('content')
<div class="row">
      @foreach($cervejas as $c)
      <div class="col-sm-12 col-md-4">
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
                  @if($c->fabricante_name != null)
                  <a href="{{route('users.show', $c->fabricante->id)}}">
                    <p class="text-muted text-center">{{$c->fabricante->fabricante_name}}</p>
                  </a>
                  @else
                  <p>desconhecido</p>
                  @endif
                  <ul class="list-group list-group-unbordered">
                      <li class="list-group-item">
                          <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $c->averageRating }}" data-size="xs" disabled="">
                      </li>
                  
                  </ul>
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item text-center">
                      <a type="button" href="{{ route('cervejas.show', $c->id)}}" class="btn btn-success centered">Mais Informações</a>
                    </li>
                    <li class="list-group-item text-center">
                      @if(Auth::user()->favoritas()->where('cerveja_id', $c->id)->first())
        <form style="display: inline-block"method="post" action="{{route('cerveja.desfazer', $c->id)}}" onsubmit="return confirm('Quer realmente desfazer?')">   
            {{ csrf_field() }}
            <button type="submit"class="btn bg-teal-active centered"> favoritada </button>
        </form>
        @else
          <form style="display: inline-block"method="post" action="{{route('cerveja.favoritar', $c->id)}}" onsubmit="return confirm('Deseja fazoritar esta cerveja?')">   
              {{ csrf_field() }}
              <button type="submit"class="btn bg-navy centered"> favoritar </button>
          </form>
        @endif
                    </li>
                  </ul>
              </div>
          </div>
      </div>
      @endforeach
      {{$cervejas->links()}}
</div>
    
@stop
@section('js')
<script type="text/javascript">

  $("#input-id").rating();

</script>
@stop