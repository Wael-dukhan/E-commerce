
<article
    {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}
    >
    <div class="py-6 px-5">
        <div>
            <img src="https://source.unsplash.com/random?u={{ $post->id }}" alt="Blog Post illustration" class="rounded-xl" style="width: 90%;height: 60vh">
        </div>
        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="space-x-2">
                    <x-category-button :category="$post->category" />   
                </div>
                
                <div class="mt-4">
                    <h1 class="text-3xl">
                        <div class="price-wrap">
                            <span class="price">$ {{$post->price}}</span>
                        </div>
                    </h1>
                    <div >
                        <form action="/cart" method="post">
                            @csrf
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <input type="hidden" name="title" value="{{$post->title}}">
                            <input type="hidden" name="price" value="{{$post->price}}">
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
                    {!! $post->excerpt !!}
            </div>

            @if(count($post->comments) > 1)
                <div class="text-sm mt-4">
                    {{  count($post->comments) .' comments' }}
                </div>
            @elseif(count($post->comments) == 1)
                <div class="text-sm mt-4">
                    {{  count($post->comments) .' comment' }}
                </div>
            @endif


            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="https://i.pravatar.cc/60?u={{ $post->category_id }}" alt="Lary avatar">
                    <div class="ml-3" style="font-size: 10%">
                        <h5 class="font-bold">
                            <a href="/author/{{ $post->author->username }}">
                                {{ $post->author->name }}
                            </a>
                        </h5>
                    </div>
                </div>
                <div>
                    <a href="/posts/{{ $post->slug }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >
                        Read More
                    </a>
                </div>
            </footer>
        </div>
    </div>
</article>
