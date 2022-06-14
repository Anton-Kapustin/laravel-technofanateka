<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
  <x-layouts.head-with-style />
  @yield('title')
</head>

  <body class="d-flex flex-column mb-5  bg-main " style="position: relative;">

    <header>
      @yield('navbar')
    </header>

    @yield('alerts')

    <div class="d-flex flex-column align-items-center justify-content-center ">
      @yield('subnavbar')
    </div>

    <div class="d-flex flex-column align-items-center justify-content-center mt-5 mb-5">  
        @yield('body') 
        @yield('form')
    </div>

    <footer class="footer mt-5 fixed-bottom">
      @yield('footer')
    </footer>

  </body>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>


</html>
