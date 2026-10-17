<x-layout title="Create Product">
    <h1>Create Product</h1>

    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
            @error('name')
            <span class="alert alert-danger">{{ $message }}</span>
            @enderror

        </div>

        {{--        <textarea>--}}
        {{--            {{old('description')}}--}}
        {{--        </textarea>--}}

        <div>
            <label for="description">Description</label>
            <input type="text" id="description" name="description">
        </div>

        <div>
            <label for="price">Price</label>
            <input type="text" id="price" name="price">
        </div>
        <button type="submit" name="submit" value="Save">Create Product</button>

    </form>
</x-layout>
