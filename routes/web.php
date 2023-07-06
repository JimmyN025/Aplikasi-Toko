<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ExcelExport;
use App\Http\Controllers\JualController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;    
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Models\Jual;

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

Route::get('/', function () {
    return view('home',[
        "title" => "Home",
        'active'=> 'home',
    ]);
});



Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/jual', JualController::class)->middleware('auth');
Route::get('/export', [ExcelController::class, 'export'])->name('export');
// Route::get('dashboard/jual/excel', ExcelController::class);
Route::post('/dashboard/posts/fetch', [DashboardPostController::class, 'fetch'])->name('post.fetch');
Route::get('/dashboard/post/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show');



Route::get('/dashboard', function(){
    return view('dashboard.index');
} )->middleware('auth');




Route::get('/dashboard/jual/cetak', function(){
    return view('dashboard.jual.cetak', [
        'jual' => Jual::All()
    ]);
} )->middleware('auth');


// Route::get('/categories/{category:slug}', function(Category $category){
//     return view('posts',[
//         'title' => "Post By Category : $category->name",
//         'active'=> 'categories',
//         'posts' =>  $category->posts->load('category', 'author')
    

//     ] );
// });

// Route::get('/authors/{author:username}', function(User $author) {

//     return view('posts',[
//         'title' => "Post By Author : $author->name",
//         'posts' =>  $author->posts->load('category', 'author'),
       

//     ] );
// });



















//  Route::get('posts/{slug}', function($slug){
// // //     $posts = [
// // //     [
// // //         "title" => "New",
// // //         "slug"=>"judul-post-pertama",
// // //         "author" => "Me",
// // //         "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates quidem unde culpa eos placeat neque, iure odit qui perspiciatis, voluptate cum? Ab, alias. Alias quod ullam ad delectus eaque accusamus?"

// // //     ],
// // //     [
// // //         "title" => "New 2",
// // //         "slug"=>"judul-post-kedua",
// // //         "author" => "Myslef",
// // //         "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos libero cupiditate ullam tempore, quis earum ipsum eligendi eos, quam quidem, beatae doloribus deserunt asperiores aspernatur alias hic. Accusamus quibusdam velit, ipsa debitis quia aut! Debitis itaque facilis adipisci autem? Vitae at ducimus esse magnam repudiandae totam reiciendis exercitationem, sequi alias error dignissimos quam sed rerum tenetur maxime ullam eum debitis repellat incidunt nemo optio. Sint eos aspernatur fugit dolore porro animi quidem optio tempore ab? At, vero sequi nulla provident sunt repellat dicta iure laborum adipisci suscipit magnam consequatur odio necessitatibus alias doloribus dignissimos dolor. Veniam officia aliquid alias nisi."

// // //     ]
    

// // // ];

// //     // $new_post = [];
// //     // foreach ($posts as $post) {
// //     //     if ($post["slug"] === $slug) {
// //     //         $new_post = $post;
// //     //     }
// //     // }

//     return view('post',[
//     "title" => "Single Post",
//     "post" => Post::find($slug)

    
// ]);
//  });
