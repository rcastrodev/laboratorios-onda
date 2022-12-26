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
    return view('welcome');
});

Auth::routes(['register' => false]);
Route::get('/', 'PagesController@home')->name('index');
Route::get('/quienes-somos', 'PagesController@empresa')->name('empresa');
Route::get('/categorias', 'PagesController@categorias')->name('categorias');
Route::get('/categoria/{id}', 'PagesController@categoria')->name('categoria');
Route::get('/producto/{id}', 'PagesController@producto')->name('producto');
Route::get('/industrias', 'PagesController@industrias')->name('industrias');
Route::get('/clientes', 'PagesController@clientes')->name('clientes');
Route::get('/solicitud-de-presupuesto', 'PagesController@cotizacion')->name('cotizacion');
Route::get('/contacto', 'PagesController@contacto')->name('contacto');
Route::post('enviar-cotizacion', 'MailController@quote')->name('send-quote');
Route::post('enviar-contacto', 'MailController@contact')->name('send-contact');
Route::get('product/content/ficha-tecnica/{id?}', 'ProductController@fichaTecnica')->name('ficha-tecnica');
Route::post('newsletter', 'NewsLetterController@storeNewsletter')->name('newsletter.store');

Route::middleware('auth')->prefix('admin')->group(function () {

    /** Page Home */
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('home/content', 'HomeController@content')->name('home.content');
    Route::post('home/content/generic-section/store', 'HomeController@store')->name('home.content.generic-section.store');
    Route::post('home/content/generic-section/update', 'HomeController@update')->name('home.content.generic-section.update');
    Route::post('home/updateInfo', 'HomeController@updateInfo')->name('home.update-info');
    Route::delete('home/content/{id}', 'HomeController@destroy')->name('home.content.destroy');
    Route::get('home/content/slider/get-list', 'HomeController@sliderGetList')->name('home.slider.get-list');
    /** Fin home*/

    /** Page Company */
    Route::get('company/content', 'CompanyController@content')->name('company.content');
    Route::post('company/content/store-slider', 'CompanyController@storeSlider')->name('company.content.storeSlider');
    Route::post('company/content/caracteristica-store', 'CompanyController@CaracteristicasStore')->name('company.content.caracteristicasStore');
    Route::post('company/content/update-slider', 'CompanyController@updateSlider')->name('company.content.updateSlider');
    Route::post('company/content/update-info', 'CompanyController@updateInfo')->name('company.content.updateInfo');
    Route::delete('company/content/{id}', 'CompanyController@destroy')->name('company.content.destroy');
    Route::get('company/content/slider/get-list', 'CompanyController@sliderGetList')->name('company.slider.get-list');
    Route::get('company/content/caracteristicas/get-list', 'CompanyController@caracteristicasGetList');
    /** Fin company*/

    /** Page Category */
    Route::get('/category', 'CategoryController@index')->name('category');
    Route::get('category/content', 'CategoryController@content')->name('category.content');
    Route::get('category/content/{id}', 'CategoryController@findContent');
    Route::post('category/content/store', 'CategoryController@store')->name('category.content.store');
    Route::post('category/content/update', 'CategoryController@update')->name('category.content.update');
    Route::delete('category/content/{id}', 'CategoryController@destroy')->name('category.content.destroy');
    Route::get('category/content/slider/get-list', 'CategoryController@sliderGetList')->name('category.slider.get-list');
    /** Fin Category*/

    /** Page Product */
    Route::get('product/content', 'ProductController@content')->name('product.content');
    Route::get('product/content/create', 'ProductController@create')->name('product.content.create');
    Route::post('product/content/store', 'ProductController@store')->name('product.content.store');
    Route::get('product/content/{id}/edit', 'ProductController@edit')->name('product.content.edit');
    Route::put('product/content', 'ProductController@update')->name('product.content.update');
    Route::delete('product/content/{id}', 'ProductController@destroy')->name('product.content.destroy');
    Route::get('product/content/get-list', 'ProductController@getList')->name('product.content.get-list');
    Route::get('product/content/find-product/{id?}', 'ProductController@find')->name('product.content.find');
    Route::delete('/ficha-tecnica/{id}', 'ProductController@borrarFichaTecnica')->name('borrar-ficha-tecnica');
    Route::get('/product/content/images/{product?}', 'ProductController@images')->name('product.images');
    Route::get('/product/content/image/{id?}', 'ProductController@image')->name('product.image');
    Route::post('/product/content/images', 'ProductController@imageCreate')->name('product.create-image');
    Route::post('/product/content/images-update', 'ProductController@imageUpdate')->name('product.update-image');
    Route::delete('product/content/image/{id}', 'ProductController@imageDestroy')->name('product.destroy.image');
    /** Fin product*/

    /** Page Product Picture */
    Route::delete('product-picture/content/destroy/{id}', 'ProductPictureController@destroy')->name('product-picture.content.destroy');
    /** Fin product picture*/

    /** Page Services */
    Route::get('industry/content', 'ServiceController@content')->name('service.content');
    Route::post('industry/content/generic-section/store', 'ServiceController@store')->name('service.content.generic-section.store');
    Route::post('industry/content/generic-section/update', 'ServiceController@update')->name('service.content.generic-section.update');
    Route::delete('industry/content/{id}', 'ServiceController@destroy')->name('service.content.destroy');
    Route::get('industry/content/slider/get-list', 'ServiceController@sliderGetList')->name('service.slider.get-list');
    /** Fin Services*/

    /** Page Client */
    Route::get('client/content', 'ClientController@content')->name('client.content');
    Route::post('client/content/generic-section/store', 'ClientController@store')->name('client.content.generic-section.store');
    Route::post('client/content/generic-section/update', 'ClientController@update')->name('client.content.generic-section.update');
    Route::delete('client/content/{id}', 'ClientController@destroy')->name('client.content.destroy');
    Route::get('client/content/slider/get-list', 'ClientController@sliderGetList')->name('client.slider.get-list');
    /** Fin Client*/

    /** Page newsletter */
    Route::get('newsletter/content', 'NewsLetterController@content')->name('newsletter.content');
    Route::get('newsletter/content/get-list', 'NewsLetterController@getList')->name('newsletter.content.get-list');
    Route::delete('newsletter/content/{id}', 'NewsLetterController@destroy')->name('newsletter.content.destroy');
    /** Fin newsletter*/

    Route::get('data/content', 'DataController@content')->name('data.content');
    Route::put('data/content', 'DataController@update')->name('data.content.update');
    
    Route::get('content/', 'ContentController@content')->name('content');
    Route::get('content/{id}', 'ContentController@findContent');

    Route::get('user/get-list', 'UserController@getList')->name('user.get-list');
    Route::resource('user', 'UserController');
});
