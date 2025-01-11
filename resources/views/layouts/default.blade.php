<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
  <title>@yield('title')</title>
  <meta content="Página no original del restaurante 7 SOPAS, es un proyecto personal para simular las reservas en la entidad." property="og:description" />
  <meta content="Página no original del restaurante 7 SOPAS, es un proyecto personal para simular las reservas en la entidad." name="description" />
  <meta content="website" property="og:type" />
  <meta content="7 SOPAS" property="og:site_name" />
  <meta content="es_ES" property="og:locale" />
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
      @include('partials.navbar')
        <main class="container mx-auto px-6 flex-grow pt-14 pb-8">
          @yield('content')
        </main>
      @include('partials.footer')
    </div>
  </div>
</body>
</html>