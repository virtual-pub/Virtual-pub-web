@extends('adminlte::page')

@section('title', 'Virtual-Pub | Publicação de '.$reg->user->name)

@section('content_header')

@stop

@section('content')
    <div class="row">
            <div class="col-md-6">
                    <!-- Box Comment -->
                    <div class="box box-widget">
                      <div class="box-header with-border">
                        <div class="user-block">
                          <img class="img-circle" src="{{$reg->user->avatar}}" alt="User Image">
                          <span class="username"><a href="#">{{$reg->user->name}}</a></span>
                          <span class="description">Publicado dia {{date_format($reg->created_at, 'd/m/Y')}} às {{date_format($reg->created_at, 'H:i')}}</span>
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
                            if (file_exists(public_path('postimages/'.$reg->id.'.jpg'))) {
                                $foto = '../postimages/'.$reg->id.'.jpg';
                                echo "<center><img class='img-responsive pad' src='$foto' alt='Photo'></center>";
                            } else {
                                echo "";
                            }
                        @endphp
          
                        <p>{{$reg->description}}</p>
                        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Compartilhar</button>
                        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i>brindar</button>
                        <span class="pull-right text-muted">0 brindes - 2 comentarios</span>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer box-comments">
                        <div class="box-comment">
                          <!-- User image -->
                          <img class="img-circle img-sm" src="{{$reg->avatar}}" alt="User Image">
          
                          <div class="comment-text">
                                <span class="username">
                                  {{$reg->nome}}
                                  <span class="text-muted pull-right">{{date_format($reg->created_at, 'd/m/Y')}} às {{date_format($reg->created_at, 'H:i')}}</span>
                                </span><!-- /.username -->
                            Exemplo de comentario.
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
                                  <span class="text-muted pull-right"{{date_format($reg->created_at, 'd/m/Y')}} às {{date_format($reg->created_at, 'H:i')}}</span>
                                </span><!-- /.username -->
                                Exemplo de comentario 2.
                          </div>
                          <!-- /.comment-text -->
                        </div>
                        <!-- /.box-comment -->
                      </div>
                      <!-- /.box-footer -->
                      <div class="box-footer">
                        <form action="#" method="post">
                          <img class="img-responsive img-circle img-sm" src="{{$reg->user->avatar}}" alt="Alt Text">
                          <!-- .img-push is used to add margin to elements next to floating images -->
                          <div class="img-push">
                            <input type="text" class="form-control input-sm" placeholder="Press enter to post comment" disabled>
                          </div>
                        </form>
                      </div>
                      <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                  </div>
    </div>
@stop