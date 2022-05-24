<?php


use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProfileController;
use App\Models\Bussinse;
use App\Models\City;
use Illuminate\Http\Request;
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

//Route::get("/products",[\App\Http\Controllers\Api\BussinseController::class,'index']);







Route::get("/getcity",function(Request $request){

    return City::all();

});

Route::get('/country',[CountryController::class,'index']);
Route::get('/', function () {

    //return
     Bussinse::select('name','id')->whereRelation(
        'cities','name','LIKE','%o%')->with('products:name,price,bussinse_id','cities:name')->get();

    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// useless routes
// Just to demo sidebar dropdown links active states.
Route::get('/buttons/text', function () {
    return view('buttons-showcase.text');
})->middleware(['auth'])->name('buttons.text');

Route::get('/buttons/icon', function () {
    return view('buttons-showcase.icon');
})->middleware(['auth'])->name('buttons.icon');

Route::get('/buttons/text-icon', function () {
    return view('buttons-showcase.text-icon');
})->middleware(['auth'])->name('buttons.text-icon');
Route::get('/buttons/t', function () {
    return view('buttons-showcase.text-icon');
})->middleware(['auth'])->name('buttons.text-icon');

Route::get("/heho",function(){

    return view("components.sidebar.sidebar");
});

Route::apiResource('products',\App\Http\Controllers\ProductController::class);



require __DIR__ . '/auth.php';
