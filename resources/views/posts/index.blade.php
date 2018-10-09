<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>teste de posts</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   <div class="container">
     <div class="blog-header">
       <h2>pagina teste de sistema de curtidas</h2>
       
       <hr>
     </div>

     <div class="row">
       <div class="col-sm-8">
         <div class="blog-post">
           @foreach ($posts as $post)
             <div class="post" data-postid="{{ $post->id }}">
             <h6>Publicado em  {{$post->created_at}} por {{$post->user->name}}</h6>
             <p>{{$post->description}}</p>
             <div class="interaction">
               <a href="#" class="btn btn-xs btn-warning like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'curtiu' : 'curtir' : 'curtir'  }}</a> |
               <a href="#" class="btn btn-xs btn-danger like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'não curtiu' : 'não curtir' : 'não curtir'  }}</a>
             </div>
             <hr>
             </div>
           @endforeach
         </div><!-- /.blog-post -->
         
       </div><!-- /.blog-main -->
     </div><!-- /.row -->
     <div class="footer">
      
     </div>
   </div><!-- /.container -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{ asset('/js/like.js') }}"></script>
    <script>
      var token = '{{ Session::token() }}';
      var urlLike = '{{ route('like') }}';
    </script>
  </body>
</html>