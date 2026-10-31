<x-layout>
    <x-slot name="title">
        Admin Dashboard
    </x-slot>

    <div class="w-full px-6 py-6">
        <h1>Admin Dashboard</h1>
        <p>Welcome, {{ auth()->user()->name }}!</p>


        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mt-1 mb-1">

            @foreach($products as $product)
                <div class="min-w-0">
                    <x-admin-product-card :product="$product"/>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
