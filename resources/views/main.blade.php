<!DOCTYPE html>
<html lang="en">
  <head>

@include('partials._head')

@yield('stylesheets')

@yield('select2')

  </head>

  <body>

@include('partials._nav')

@include('partials._messages')

@yield('content')

@yield('scripts')

@include('partials._footer')

  </body>
</html>
