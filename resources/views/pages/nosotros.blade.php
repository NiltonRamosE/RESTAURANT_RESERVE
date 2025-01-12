@extends('layouts.default')

@section('title', 'Nosotros')

@section('content')
    <section class="relative bg-cover bg-center h-80" style="background-image: url('{{ secure_asset('menu/menu-bg.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative z-10 flex items-center justify-center h-full text-center text-white flex-col">
            <h1 class="text-5xl font-bold">Sobre Nosotros</h1>
            <p class="mt-4 text-xl">Conoce nuestra historia, misión y valores</p>
        </div>
    </section>

    <section class="py-16 bg-sevensoup-light">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-sevensoup-green text-center mb-10">Nuestra Historia</h2>
            <p class="text-gray-700 leading-relaxed text-lg text-center">
                Fundados en el corazón de la comunidad, nos hemos dedicado a crear experiencias culinarias únicas desde nuestros humildes comienzos. Nuestra pasión por la comida y el compromiso con la calidad nos han llevado a convertirnos en un referente en el sector.
            </p>

            <h2 class="text-4xl font-bold text-sevensoup-green text-center mt-16 mb-10">Nuestra Misión</h2>
            <p class="text-gray-700 leading-relaxed text-lg text-center">
                Brindar a nuestros clientes platos excepcionales elaborados con ingredientes frescos, apoyando a proveedores locales y promoviendo una cultura gastronómica que celebre nuestras raíces.
            </p>

            <h2 class="text-4xl font-bold text-sevensoup-green text-center mt-16 mb-10">Nuestros Valores</h2>
            <ul class="list-disc list-inside text-gray-700 leading-relaxed text-lg mx-auto max-w-4xl">
                <li><strong>Calidad:</strong> Nos esforzamos por ofrecer solo lo mejor en cada plato.</li>
                <li><strong>Compromiso:</strong> Con nuestra comunidad, nuestro equipo y el medio ambiente.</li>
                <li><strong>Innovación:</strong> Exploramos constantemente nuevas ideas para sorprender a nuestros clientes.</li>
                <li><strong>Pasión:</strong> La base de todo lo que hacemos.</li>
            </ul>
        </div>
    </section>
@endsection
