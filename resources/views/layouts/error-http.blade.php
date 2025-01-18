<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <meta
    key="viewport"
    content="viewport-fit=cover, width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"
    name="viewport"
  />
  <link href="favicon.ico" rel="icon" />
  @vite('resources/css/app.css')
</head>
<body>
  <div class="relative flex flex-col min-h-screen overflow-hidden">
    <div class="relative z-10 flex flex-col min-h-screen">
        <main class="container mx-auto px-6 flex-grow">
          @yield('content')
        </main>
    </div>
  </div>
</body>
</html>