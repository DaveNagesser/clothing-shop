<div class="rounded-xl border border-gray-200 bg-white p-4 shadow-sm">

    {{-- Product image --}}
    <img
        src="{{ $product->image }}"
        alt="{{ $product->name }}"
        class="h-48 w-full rounded-lg object-contain"
    >

    {{-- Product information --}}
    <div class="mt-4 space-y-2">

        <p class="text-sm text-gray-500">
            {{ $product->category?->category_name ?? 'Uncategorized' }}
        </p>

        <h2 class="text-xl font-semibold text-gray-900">
            {{ $product->name }}
        </h2>

        <p class="text-sm text-gray-600">
            {{ $product->description }}
        </p>

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
</div>
