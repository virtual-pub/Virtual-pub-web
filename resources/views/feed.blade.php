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
                        <div class="interaction">
                            <a href="#" class="btn btn-xs btn-warning like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'curtiu' : 'curtir' : 'curtir'  }}</a>
                          </div>
                      </div>
                      <!-- /.box-body -->
                     
                      <!-- /.box-footer -->
                      <div class="box-footer">
                        
                      </div>
                      <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                  </div>
    </div>
@endforeach
@stop
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