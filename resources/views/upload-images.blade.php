<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple images Upload</title>

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
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h2>Simple Laravel 5.3 Image upload</h2>
        </div>
        <div class="panel-body">
          @if (count($errors) > 0)
            <div class="alert alert-danger">
              @foreach ($errors->all() as $error)
                <p class="error_item">{{ $error }}</p>
              @endforeach
            </div>
          @endif
          @if (Session::get('success'))
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-4">
                  <strong>Image Before Resize:</strong>
                </div>
                <div class="col-md-8">
                  <img src="{{asset('images/'.Session::get('imagename')) }}" />
                </div>
              </div>
              <div class="col-md-12">
                <div class="col-md-4">
                  <strong>Image after Resize:</strong>
                </div>
                <div class="col-md-8">
                  <img src="{{asset('thumbnail_images/'.Session::get('imagename')) }}" />
                </div>
              </div>
            </div>
          @endif
          {!! Form::open(array('route' => 'postimage','files'=>true)) !!}
            <div class="row">
              <div class="col-md-6">
                <br/>
                {!! Form::file('image_file', array('class' => 'form-control')) !!}
              </div>
              <div class="col-md-6">
                <br/>
                <button type="submit" class="btn btn-success">Upload Image</button>
              </div>
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>