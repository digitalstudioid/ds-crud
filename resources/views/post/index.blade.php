<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Like & Dislike</title>
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
       <h2>Like & Dislike System</h2>
       <p>Using ajax to like and disklike system in laravel 5.5</p>
       <hr>
     </div>

     <div class="row">
       <div class="col-sm-8">
         <div class="blog-post">
           @foreach ($posts as $post)
             <div class="post" data-postid="{{ $post->id }}">
             <a href="#"><h3>{{$post->title}}</h3></a>
             <h6>Posted on {{$post->created_at}} by {{$post->user->name}}</h6>
             <p>{{$post->body}}</p>
             <div class="interaction">
               <a href="#" class="btn btn-xs btn-warning like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a> |
               <a href="#" class="btn btn-xs btn-danger like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike' : 'Dislike'  }}</a>
            </div>
             <hr>
           </div>
           @endforeach
         </div><!-- /.blog-post -->
         <nav>
           <ul class="pager">
             <li><a href="#">Previous</a></li>
             <li><a href="#">Next</a></li>
           </ul>
         </nav>
       </div><!-- /.blog-main -->
     </div><!-- /.row -->
     <div class="footer">
       <p>Copyright © 2018 <a href="#">Sector Code</a></p>
       <p>
         <a href="#">Back to top</a>
       </p>
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