<x-layout>
    <body class="min-h-screen bg-[#f5f2ed] text-[#242321] antialiased">
    <header class="sticky top-0 z-30 border-b border-black/5 bg-[#f5f2ed]/95 backdrop-blur">

        <main>
            {{-- HERO / BANNER: voeg later zelf een achtergrondafbeelding toe --}}
            <section class="relative h-[450px] overflow-hidden">
                <img
                    src="{{ asset('images/hero.jpeg') }}"
                    alt="Hero afbeelding"
                    class="absolute inset-0 h-full w-full"
                >

                <div class="absolute inset-0 bg-black/30"></div>

                <div class="relative z-10 p-12 text-white">
                    <h1 class="text-6xl font-serif">
                        Upgrade your style.
                    </h1>
                    <p class="mt-4">endless designer, always dripped.</p>
                </div>
            </section>

            {{-- PRODUCTEN --}}
            <section id="collectie" class="mx-auto max-w-[1600px] px-5 pb-16 pt-9 sm:px-8 sm:pt-12 lg:px-14 lg:pb-24">
                <div class="mb-6 flex items-end justify-between gap-4 sm:mb-7">
                    <div>
                        <h2 class="fashion-serif text-4xl leading-none tracking-[-0.045em] sm:text-5xl">
                            Nieuw binnen
                        </h2>
                    </div>
                    <a href="{{ url('/products') }}"
                       class="mb-1 inline-flex shrink-0 items-center gap-4 border-b border-[#242321]/50 pb-2 text-[10px] font-medium uppercase tracking-[0.12em] transition hover:border-black sm:text-xs">
                        Bekijk alles <span aria-hidden="true" class="text-base">→</span>
                    </a>
                </div>

                <div class="grid grid-cols-1 gap-x-5 gap-y-8 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach (($products ?? collect()) as $product)
                        {{-- Pas de componentnaam/props aan als jouw product-card anders heet. --}}
                        <x-product-card :product="$product"/>
                    @endforeach
                </div>
            </section>
        </main>

</x-layout>
