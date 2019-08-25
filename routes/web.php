<?php

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

//
//Route::get('/', function () {
//    return view('welcome');
//});

// User
use App\Product;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function() {
        Auth::routes(['verify' => true]);
        Route::get('/', 'HomeController@index');
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/category/{id}', 'HomeController@category')->name('front.category');
        Route::get('/section/{id}', 'HomeController@section')->name('front.section');
        Route::get('/product/{id}', 'HomeController@product')->name('front.product');

        Route::group([
            'middleware' => ['auth']
        ], function () {
            Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );

            // User Profile
            Route::get('/user/profile', 'ProfileController@showProfile')->name('user.profile.show');
            Route::put('/user/name/save', 'ProfileController@userNameSave')->name('user.name.save');
            Route::put('/user/type/save', 'ProfileController@userTypeSave')->name('user.type.save');
            Route::put('/user/email/save', 'ProfileController@userEmailSave')->name('user.email.save');
            Route::put('/user/tel/save', 'ProfileController@userTelSave')->name('user.tel.save');
            Route::put('/user/image/save', 'ProfileController@userImageSave')->name('user.image.save');

            // User favourites
            Route::get('/user/favourites', 'FavouriteController@get')->name('user.favourites.get');
            Route::post('/user/favourites/', 'FavouriteController@add')->name('user.favourites.add');
            Route::delete('/user/favourites/delete', 'FavouriteController@delete')->name('user.favourites.delete');

            // User Products
            Route::get('/user/products', 'ProductController@index')->name('user.products.index');
            Route::delete('/user/products/delete', 'ProductController@delete')->name('user.products.delete');
            Route::get('/products/create-product', 'ProductController@startCreation')->name('user.products.start-creation');
            Route::get('/products/create/{category}', 'ProductController@create')->name('user.products.create');
            Route::post('/products/create/store', 'ProductController@storeUpdate')->name('user.products.storeUpdate');
                // User Products Create Image Dropzone
                Route::post('/products/create/dropzone-upload-image', 'ProductController@dropzoneUploadProductImage')->name('dropzone-upload-product-image');
                Route::post('/products/create/dropzone-delete-image', 'ProductController@dropzoneDeleteProductImage')->name('dropzone-delete-product-image');
                Route::get('/products/edit/dropzone-get-images', 'ProductController@dropzoneGetProductImages')->name('dropzone-get-product-images');
                Route::get('/products/{product}/edit', 'ProductController@edit')->name('user.products.edit.form');

            // Chat
            Route::get('/chat', 'ChatController@index')->name('chat.index');
            Route::get('/chat-contacts', 'ChatController@getContacts')->name('chat.contacts');
        });
    });


// Admin
Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth', 'admin']
], function () {
    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');

    Route::resource('/fields', 'Admin\FieldController');
    Route::resource('/categories', 'Admin\CategoryController');

    Route::get('/categories/{category}/sections/', 'Admin\CategoryController@categorySections')->name('admin.category-sections');
    Route::get('/sections/{section}/products', 'Admin\ProductController@sectionProducts')->name('admin.section-products');

    Route::resource('/products', 'Admin\ProductController');

    Route::get('/profile', 'Admin\ProfileController@index')->name('profile.index');
    Route::put('/profile/update-data', 'Admin\ProfileController@updateData')->name('profile.update-data');
    Route::put('/profile/update-password', 'Admin\ProfileController@updatePassword')->name('profile.update-password');
    Route::get('/categories/fields/get', 'Admin\CategoryController@ajaxCategories')->name('categories.fields');
//    Route::get('/search', 'Admin\ProductController@search')->name('products.search');
});


