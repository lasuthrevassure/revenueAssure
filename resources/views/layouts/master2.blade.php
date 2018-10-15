<!doctype html>
<html lang="en">
  <head>
        <link rel="stylesheet" href="{{ public_path() . '/css/bootstrap.min.css' }}">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


  </head>
  <body class="h-100">
      <div class="container-fluid">
        <div class="row">

            <main class="main-content">


              <!-- body -->

              @yield('content')

            </main>
        </div>


      </div>
  </body>
</html>
