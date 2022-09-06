<main class="max-w-8xl mx-auto pt-6 lg:pt-20 " id="main"
     {{-- style="background-color: rgb(4, 4, 15);color:aliceblue" --}}
     >
        @if($posts->count())
            <x-posts-grid :posts="$posts" />

            {{ $posts->links() }}
        @else
            <h1 class="text-center text-4xl">No Posts Yet. Please Check Back Later.</h1>
        @endif

    </main>