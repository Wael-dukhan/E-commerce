<main class="max-w-8xl mx-auto pt-6 lg:pt-20 " id="main"
     {{-- style="background-color: rgb(4, 4, 15);color:aliceblue" --}}
     >
        @if($products->count())
            <x-products-grid :products="$products" />

            {{ $products->links() }}
        @else
            <h1 class="text-center text-4xl">No Products Yet. Please Check Back Later.</h1>
        @endif

    </main>