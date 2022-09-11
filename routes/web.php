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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function () {

        Route::get('/brands', function () {
            return view('admin/brands');
        });

        Route::get('/sdeletebrands', function () {
            return view('admin/sdeletebrands');
        });




        Route::get('/coloroptions', function () {
            return view('admin/coloroptions');
        });
        Route::get('/sdelcoloroptions', function () {
            return view('admin/sdelcoloroptions');
        });


        Route::get('/sizeoptions', function () {
            return view('admin/sizeoptions');
        });
        Route::get('/sdelsizeoptions', function () {
            return view('admin/sdelsizeoptions');
        });


        Route::get('/weightoptions', function () {
            return view('admin/weightoptions');
        });
        Route::get('/sdelweightoptions', function () {
            return view('admin/sdelweightoptions');
        });

        Route::get('/fourthoptions', function () {
            return view('admin/fourthoptions');
        });
        Route::get('/sdelfourthoptions', function () {
            return view('admin/sdelfourthoptions');
        });


        Route::get('/fifthoptions', function () {
            return view('admin/fifthoptions');
        });
        Route::get('/sdelfifthoptions', function () {
            return view('admin/sdelfifthoptions');
        });





        Route::get('/tagitems', function () {
            return view('admin/tagitems');
        });
        Route::get('/sdeltagitems', function () {
            return view('admin/sdeltagitems');
        });


        Route::get('/tagproducts', function () {
            return view('admin/tagproducts');
        });
        Route::get('/sdeltagproducts', function () {
            return view('admin/sdeltagproducts');
        });



        Route::get('/categoryitems', function () {
            return view('admin/categoryitems');
        });
        Route::get('/sdelcategoryitems', function () {
            return view('admin/sdelcategoryitems');
        });


        Route::get('/categoryproducts', function () {
            return view('admin/categoryproducts');
        });
        Route::get('/categoryproducts', function () {
            return view('admin/categoryproducts');
        });

        Route::get('/items', function () {
            return view('admin/items');
        });

        Route::get('/allbrands', function () {
            return view('admin/allbrands');
        });

    });


    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/brands', function () {
            return view('users/brands');
        });

        Route::get('/brandsdetails', function () {
            return view('users/brandsdetails');
        });

    });


});
