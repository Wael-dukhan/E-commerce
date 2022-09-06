<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use MailchimpMarketing\ApiClient;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostsController::class, 'index'])->name('home');
// Route Wildcard Constraints
Route::get('posts/{post:slug}', [PostsController::class, 'show']);

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('/cart',[CartController::class,"store"]);
Route::get("/carts",[CartController::class,"index"])->name('cart.index');
Route::get('/carts/edit',[CartController::class,"edit"]);
Route::put('/carts/update',[CartController::class,"update"]);
Route::delete('/carts/destroy',[CartController::class,"destroy"]);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');


Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');


Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

//Route::resource('posts', PostsController::class)->only([
//    'create', 'show', 'edit', 'store', 'destroy'
//]);



Route::resource('categories', CategoryController::class);


//Route::get('categories/{category:name}', function (Category $category) {
//    return view('posts.index', [
//        'posts' => $category->posts,
//        'categories' => Category::all(),
//        'currentCategory' => $category,
//    ]);
//})->name('category');

///author/{{ $post->author->id }}
Route::get('author/{author:username}', function (User $author) {
    return view('posts.index', [
        'posts' => $author->posts
//            ->load(['category', 'author'])
    ]);
});

//programmer.test/users
//Route::get('users', [UsersController::class, 'index']);



Route::get('admin/posts/create', [PostsController::class, 'create'])->middleware('permissions');

Route::post('admin/posts', [PostsController::class, 'store'])->middleware('permissions');





Route::get('ping', function () {
    $mailchimp = new ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us11'
    ]);

//    $response = $mailchimp->ping->get();
//    $response = $mailchimp->lists->getAllLists();
//    $response = $mailchimp->lists->getList('d42c7aa757');

//    $response = $mailchimp->lists->addListMember('d42c7aa757', [
//        'email_address' => 'mustafa@gmail.com',
//        'status' => 'subscribed',
//    ]);


//    dd($response);
});



Route::post('newsletter', function () {

    request()->validate(['email' => 'required|email']);

    $mailchimp = new ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us11'
    ]);

    try {
        $response = $mailchimp->lists->addListMember('d42c7aa757', [
            'email_address' => request('email'),
            'status' => 'subscribed',
        ]);
    } catch (Exception $exception) {
        throw \Illuminate\Validation\ValidationException::withMessages([
            'email' => 'This email could not be added to our newsletter list.'
        ]);
    }


    return redirect('/')->with('success', 'You are now signed up for our newsletter');
});







