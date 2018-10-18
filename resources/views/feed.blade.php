@extends('adminlte::page')

@section('title', 'Virtual-Pub | feed')

@section('content_header')

@stop

@section('content')

@foreach($posts as $post)
    <div class="row">
            <div class="col-md-6">
                    <!-- Box Comment -->
                    <div class="box box-widget">
                      <div class="box-header with-border">
                        <div class="user-block">
                          @if($post->userimg != null)
                          <img class="img-circle" src="{{$post->userimg}}" alt="User Image">
                          @else
                          <img class="img-circle" src="{{ asset('images/avatar-placeholder.svg') }}" alt="User Image">
                          @endif
                          <span class="username"><a href="{{ route('profile.show', $post->userId) }}">{{$post->nome}}</a></span>
                          <span class="description">Publicado em {{$post->data}}</span>
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
                                $foto = '../postimages/'.$post->id.'.jpg';
                                echo "<center><img class='img-responsive pad' src='$foto' alt='Photo'></center>";
                            } else {
                                echo "";
                            }
                        @endphp
          
                        <p>{{$post->desc}}</p>
                        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Compartilhar</button>
                        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i>brindar</button>
                        <span class="pull-right text-muted">0 brindes - 2 comentarios</span>
                      </div>
                      <!-- /.box-body -->
                     
                      <!-- /.box-footer -->
                      <div class="box-footer">
                        <form action="#" method="post">
                          <img class="img-responsive img-circle img-sm" src="{{Auth::user()->avatar}}" alt="Alt Text">
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
@endforeach
@stop