
<article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4">
    <div class="flex-shrink-0">
{{--        <img src="https://programmer.test/images/{{ auth()->user()->image }}" width="60" height="60" alt="" class="rounded-xl">--}}
        <img src="#" width="60" height="60" alt="" class="rounded-xl">
    </div>
    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{ auth()->user()->username }}</h3>
{{--            <p class="text-xs">--}}
{{--                Posted--}}
{{--                <time>{{ $comment->created_at }}</time>--}}
{{--            </p>--}}
        </header>

            <textarea name="body" id="body" cols="50" rows="5"></textarea>
{{--            {{ $comment->body }}--}}
    </div>
</article>
