<x-layout>
    <div class=" h-[500px] grid grid-cols-2 gap-[172px]">

        <section class="h-[500px]">
            <div>
                <img
                    id="image_placeholder"
                    src=""
                    alt="Product Image"
                    class="hidden w-full h-[500px] object-cover"
                >
            </div>
        </section>


        <section
            class="w-[550px] h-[500px] border border-[#756e5f] rounded-xl px-4 pt-4 pb-4 flex flex-col place-content-between ">
            <h1 class="text-center"> Edit product</h1>

            <form class="flex gap-7 flex-col h-full align-stretch" action="{{route('products.update', $product->id)}}"
                  method="POST">
                @csrf
                @method('PUT')

                <div class="flex flex-row gap-2 place-content-between">
                    <label for="name"> Name: </label>
                    <input
                        class="w-[300px] h-10 px-3 rounded-full border border-[#756e5f] bg-transparent outline-none"
                        type="text" name="name" id="name" value="{{old('name', $product->name)}}">
                    @error('name')
                    <span class="create_error text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex flex-row gap-2 place-content-between">
                    <label for="description">Product Description: </label>
                    <input
                        class="w-[300px] h-10 px-3 rounded-full border border-[#756e5f] bg-transparent outline-none"
                        type="text" name="description" id="description"
                        value="{{old('description', $product->description)}}">
                    @error('description')
                    <span class="create_error text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex flex-row gap-2 place-content-between">
                    <label for="price"> Price: </label>
                    <input
                        class="w-[300px] h-10 px-3 rounded-full border border-[#756e5f] bg-transparent outline-none"
                        type="text" name="price" id="price" value="{{old('price', $product->price)}}">
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
                        type="text" name="brand" id="Brand" value="{{old('brand', $product->brand)}}">
                    @error('brand')
                    <span class="create_error text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex flex-row gap-2 place-content-between">
                    <label for="image"> Paste image URL: </label>
                    <input
                        class="w-[300px] h-10 px-3 rounded-full border border-[#756e5f] bg-transparent outline-none"
                        type="text" name="image" id="image" value="{{old('image', $product->image)}}">
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
    </div>

    <script>
        const input = document.getElementById('image');
        const imagePlaceholder = document.getElementById('image_placeholder');

        input.addEventListener('input', () => {
            const url = input.value.trim();

            if (url === '') {
                imagePlaceholder.classList.add('hidden');
                imagePlaceholder.classList.remove('hidden');
                imagePlaceholder.src = '';
                return;
            }

            imagePlaceholder.src = url;
        });

        imagePlaceholder.onload = () => {
            imagePlaceholder.classList.remove('hidden');
        };
    </script>
</x-layout>

{{--        <textarea>--}}
{{--            {{old('description')}}--}}
{{--        </textarea>--}}
