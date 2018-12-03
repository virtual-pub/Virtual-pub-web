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
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{count($reg->favoritas())}}</h3>

            <p>Cervejas Favoritas</p>
          </div>
          <div class="icon">
            <i class="fa fa-star-o"></i>
          </div>
          <a href="{{route('cervejas.favoritas')}}" class="small-box-footer">
            Ver Lista <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <!-- USERS LIST -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Seguidores</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <ul class="users-list clearfix">
                  @foreach ($seguidores as $seguidores)
                  <li>
                    <img class="img-circle" width="128px" src="{{$seguidores->avatar}}" alt="User Image">
                    @if ($seguidores->isFabricante)
                    <a class="users-list-name" href="{{route('profile.show',$seguidores->id)}}">{{$seguidores->fabricante_name}}</a>
                    @else    
                    <a class="users-list-name" href="{{route('profile.show',$seguidores->id)}}">{{$seguidores->name}}</a>
                    @endif
                  </li>
                  @endforeach
                </ul>
                <!-- /.users-list -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer text-center">
                <a href="{{route('seguidores')}}" class="uppercase">ver quem está te seguindo</a>
              </div>
              <!-- /.box-footer -->
            </div>
            <!--/.box -->
          </div>
        <div class="col-md-6">
            <!-- USERS LIST -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Usuários Seguidos</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <ul class="users-list clearfix">
                  @foreach ($seguidos as $seguidos)
                  <li>
                    <img class="img-circle" width='128px' src="{{$seguidos->avatar}}" alt="User Image">
                    @if ($seguidos->isFabricante)
                    <a class="users-list-name" href="{{route('profile.show',$seguidos->id)}}">{{$seguidos->fabricante_name}}</a>
                    @else    
                    <a class="users-list-name" href="{{route('profile.show',$seguidos->id)}}">{{$seguidos->name}}</a>
                    @endif
                  </li>
                  @endforeach
                </ul>
                <!-- /.users-list -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer text-center">
                <a href="{{route('seguidos')}}" class="uppercase">ver quem você está seguindo</a>
              </div>
              <!-- /.box-footer -->
            </div>
            <!--/.box -->
          </div>
    
    
    
        </div>
    <div class="row">
        <h4>Recomendações de Cerveja</h4>
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
                            <div class="btn-group">
                            <a type="button" href="{{ route('cervejas.show', $c->id)}}" class="btn btn-success centered">Mais Informações</a>                         
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
                            </div>
                          </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
    </div>

</div>
@stop