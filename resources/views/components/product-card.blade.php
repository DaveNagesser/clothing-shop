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

            @if (auth()->check() && auth()->user()->products()->where('products.id', $product->id)->exists())

                <div class="flex items-center gap-2">

                    <a
                        href="{{ route('products.edit', $product) }}"
                        onclick="event.stopPropagation()"
                        class="rounded-md border border-gray-300 px-3 py-1.5 text-xs font-medium text-gray-700 transition hover:bg-gray-100"
                    >
                        Edit
                    </a>

                    <form
                        action="{{ route('products.destroy', $product) }}"
                        method="POST"
                        onclick="event.stopPropagation()"
                        onsubmit="return confirm('Weet je zeker dat je dit product wilt verwijderen?')"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="rounded-md border border-red-200 px-3 py-1.5 text-xs font-medium text-red-600 transition hover:bg-red-600 hover:text-white"
                        >
                            Delete
                        </button>
                    </form>

                </div>

            @endif
        </div>
    </article>
</a>
