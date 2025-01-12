<section id="reviews" class="py-16 bg-sevensoup-light">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold text-sevensoup-green mb-8">Lo que dicen nuestros clientes</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <x-testimonio 
                image="{{ secure_asset('michellesilver.png') }}" 
                name="Michelle Silver" 
                quote="La mejor sopa criolla que he probado, ¡definitivamente regresaré!"
            />
            <x-testimonio 
                image="{{ secure_asset('genesisjosetty.png') }}" 
                name="Génesis Hurtado y Josetty" 
                quote="Un lugar acogedor y con un menú delicioso, ideal para toda la familia."
            />
            <x-testimonio 
                image="{{ secure_asset('radiolazona.png') }}" 
                name="Radio La Zona" 
                quote="La parihuela estaba increíble. Un sabor único que me encantó."
            />
        </div>
    </div>
</section>
