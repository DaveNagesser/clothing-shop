<x-layout>
    <section
        class="w-[550px] h-[500px] border border-[#756e5f] rounded-xl px-4 pt-4 pb-4 flex flex-col place-content-between ">
        <h1 class="text-center"> Create new product</h1>

        <form class="flex gap-7 flex-col h-full align-stretch" action="{{route('reviews.store')}}"
              method="post">
            @csrf

            <div class="flex flex-row gap-2 place-content-between">
                <label for="name"> Name: </label>
                <input
                    class="w-[300px] h-10 px-3 rounded-full border border-[#756e5f] bg-transparent outline-none"
                    type="text" name="name" id="name" value="{{old('name')}}">
                @error('name')
                <span class="create_error text-red-500">{{$message}}</span>
                @enderror
            </div>

            <div class="flex flex-row gap-2 place-content-between">
                <label for="description">Product Description: </label>
                <input
                    class="w-[300px] h-10 px-3 rounded-full border border-[#756e5f] bg-transparent outline-none"
                    type="text" name="description" id="description"
                    value="{{old('description')}}">
                @error('description')
                <span class="create_error text-red-500">{{$message}}</span>
                @enderror
            </div>

            <div class="flex flex-row gap-2 place-content-between">
                <label for="price"> Price: </label>
                <input
                    class="w-[300px] h-10 px-3 rounded-full border border-[#756e5f] bg-transparent outline-none"
                    type="text" name="price" id="price" value="{{old('price')}}">
                @error('price')
                <span class="create_error text-red-500">{{$message}}</span>
                @enderror
            </div>

            <div class="flex flex-row gap-2 place-content-between">
                <label for="category_id"> Category: </label>
                <select
                    class="w-[300px] h-10 px-3 rounded-full border border-[#756e5f] bg-transparent outline-none"
                    name="category_id" id="category_id">
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="create_error text-red-500">{{$message}}</span>
                @enderror
            </div>

            <div class="flex flex-row gap-2 place-content-between">
                <label for="Brand"> Brand: </label>
                <input
                    class="w-[300px] h-10 px-3 rounded-full border border-[#756e5f] bg-transparent outline-none"
                    type="text" name="brand" id="Brand" value="{{old('brand')}}">
                @error('brand')
                <span class="create_error text-red-500">{{$message}}</span>
                @enderror
            </div>

            <div class="flex flex-row gap-2 place-content-between">
                <label for="image"> Paste image URL: </label>
                <input
                    class="w-[300px] h-10 px-3 rounded-full border border-[#756e5f] bg-transparent outline-none"
                    type="text" name="image" id="image" value="{{old('image')}}">
                @error('image')
                <span class="create_error text-red-500">{{$message}}</span>
                @enderror
            </div>

            <div class="flex flex-row justify-center">
                <input
                    class="w-[300px] h-10 px-3 rounded-full border border-[#756e5f] bg-transparent outline-none"
                    type="submit" value="save">
            </div>
        </form>
    </section>
</x-layout>
