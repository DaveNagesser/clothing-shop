<x-layout>
    <div
        class="mb-3 flex flex-col items-start justify-between gap-4 border-b border-gray-200 p-2 sm:flex-row sm:items-center">

        <div class="relative">
            <label for="category" class="sr-only">Filter op categorie</label>

            <select
                id="category"
                name="category"
                class="min-w-52 cursor-pointer appearance-none border-1 bg-transparent py-2 pl-0 pr-10 text-sm font-medium text-gray-900 focus:outline-none focus:ring-0"
            >
                <option value="">Alle categorieën</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>

        </div>

        {{-- Nieuw product toevoegen --}}
        <a
            href="{{ route('products.create') }}"
            class="inline-flex items-center justify-center gap-2 bg-black px-5 py-3 text-sm font-medium text-white transition hover:bg-gray-800"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="1.8"
            >
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m-7-7h14"/>
            </svg>

            Nieuw product toevoegen
        </a>

    </div>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mt-1 mb-1">

        @foreach ($products as $product)
            <div class="min-w-0">
                <x-product-card :product="$product"/>
            </div>
        @endforeach

    </div>

</x-layout>
