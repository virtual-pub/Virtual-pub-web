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
                      <h5 class="description-header">35</h5>
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
              <div class="interaction">
                <a href="#" class="btn btn-xs btn-warning like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'curtiu' : 'curtir' : 'curtir'  }}</a>
              </div>
              
            </div>
            <!-- /.box-body -->
            <div class="box-footer box-comments">
              <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="{{$reg->avatar}}" alt="User Image">
                <div class="comment-text">
                      <span class="username">
                        {{$reg->nome}}
                        <span class="text-muted pull-right">{{date_format($post->created_at, 'd/m/Y')}} às {{date_format($reg->created_at, 'H:i')}}</span>
                      </span><!-- /.username -->
                  Exemplo de comentário.
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
              <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="{{$reg->avatar}}" alt="User Image">
                <div class="comment-text">
                      <span class="username">
                        {{$reg->nome}}
                        <span class="text-muted pull-right">{{date_format($post->created_at, 'd/m/Y')}} às {{date_format($reg->created_at, 'H:i')}}</span>
                      </span><!-- /.username -->
                  Exemplo de comentário 2.
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
              <form action="#" method="post">
                <img class="img-responsive img-circle img-sm" src="{{$reg->avatar}}" alt="Alt Text">
                <!-- .img-push is used to add margin to elements next to floating images -->
                <div class="img-push">
                  <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                </div>
              </form>
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

@endsection
@section('js')
<script>
    $("#my-toggle-button").controlSidebar(options);
</script>
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <!-- Include all compiled plugins (below), or include individual files as needed -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 <script src="{{ asset('/js/like.js') }}"></script>
 <script>
   var token = '{{ Session::token() }}';
   var urlLike = '{{ route('like') }}';
 </script>
@stop