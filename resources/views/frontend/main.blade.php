<!doctype html>
<html lang="en">

<head>

    @include('frontend.partials._head')

    <title> ecommerce site! @yield('title') </title>

</head>

 <!-- Right Panel -->


     @include('frontend.partials._nav')

  <body>
        @yield('content')

     @include('frontend.partials._footer')

     @include('frontend.partials._javascript')
</body>
</html>