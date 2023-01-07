@props(['products'])

<x-featured-card :product="$products[0]" />

@if($products->count() > 1)
    <div class="lg:grid lg:grid-cols-6">
        @foreach($products->skip(1) as $product)
            <x-product-card :product="$product"  class="{{ $loop->iteration < 3 ? 'col-span-3 py-2 px-2' : 'col-span-3 py-5 px-8' }}" />
        @endforeach
    </div>
@endif
