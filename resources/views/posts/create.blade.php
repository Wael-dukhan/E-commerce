<x-layout>
    <section class="py-8 max-w-md mx-auto">
        <h1 class="text-lg font-bold mb-4">
            Publish New Post
        </h1>

        <div class="border border-gray-200 p-6 rounded-xl">
            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                @csrf


                <x-form.input name="title" />

                <x-form.input name="slug" />

                <x-form.input name="thumbnail" type="file" />

                <x-form.textarea name="excerpt" />

                <x-form.textarea name="body" />


                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="category_id"
                    >
                        Category
                    </label>

                    <select name="category_id" id="category_id">

                        @foreach(\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                            >{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>


                    @error('category')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                    Submit
                </button>

            </form>
        </div>
    </section>
</x-layout>
