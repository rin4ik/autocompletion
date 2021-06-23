<!DOCTYPE html>
<html class="bg-gray-200 antialiased font-sans">
  <head>
    <title>IOIX</title>
    <link rel="stylesheet" href="/css/tailwind-ui.min.css">
  </head>
    <body>
        <div id="app" class="app"> 
            @yield('content')
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
