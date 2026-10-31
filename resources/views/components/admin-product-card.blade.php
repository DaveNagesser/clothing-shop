@props(['product'])

<article
    class="rounded-xl border border-gray-200 bg-white p-4 shadow-sm group relative transition-transform duration-300 ease-in-out hover:z-10 hover:scale-[1.07] h-full">
    <img src="{{ $product->image }}" class="h-20 w-10 object-cover" alt="{{ $product->name }}">
    <div class="card-body">
        <h5 class="card-title">{{ $product->name }}</h5>
        <div>
            <p class="card-text">Purchased: {{ $product->purchased ? 'Yes' : 'No' }}</p>

            <form action="{{ route('admin.products.toggle-availability', $product) }}" method="POST">
                @csrf
                <button type="submit"
                        style="background-color: {{ $product->purchased > 0 ? 'green' : 'gray' }}; color: white;"
                        class="rounded-full px-3 py-2">
                    Toggle Availability
                </button>
            </form>
        </div>
    </div>
</article>
