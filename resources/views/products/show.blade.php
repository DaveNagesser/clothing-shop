<x-layout>

    <main class="mx-auto max-w-6xl px-6 py-10">
        <a href="{{ url('/products') }}"
           class="text-sm text-gray-600 hover:text-black">
            ← Terug naar de collectie
        </a>

        <div class="mt-8 grid gap-10 md:grid-cols-2">
            <div class="flex min-h-96 items-center justify-center bg-[#e5e0d9] p-8">
                <span class="text-sm text-gray-500">
                    <img
                        src="{{ $product->image }}"
                        alt="{{ $product->name }}"
                        class="h-full w-full rounded-lg object-cover "
                    >
                </span>
            </div>

            <section class="py-3">
                <p class="text-xs uppercase tracking-widest text-gray-500">
                    Productdetails
                </p>

                <h1 class="mt-4 text-4xl font-serif">
                    {{ $product->name }}
                </h1>

                <p class="mt-5 text-xl">
                    €{{ number_format($product->price, 2,) }}
                </p>

                <div class="mt-8 border-t border-black/10 pt-6">
                    <h2 class="text-sm font-semibold">Beschrijving</h2>
                    <p class="mt-3 leading-7 text-gray-600">
                        {{ $product->description ?? 'Geen beschrijving beschikbaar.' }}
                    </p>

                    <p class="text-sm text-gray-500">
                        Brand: {{ $product->brand }}
                    </p>
                    <div class="flex flex-row gap-2 place-content-between">
                        <p class="text-sm">
                            @if ($product->purchased > 0)
                                <span class="text-green-600">In stock</span>
                            @else
                                <span class="text-red-600">Out of stock</span>
                            @endif
                        </p>
                        @auth
                            @if (auth()->user()->products()->count() >= 3)
                                <a
                                    href="{{ route('reviews.create', $product->id) }}"
                                    class="text-sm text-blue-500 hover:text-blue-700"
                                >
                                    write a review
                                </a>
                            @else
                                <p class="text-sm text-gray-500">
                                    You must post 3 products to write a review.
                                </p>
                            @endif
                        @endauth
                    </div>

                    <div>
                        <h2>Reviews</h2>
                        @foreach($product->reviews as $review)
                            <div class="border-t border-gray-200 py-4">
                                <p class="font-semibold">{{ $review->user->name }}</p>
                                <p class="text-sm text-gray-500">
                                    Rating: {{ $review->rating }}/5
                                </p>
                                <p class="text-gray-600">{{ $review->comment }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </main>
</x-layout>
