@extends('adminlte::page')

@section('title', 'Virtual-Pub | '.$reg->nome)

@section('content_header')

@stop
@section('content')
<div class="row">
  <div class="col-sm-12 col-md-3">
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
        <center>
            <form action="{{ route('cerveja.rating') }}" method="POST">
                {!! csrf_field() !!}
            <div class="rating">

                <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $reg->userAverageRating }}" data-size="xs">
                <input type="hidden" name="id" required="" value="{{ $reg->id }}">
                <br>
                <button class="btn btn-success">Avaliar</button>

            </div>
          </form>
      </center>
      <br>
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
          <li class="list-group-item">
              <div class="text-center">
                 
              
                  @if(Auth::user()->favoritas()->where('cerveja_id', $reg->id)->first())
                  <form style="display: inline-block"method="post" action="{{route('cerveja.desfazer', $reg->id)}}" onsubmit="return confirm('Quer realmente desfazer?')">   
                      {{ csrf_field() }}
                      <button type="submit"class="btn btn-success centered"> favoritada </button>
                  </form>
                  @else
                    <form style="display: inline-block"method="post" action="{{route('cerveja.favoritar', $reg->id)}}" onsubmit="return confirm('Deseja fazoritar esta cerveja?')">   
                        {{ csrf_field() }}
                        <button type="submit"class="btn btn-primary centered"> favoritar </button>
                    </form>
                      @endif
                
              </div>
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
        if (file_exists(public_path('coposimg/'.$reg->copo->id.'.jpg'))) {
            $fotocopo = '../coposimg/'.$reg->copo->id.'.jpg';
            echo "<center><img class='img-responsive pad' src='$fotocopo' alt='Photo'></center>";
        } else {
            echo "";
        }
        @endphp
        <p>{{$reg->copo->descricao}}</p>
      </div>
    </div>
  </div>
  <div class="col-sm-12">
      <div class="box-footer">
          
        </div>
  </div>
</div>
@stop
@section('js')
<script type="text/javascript">

  $("#input-id").rating();

</script>
@stop