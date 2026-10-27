<a href="{{ route('products.show', $product) }}"
   class="group block w-full min-w-0">

    <article
        class="rounded-xl border border-gray-200 bg-white p-4 shadow-sm group relative transition-transform duration-300 ease-in-out hover:z-10 hover:scale-[1.07] h-full">

        <img
            src="{{ $product->image }}"
            alt="{{ $product->name }}"
            class="h-48 w-full rounded-lg object-contain"
        >

        <div class="mt-4 space-y-2 border-t border-gray-200 pt-4">

            <h2 class="text-xl font-semibold text-gray-900">
                {{ $product->name }}
            </h2>

            <p class="text-lg font-bold text-green-700">
                €{{ number_format($product->price, 2) }}
            </p>

            <p class="text-sm text-gray-500">
                Brand: {{ $product->brand }}
            </p>

            <p class="text-sm">
                @if ($product->purchased > 0)
                    <span class="text-green-600">In stock</span>
                @else
                    <span class="text-red-600">Out of stock</span>
                @endif
            </p>

        </div>
    </article>
