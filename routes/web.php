<?php

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// essa linha de rotas substitui todas rotas abaixo até route::post 
Route::resource('products', 'ProductController'); //-> middleware ('auth');

/*
//deletar produtos
Route::delete('products/{id}', 'ProductController@destroy')->name('products.destroy');

//editar registro
http://app-laravel.test/products/3/edit
Route::put('products/{id}', 'ProductController@update')->name('products.update');

Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit');

http://app-laravel.test/create
Route::get('products/create', 'ProductController@create')->name('products.create');

Route::get('products/{id}', 'ProductController@show')->name('products.show');

http://app-laravel.test/products
//rota de productController
Route::get('products', 'ProductController@index')-> name('products.index');

//para registrar coisas
Route::post ('products','ProductController@store')-> name('products.store');
*/


Route::get('/login', function () {
    return 'login';
})-> name('login');                 


/*
//simplificando o grupo de rotas
Route::middleware([])->group(function () {

    //se quiser mudar prefixo, nao precisa mudar nas rotas
    Route::prefix('admin')->group(function(){
        
        Route::namespace('Admin')-> group(function(){

            Route::name('admin')->group(function(){

                Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
        
                Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
                
                Route::get('/produtos', 'TesteController@teste')->name('products');
        
                Route::get('/', function () {
                    return redirect()->route('admin.dashboard');
                })->name('home');

              });
        });  
    });  
});
*/

Route::group([
    'middleware'=> [],
    'prefix' => 'admin', 
    'namespace' => 'Admin',
    'name' => 'admin.'
], function(){

                Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
         
                Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
                
                Route::get('/produtos', 'TesteController@teste')->name('products');

                Route::get('/', function () {
                    return redirect()->route('admin.dashboard');
                })->name('home');
});






//essa rota direciona para nome-url 
Route::get('redirect3', function () {
    return redirect()->route('url.name');
});

//route('url.name');

Route::get('/nome-url', function (){
    return 'hey hey hey';
})->name('url.name');



//para view estatica e simples
Route::view('/view', 'welcome');


//essa rota direciona para view welcome
//Route::view('');
Route::get('/view', function () {
    return view('welcome');
});


//essa rota direciona para a redirect2
Route::redirect('/redirect1', '/redirect2');

//essa rota direciona para a redirect2
/* Route::get('redirect1', function () {
    return redirect ('/redirect2');
});
*/

Route::get('redirect2', function () {
    return'redirect 02';
});


Route::get('/produtos/{idProduct?}', function($idProduct = ''){
    return "Produtos {$idProduct}";
});

Route::get('/categoria/{flag}/posts' , function($flag){
    return "posts da categoria : {$flag}";
});

Route:: match(['get', 'post'], 'match', function(){
    return 'match';
});

Route::any('/any', function(){
    return 'Any';
});

Route::post('/register', function(){
    return '';
});

Route::get('/empresa', function(){
    return 'sobre empresa';
});

Route::get('/contato', function(){
    return view('contact');
});

Route::get('/', function () {
    return view('welcome');
});
