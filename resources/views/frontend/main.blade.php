<!doctype html>
<html lang="en">

<head>

    @include('frontend.partials._head')

    <title> laravel blog! @yield('title') </title>

</head>

 <!-- Right Panel -->
<body class="fixed-sn navy-blue-skin">

    @yield('content')

</body>
     @include('frontend.partials._nav')

     @include('frontend.partials._footer')

     @include('frontend.partials._javascript')
</html>