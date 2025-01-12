@extends('layouts.default')

@section('title', 'Menú')

@section('content')
    <section class="relative bg-cover bg-center h-80 mt-2" style="background-image: url('{{ secure_asset('menu/menu-bg-1.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative z-10 flex items-center justify-center h-full text-center text-white flex-col">
            <h1 class="text-5xl font-bold">Nuestro Menú</h1>
            <p class="mt-4 text-xl">Descubre los platillos que nos hacen únicos</p>
        </div>
    </section>

    <section class="py-16 bg-sevensoup-light">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-sevensoup-green text-center mb-10">Explora Nuestros Platillos</h2>
            
            <div class="space-y-12">
                <div>
                    <h3 class="text-3xl font-semibold text-sevensoup-dark mb-6">Sopas</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <x-menu-item 
                            image="{{ secure_asset('menu/sopa-criolla.webp') }}" 
                            name="Sopa Criolla"
                            description="Un clásico peruano con fideos, carne y un toque de leche, que deleita desde el primer sorbo."
                            price="30.9"
                        />
                        <x-menu-item 
                            image="{{ secure_asset('menu/caldo-cordero.webp') }}" 
                            name="Sopa del día - Caldo de Cordero"
                            description="Un sabroso y nutritivo caldo preparado con los mejores cortes de cordero fresco."
                            price="30.9"
                        />
                        <x-menu-item 
                            image="{{ secure_asset('menu/caldo-gallina.webp') }}" 
                            name="Caldo de Gallina"
                            description="Ideal para revitalizar, este caldo lleva gallina, huevo y un toque de jengibre."
                            price="30.9"
                        />
                    </div>
                </div>

                <div>
                    <h3 class="text-3xl font-semibold text-sevensoup-dark mb-6">Platos Principales</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <x-menu-item 
                            image="{{ secure_asset('menu/aji-gallina.webp') }}" 
                            name="Ají de Gallina"
                            description="Tierna pechuga desmenuzada en una cremosa salsa de ají amarillo, acompañada de arroz."
                            price="26.9"
                        />
                        <x-menu-item 
                            image="{{ secure_asset('menu/milanesa-tallarin.webp') }}" 
                            name="Milanesa con Linguini Verde"
                            description="Linguini en salsa de albahaca y espinaca, servido con una jugosa milanesa dorada."
                            price="36.9"
                        />
                        <x-menu-item 
                            image="{{ secure_asset('menu/pollo-saltado.webp') }}" 
                            name="Pollo Saltado"
                            description="Trozos de pollo salteados con cebolla, tomate y papas fritas, una explosión de sabor."
                            price="31.9"
                        />
                        <x-menu-item 
                            image="{{ secure_asset('menu/seco-res.webp') }}" 
                            name="Seco de Res con Frijoles"
                            description="Jugosa carne de res cocida lentamente en culantro, acompañada de frijoles y arroz."
                            price="40.9"
                        />
                        <x-menu-item 
                            image="{{ secure_asset('menu/cachanga-rellena.webp') }}" 
                            name="Cachangas Rellenas"
                            description="Tradicional masa frita rellena de queso y acompañada de ensalada fresca."
                            price="24.9"
                        />
                    </div>
                </div>

                <div>
                    <h3 class="text-3xl font-semibold text-sevensoup-dark mb-6">Bebidas</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <x-menu-item 
                            image="{{ secure_asset('menu/gaseosa-1-5L.webp') }}" 
                            name="Gaseosa 1.5L"
                            description="Perfecta para compartir, esta gaseosa refrescará tus momentos en familia."
                            price="15.9"
                        />
                        <x-menu-item 
                            image="{{ secure_asset('menu/gaseosa-personal.webp') }}" 
                            name="Gaseosa Personal"
                            description="Tamaño ideal para disfrutar solo, acompañando tu comida favorita."
                            price="7.9"
                        />
                        <x-menu-item 
                            image="{{ secure_asset('menu/chicha-morada.webp') }}" 
                            name="Chicha Morada 1LT"
                            description="Hecha con maíz morado y especias, una opción dulce y refrescante."
                            price="18.9"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
