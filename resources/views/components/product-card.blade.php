
<article
    {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-600 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}
    >
    <div class="py-6 px-5">
        <div>
            <img src="https://source.unsplash.com/random?u={{ $product->id }}" alt="Blog Post illustration" class="rounded-xl" style="width: 90%;height: 60vh">
        </div>
        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="space-x-2">
                    <x-category-button :category="$product->category" />
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <div class="price-wrap">
                            <span class="price">$ {{$product->price}}</span>
                        </div>
                    </h1>
                    <div >
                        <form action="/cart" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <input type="hidden" name="title" value="{{$product->title}}">
                            <input type="hidden" name="price" value="{{$product->price}}">
                            {{-- <input type="hidden" name="price" value="{{auth()->id}}"> --}}
                            {{-- <input type="hidden" name="Quality" value="{{$post->Quality}}"> --}}
                            <button type="submit" class="transition-colors duration-300 text-md font-semibold bg-blue-400 hover:bg-green-400 rounded-full "
                            style="margin-left:50%;padding-left:5%;padding-right: 5%;padding-top: 2%;padding-buttom: 2%;">Add to cart</button>
                        </form>
                    </div>
                    <span class="mt-2 block text-gray-400 text-xs">
                                Published <time>1 day ago</time>
                    </span>
                </div>

            </header>

            <div class="text-sm mt-4 space-y-4">
                    {!! $product->excerpt !!}
            </div>

            @if(count($product->comments) > 1)
                <div class="text-sm mt-4">
                    {{  count($product->comments) .' comments' }}
                </div>
            @elseif(count($product->comments) == 1)
                <div class="text-sm mt-4">
                    {{  count($product->comments) .' comment' }}
                </div>
            @endif


            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="https://i.pravatar.cc/60?u={{ $product->category_id }}" alt="Lary avatar">
                    <div class="ml-3" style="font-size: 10%">
                        <h5 class="font-bold">
                            <a href="/?author/{{ $product->author->username }}">
                                {{ $product->author->name }}
                            </a>
                        </h5>
                    </div>
                </div>
                <div>
                    <a href="/products/{{ $product->slug }}"
                       class="transition-colors duration-300 text-xs font-semibold text-blue-600 bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >
                        Read More
                    </a>
                </div>
            </footer>
        </div>
    </div>
</article>
