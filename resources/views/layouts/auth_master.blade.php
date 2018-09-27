<!DOCTYPE html>
<html>
  <head>
    @include('partials.head')
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    @yield('content')
    @include('partials.script')
    @yield('script')
  </body>
</html>