@extends('adminlte::page')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-9">
      <!-- Widget: user widget style 1 -->
      <div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        @if($reg->isFabricante)
        <div class="widget-user-header bg-yellow-active">
          @else  
          <div class="widget-user-header bg-aqua-active">
            @endif    
            <h3 class="widget-user-username">@if($reg->isFabricante){{$reg->fabricante_name}}@else{{$reg->name}}@endif</h3>
            <h5 class="widget-user-desc">@if($reg->isFabricante) Website: 
                <a style="color: #fff;" target='_blank'  href='{{$reg->website}}'>
                    {{$reg->website}}</a>
                    @else email: {{$reg->email}}
                    @endif
                  </h5>
                  @if($reg->isOnline())  
                  <p><i class="fa fa-circle text-success"></i> Online</p>
                  @else
                  <p><i class="fa fa-circle text-danger"></i> offline</p>
                  @endif
                </div>
                <div class="widget-user-image">
                  <img class="img-circle" src="{{$reg->avatar}}" alt="User Avatar">
                  
                </div>
                <div class="box-footer">
                      <div class="text-center">
                          @if(Auth::user()->id != $reg->id)
                      
                          @if(Auth::user()->followings()->where('seguidor_id', $reg->id)->first())
                          <form style="display: inline-block"method="post" action="{{route('user.unfollow', $reg->id)}}" onsubmit="return confirm('Quer realmente deixar deseguir este usuário?')">   
                              {{ csrf_field() }}
                              <button type="submit"class="btn btn-success centered"> seguindo </button>
                          </form>
                          @else
                            <form style="display: inline-block"method="post" action="{{route('user.follow', $reg->id)}}" onsubmit="return confirm('Deseja seguir este usuário?')">   
                                {{ csrf_field() }}
                                <button type="submit"class="btn btn-primary centered"> seguir </button>
                              </form>
                              @endif
                        @endif
                      </div>
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">{{$seguindo->count()}}</h5>
                      <span class="description-text">SEGUINDO</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                    <h5 class="description-header">{{$seguidores->count()}}</h5>
                      <span class="description-text">SEGUIDORES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">

                      @if($reg->isFabricante)
                      <h5 class="description-header">{{$cervejas->count()}}</h5>
                      <span class="description-text">CERVEJAS CADASTRADAS</span>
                      <br>
                      <span class="description-text"><a href="#" data-toggle="control-sidebar">VISUALIZAR LISTA</a></span>
                      @else
                      <h5 class="description-header">{{$reg->favoritas->count()}}</h5>
                      <span class="description-text">CERVEJAS FAVORITAS</span>
                      @endif
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <div class="row">
                  <div class="col-sm-12 border-top">
                    <div class="description-block">
                      @if(Auth::user()->id == $reg->id)
                      <h5 class="description-header">SOBRE </h5><p>[<a href="{{route('users.edit', $reg->id)}}">editar informações de conta</a>]</p>
                      @else
                      <h5 class="description-header">SOBRE</h5>
                      @endif
                      <span class="description-text">{{$reg->sobre}}</span>
                    
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
    </div>
    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-9 blog-post" >
          <!-- Box Comment -->
          <div class="box box-widget post" data-postid="{{ $post->id }}">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="{{$reg->avatar}}" alt="User Image">
                <span class="username"><a href="#">{{$reg->name}}</a></span>
                <span class="description">Publicado dia {{date_format($post->created_at, 'd/m/Y')}} às {{date_format($reg->created_at, 'H:i')}}</span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
                  <i class="fa fa-circle-o"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  @php
                  if (file_exists(public_path('postimages/'.$post->id.'.jpg'))) {
                      $fotopost = '../postimages/'.$post->id.'.jpg';
                      echo "<center><img class='img-responsive pad' src='$fotopost' alt='Photo'></center>";
                  } else {
                      echo "";
                  }
                  @endphp
              <p>{{$post->description}}</p>
              
              @include('laravelLikeComment::like', ['like_item_id' => $post->id])
            </div>
            <!-- /.box-body -->
            <div class="box-footer box-comments">
              @include('laravelLikeComment::comment', ['comment_item_id' => $post->id])
                
              
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
             
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        @endforeach
      </div>
    </div>
</div>


<aside class="control-sidebar control-sidebar-dark">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
 
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Cervejas de {{$reg->fabricante_name}}</li>
      @foreach($cervejas as $c)
      <div class="user-panel">
          @php
          if (file_exists(public_path('fotos/'.$c->id.'.jpg'))) {
          $fotocerveja = '../fotos/'.$c->id.'.jpg';
          } else {
          $fotocerveja = '../images/avatar-placeholder.svg';
          }
          @endphp
         <li>
           <a href="{{route('cervejas.show',$c->id)}}">
            <i class="fa fa-beer" style="color: {{$c->color->hex}};"></i>
            <span>{{$c->nome}}</span>
          </a>
        </li>
      </div>
      @endforeach
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>

@stop
@section('js')
<script>
    $("#my-toggle-button").controlSidebar(options);
</script>

@stop