<div class="relative flex flex-col min-h-screen overflow-hidden">
  <div class="relative z-10 flex flex-col min-h-screen">
     @include('partials.navbar')
      <main class="container mx-auto px-6 flex-grow pt-14 pb-8">
        @yield('content')
        <h1 class="underline">hola</h1>
      </main>
    @include('partials.footer')
  </div>
</div>