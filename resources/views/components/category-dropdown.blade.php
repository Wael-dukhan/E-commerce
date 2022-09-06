<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-6 pr-9 text-sm font-semibold w-full lg:w-48 text-left flex lg:inline-flex">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'All Categories' }}

            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;" />
        </button>
    </x-slot>
{{--    <x-slot name="trigger">--}}
{{--        hh--}}
{{--    </x-slot>--}}


    {{--                <a href="/"--}}
    {{--                   class="block text-left px-3 text-sm leading-6 hover:bg-gray-300 focus:bg-gray-300">--}}
    {{--                    All--}}
    {{--                </a>--}}
    {{--    <x-dropdown-item href="/" :active="request()->routeIs('home')">--}}
    <x-dropdown-item href="/?{{ http_build_query(request()->except('category', 'page')) }}"
                     :active="count(request()->all()) == 0"
    >
        All
    </x-dropdown-item>

{{--    @php--}}
{{--        ['search' => 'mohammed', 'category' => 'lorem ipsum'] // name=mohammed&category=lorem ipsum--}}
{{--    @endphp--}}

    @foreach($categories as $category)
        <x-dropdown-item
{{--            href="/categories/{{ $category->slug }}"--}}
{{--            href="/?category={{ $category->slug }}&{{ request()->getQueryString() }}"--}}
            href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
{{--            href="/?category={{ $category->slug }}"--}}

            :active="isset($currentCategory) && $currentCategory->is($category)"
{{--                                    :active="request()->is('categories/'. $category->slug)"--}}
{{--            :active='request()->is("categories/{$category->slug}")'--}}
        >
            {{ ucwords($category->name) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>



{{--php artisan make:component CategoryDropdown--}}

{{--CategoryDropdown.php--}}
{{--category-dropdown.blade.php--}}
