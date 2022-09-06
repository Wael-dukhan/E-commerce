<article
    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
{{--            <img src="{{ asset('storage/'. $post->thumbnail) }}" alt="Blog Post illustration" class="rounded-xl">--}}
            <img 
            src="https://source.unsplash.com/random?u={{ $post->id }}"
            {{-- "{{asset('storage/'. $post->thumbnail)}}"  --}}
            alt="Blog Post illustration" class="rounded-xl" width="90%" height="60%"
            >
            {{-- <img src="{{ asset('images/cats.jpg') }}" alt="Blog Post illustration" class="rounded-xl"> --}}
{{--            <img src="{{ storage_path('aJHEn2uIG1kLv2rlNPWDRNU9DNm8iV3mA1dBDdZ6.png') }}" alt="Blog Post illustration" class="rounded-xl">--}}
            {{-- @dd(asset('storage/app/'.$post->thumbnail)) --}}
        </div>
        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <x-category-button :category="$post->category" />
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
                    </div>
                <div class="mt-4">
                    <h1 class="text-3xl">
                        <div class="price-wrap">
                            <span class="price">$ {{$post->price}}</span>
                        </div>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-2 space-y-4">
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
                    <div class="ml-3">
                        <h5 class="font-bold">
                            <a href="/?author={{ $post->author->username }}">
                                {{ $post->author->name }}
                            </a>
                        </h5>
                    </div>
                </div>
                <div class="hidden lg:block">
                    <a href="/posts/{{ $post->slug }}"
                        class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
