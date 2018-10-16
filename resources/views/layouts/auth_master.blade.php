<!DOCTYPE html>
<html>
  <head>
    @include('partials.head')
  </head>
  <body>
    <!-- wrapper -->
    <div class="container-fluid p-0 no-gutters">
      <div class="row no-gutters">
          <div class="col-sm-8 caratop d-none d-md-block">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>       
              <div class="carousel-inner">
                      <div class="carousel-caption d-none d-md-block">
                          <h5>Lasuth Revenue Assurance</h5>
                          <p>Getting certificates and report the right 
                              way without stress</p>
                        </div>
                  
                <div class="carousel-item active">
                  <img class="d-block w-100"  src="{{asset('assets/image/img.png')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100"   src="{{asset('assets/image/img.png')}}" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100"   src="{{asset('assets/image/img.png')}}" alt="Third slide">
                </div>
              </div>
            </div>

          </div>
          <div class="col-sm-4 formtop">
            
            @yield('content')
            
          </div>
      </div>
    </div>
    
    @include('partials.script')
    @yield('script')
    @include('partials.notification')
  </body>
</html>