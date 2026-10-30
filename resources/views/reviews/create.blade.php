<x-layout>
    <section
        class="w-[550px] h-[500px] border border-[#756e5f] rounded-xl px-4 pt-4 pb-4 content-center">
        <h1 class="text-center"> Create new product</h1>

        <form class="flex gap-7 flex-col h-full align-stretch" action="{{route('reviews.store', $product->id)}}"
              method="post">
            @csrf

            <div class="flex flex-row gap-2 place-content-between">
                <label for="rating"> rating: </label>
                <select
                    class="w-[300px] h-10 px-3 rounded-full border border-[#756e5f] bg-transparent outline-none"
                    name="rating" id="rating">
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" @selected(old('rating') == $i)>{{ $i }}</option>
                    @endfor
                </select>
                @error('rating')
                <span class="create_error text-red-500">{{$message}}</span>
                @enderror
            </div>

            <div class="flex flex-row gap-2 place-content-between">
                <label for="comment" id="comment-label">Comment: </label>
                <textarea class="w-[300px] h-20 px-3 border border-[#756e5f] bg-transparent outline-none" name="comment"
                          id="comment">{{ old('comment') }}</textarea>
                @error('comment')
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
