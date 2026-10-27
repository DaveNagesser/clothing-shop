<x-layout>

    <h1 class="create_title"> Create new product</h1>

    <form class="create_form" action="{{route('products.store')}}" method="post">
        @csrf

        <div>
            <label class="create_label" for="name"> Name </label>
            <input class="create_input" type="text" name="name" id="name" value="{{old('name')}}">
            @error('name')
            <span class="create_error text-red-500">{{$message}}</span>
            @enderror
        </div>

        <div>
            <label class="create_label" for="description">Product Description</label>
            <input class="create_input" type="text" name="description" id="description"
                   value="{{old('description')}}">
            @error('description')
            <span class="create_error text-red-500">{{$message}}</span>
            @enderror
        </div>

        <div>
            <label class="create_label" for="price"> Price </label>
            <input class="create_input" type="text" name="price" id="price" value="{{old('price')}}">
            @error('price')
            <span class="create_error text-red-500">{{$message}}</span>
            @enderror
        </div>

        <div>
            <label class="create_label" for="category_id"> Category </label>
            <select class="create_input" name="category_id" id="category_id">
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

        <div>
            <label class="create_label" for="Brand"> Brand </label>
            <input class="create_input" type="text" name="brand" id="Brand" value="{{old('brand')}}">
            @error('brand')
            <span class="create_error text-red-500">{{$message}}</span>
            @enderror
        </div>

        <div>
            <label class="create_label" for="image"> Paste image URL: </label>
            <input class="create_input" type="text" name="image" id="image" value="{{old('image')}}">
            @error('image')
            <span class="create_error text-red-500">{{$message}}</span>
            @enderror
        </div>


        <input class="create_save" type="submit" value="save">

    </form>
</x-layout>

{{--        <textarea>--}}
{{--            {{old('description')}}--}}
{{--        </textarea>--}}
