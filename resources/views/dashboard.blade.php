<x-layout>
    <section class="relative h-[200px] overflow-hidden">

        <div class="absolute inset-0 bg-[#756e5f]"></div>
        <div class="relative z-10 p-12 text-black">
            <h1 class="text-5xl font-bold mb-4">Your Profile</h1>
            <p>Welcome, {{ auth()->user()->name }}!</p>
        </div>
    </section>

    <div class="grid grid-cols-1 gap-x-5 gap-y-8 sm:grid-cols-2 lg:grid-cols-4">
        @foreach ($products as $product)
            <div class="min-w-0">
                <x-product-card :product="$product"/>
            </div>
        @endforeach


    </div>
</x-layout>
