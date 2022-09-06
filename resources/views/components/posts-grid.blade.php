@props(['posts'])

<x-featured-card :post="$posts[0]" />

@if($posts->count() > 1)
    <div class="lg:grid lg:grid-cols-6">
        @foreach($posts->skip(1) as $post)
            <x-post-card :post="$post"  class="{{ $loop->iteration < 3 ? 'col-span-3 py-2 px-2' : 'col-span-2 py-5 px-8' }}" />
        @endforeach
    </div>
@endif
