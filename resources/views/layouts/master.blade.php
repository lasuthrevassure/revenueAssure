<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials.head')
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">Revenue Assurance</a>
      @include('partials.topbar')
      @include('partials.notification')
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        @include('partials.sidebar')
    </aside>
    <main class="app-content">
      <div class="app-title">
        @yield('title')
      </div>
        @yield('content')
    </main>
    @include('partials.script')
    @yield('script')
  </body>
</html>