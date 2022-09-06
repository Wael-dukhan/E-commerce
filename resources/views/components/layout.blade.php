<!doctype html>
<html 
{{-- style="background-color: rgb(1, 1, 19);color:aliceblue" --}}
id="html">
<head>
    <title>Laravel Ecommerace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- CSS only -->
    <!-- CSS only -->
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body style="font-family: Open Sans, sans-serif" 
{{-- style="background-color: rgb(3, 3, 15);color:aliceblue" --}}
>
    <section 
    class="px-6 py-8"
    >
    <nav class="md:flex md:justify-between md:items-center " id="nav_header"
    {{-- style="background-color:rgb(15, 3, 3);color:aliceblue" --}}
    >
        <div>
            <a href="/">
{{--                <img src="/images/logo.png" alt="Laracasts Logo" width="165" height="16">--}}
                <img src="/images/1000programmerLogo.png" alt="Laracasts Logo" width="165" height="16">
            </a>
        </div>
        @auth
                <?php
                    try{
                        if (auth()->user()->username==="admin" ){ 
                            ?>
                            <a href="/admin/posts/create" class="btn btn-primary">Add new product</a>
                            <a href="/categories" class="btn btn-primary">Add new Category</a>
                            <?php
                        }
                    }catch(Exception $exc){}
                ?>
        @endauth
        <button type="button" id="dark_btn" class="btn btn-primary text-white">dark</button>
        <button type="button" id="white_btn" class="btn btn-primary text-white">white</button>

        <div class="mt-8 md:mt-0 flex items-center">
{{--            @guest--}}
{{--                <a href="/register" class="text-xs font-bold uppercase">Register</a>--}}
{{--                <a href="/login" class="ml-6 text-xs font-bold uppercase">Login</a>--}}
{{--            @else--}}
{{--                <span class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}!</span>--}}

{{--                <form method="POST" action="/logout" class="text-xs font-semibold text-blue-500 ml-6">--}}
{{--                    @csrf--}}

{{--                    <button type="submit">Logout</button>--}}
{{--                </form>--}}
{{--            @endguest--}}
            
                
    

            @unless(auth()->check())
                    <a href="/register" class="text-xs font-bold uppercase">Register</a>
                    <a href="/login" class="ml-6 text-xs font-bold uppercase">Login</a>
            @else
                    <span class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->username }}!</span>

                    <form method="POST" action="/logout" class="text-xs font-semibold text-blue-500 ml-6">
                        @csrf

                        <button type="submit">Logout</button>
                    </form>
            @endunless
            

{{--            @auth--}}
{{--                <span class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}!</span>--}}

{{--                <form method="POST" action="/logout" class="text-xs font-semibold text-blue-500 ml-6">--}}
{{--                    @csrf--}}

{{--                    <button type="submit">Logout</button>--}}
{{--                </form>--}}

{{--            @else--}}
{{--               If you a guest --}}
{{--                <a href="/register" class="text-xs font-bold uppercase">Register</a>--}}
{{--                <a href="/login" class="ml-6 text-xs font-bold uppercase">Login</a>--}}
{{--            @endauth--}}

            {{-- <a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                Subscribe for Updates
            </a> --}}
            <button class="bg-blue-500 hover:bg-green-300 ml-2 p-2 rounded-xl"><a href="/carts">Cart</a>
                <i class="bi-cart-fill me-1"></i>
            </button>
            {{-- <form class="d-flex">
                <button class="btn btn-outline-dark" type="submit">
                    Cart
                    <i class="bi-cart-fill me-1"></i>
                </button>
            </form> --}}
        </div>
    </nav>
    {{ $slot }}
    <footer id="footer" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 "
    {{-- style="background-color: rgb(5, 5, 15);color: white" --}}
    >
        <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-1" style="width: 145px;">
        <h5 class="text-3xl">Stay in touch with the latest Products</h5>
        <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

        <div class="mt-10">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                <form method="POST" action="/newsletter" class="lg:flex text-sm">
                    @csrf

                    <div class="lg:py-3 lg:px-5 flex items-center">
                        <label for="email" class="hidden lg:inline-block">
                            <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                        </label>

                        <input id="email"
                               type="text"
                               name="email"
                               placeholder="Your email address"
                               class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        @error('email')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                    >
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
        <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    {{-- <script src="{{assert('public/app.js')}}"></script> --}}
</footer>
<script>
    // alert('hi');
dark_btn=document.getElementById('dark_btn');
white_btn=document.getElementById('white_btn');
html=document.getElementById('html');
nav_header=document.getElementById('nav_header');
footer=document.getElementById('footer');
category_header=document.getElementById('category_header');
main=document.getElementById('main');
dark_btn.onclick=function(){
    dark_btn.style.background='rgb(1, 1, 19)';
    dark_btn.style.color='white';
    document.body.style.background='rgb(1, 1, 19)';
    document.body.style.transition='0.7s';
    html.style.background='rgb(1, 1, 19)e';
    html.style.color='white';
    nav_header.style.background='rgb(1, 1, 19)';
    nav_header.style.color='white';
    footer.style.background='rgb(1, 1, 19)';
    footer.style.color='white';
    category_header.style.background='rgb(1, 1, 19)';
    // category_header.style.color='white';
    main.style.background='rgb(1, 1, 19)';
    main.style.color='white';
}

white_btn.onclick=function(){
    white_btn.style.background='black';
    white_btn.style.color='white';
    document.body.style.background='white';
    document.body.style.transition='0.7s';
    html.style.background='white';
    html.style.color='black';
    nav_header.style.background='white';
    nav_header.style.color='black';
    footer.style.background='white';
    footer.style.color='black';
    category_header.style.background='white';
    category_header.style.color='black';
    main.style.background='white';
    main.style.color='black';
}
</script>
</section>

@if(session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
        class="fixed bg-green-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
{{--        <p>{{ session()->get('success') }}</p>--}}
        <p>{{ session('success') }}</p>
    </div>
@endif
</body>
</html>
