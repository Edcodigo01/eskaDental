<?php

use Illuminate\Support\Facades\Route;

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
    return view('front/home/index');
})->name('inicio');

Route::get('servicios', function () {
    return view('front/servicios/index');
})->name('servicios');

Route::get('nosotros', function () {
    return view('front/nosotros/index');
})->name('nosotros');

Route::get('instalaciones', function () {
    return view('front/instalaciones/index');
})->name('instalaciones');

Route::get('blog','front\blogController@index')->name('blog');
Route::get('blog/{categoria}/{titulo}','front\blogController@article_detail')->name('article_detail');
// Route::get('blog', function () {
//     return back();
// })->name('blog');
Route::get('change_view/{type_view}','front\blogController@change_view')->name('change_view');

Route::get('contactanos', function () {
    return view('front/contactanos/index');
})->name('contactanos');

Route::post('mail_contact','contactController@mail_contact')->name('mail_contact');
Route::get('mail_view/{view}','contactController@mail_view')->name('mail_view');

// ---------------admin------------------
Route::get('admin', function () {
    if (Auth::check()) {
       return redirect(url('admin/blog/articulos'));
    }else{
       return redirect(url('admin/inicio-de-sesion'));
    }
});

// sesión
Route::get('admin/inicio-de-sesion','Controller@inicio_de_sesion');
Route::post('admin/iniciar-sesion','Controller@iniciar_sesion');
Route::get('admin/cerrar-sesion','Controller@cerrar_sesion');
Route::group(['middleware' => ['auth']], function(){
    // imágenes
    Route::post('subir-imagen','admin\imageController@upload_image')->name('subir-imagen');
    Route::post('eliminar-imagen/{image_id}/{model}/{model_id}','admin\imageController@delete_image');
    Route::post('establecer-como-principal/{image_id}/{model}/{model_id}','admin\imageController@set_as_main_image');
});

// FILL
Route::post('subcaterias-de','Controller@fill_subcategories');
Route::post('subcaterias-de-id','Controller@fill_subcategories_id');

//admin / blog
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){


   Route::get('usuario','admin\userController@index');
   Route::post('change-password','admin\userController@change_password');

   Route::prefix('blog/articulos')->group(function () {
       Route::get('/','admin\blogController@index');
       Route::post('crear','admin\blogController@create');
       Route::post('guardar','admin\blogController@store');
       Route::post('{id}/editar','admin\blogController@edit');
       Route::post('actualizar','admin\blogController@update');
       Route::post('{id}/borrar','admin\blogController@delete');
       // Route::post('{id}/view-restablecer','admin\subcategoryController@view_restablecer');

       Route::post('{id}/restablecer','admin\subcategoryController@restore');
   });

   Route::prefix('blog/categorias')->group(function () {
       Route::get('/','admin\categoryController@index');
       Route::post('crear','admin\categoryController@create');
       Route::post('guardar','admin\categoryController@store');
       Route::post('{id}/editar','admin\categoryController@edit');
       Route::post('{id}/actualizar','admin\categoryController@update');
       Route::post('{id}/borrar','admin\categoryController@delete');
       Route::post('{id}/restablecer','admin\categoryController@restore');
   });

   Route::prefix('blog/subcategorias')->group(function () {
       Route::get('/','admin\subcategoryController@index');
       Route::post('crear/{category_id?}','admin\subcategoryController@create');
       Route::post('guardar','admin\subcategoryController@store');
       Route::post('{id}/editar','admin\subcategoryController@edit');
       Route::post('{id}/actualizar','admin\subcategoryController@update');
       Route::post('{id}/borrar','admin\subcategoryController@delete');
       Route::post('{id}/restablecer','admin\subcategoryController@restore');
   });
});

// Route::middleware(['first', 'second'])->group(function () {
//     Route::get('/', function () {
//         // Uses first & second middleware...
//     });
//
//     Route::get('/user/profile', function () {
//         // Uses first & second middleware...
//     });
// });
