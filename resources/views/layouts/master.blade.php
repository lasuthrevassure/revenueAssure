<!doctype html>
<html lang="en">
  <head>
    @yield('head')
    @include('partials.head')
  </head>
  <body class="h-100">
      <div class="container-fluid">
        <div class="row">
            <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
              @include('partials.sidebar')
            </aside>
            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
              <div class="main-navbar stickty-top bg-white">
                @include('partials.topbar')
              </div>

              <!-- body -->

              @yield('content')

            </main>
        </div>


      </div>


    @include('partials.script')
    @yield('script')
    @include('partials.notification')
  </body>
</html>
