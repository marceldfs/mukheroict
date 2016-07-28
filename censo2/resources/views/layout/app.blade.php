<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap-3.3.6/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap-3.3.6/css/edm.css') }}" rel="stylesheet">
    <title>Censo 2016 - Electricidade de Mo&ccedil;ambique</title>
    
  </head>
  
  <body>
    
      <div class="navbar-wrapper">
          <div class="container">       
            <nav class="navbar navbar-inverse navbar-static-top">
              <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                 <img alt="Brand" src="image/logp.png">         
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="/efectivo">Efectivo</a></li>
                    <li><a href="/reformados">Reformados</a></li>
                    <li><a href="/pensionistas">Pensionistas</a></li>
                   <!-- <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                      </ul>
                    </li>-->
                  </ul>
                  <form class="navbar-form navbar-right" role="search">
                     <div class="form-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                     </div>
                        <button type="submit" class="btn btn-sm btn-warning">Submit</button>
                  </form>
                </div>
              </div>
            </nav>
          </div>
    </div>
    
      @yield('content')
  
    
    <div class="container">
        <hr class="featurette-divider">
        <footer>
            <p class="pull-right"><a href="#">Back to top</a></p>
            <p>&copy; 2016 Eletricidade de Mo&ccedil;ambique, LDA. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </footer>
    </div>

      <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js')}}"></script>
      <script src="{{asset('bootstrap-3.3.6/js/bootstrap.min.js')}}"></script>
  </body>
</html>