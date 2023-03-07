<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\GdnController;
use App\Http\Controllers\GrnController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\inventory;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutControler;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\railticket;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SuppliersController;
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

Route::get('/', [LoginController::class, "index"])->name('loginpage');
Route::post('/validate_login', [LoginController::class, "validate_login"])->name('validate_login');
Route::get('/dashboard', [HomeController::class, "index"])->name('homePage');
Route::get('/traintime', [ProductController::class, "traintime"])->name('traintime');
Route::post('/add_ticket', [railticket::class, "add"])->name('add_ticket');
Route::get('/viewconfirmticket', [railticket::class, "confirmticket"])->name('viewconfirmticket');

Route::get('/logout', [LogoutControler::class, "index"])->name('logout');
Route::get('/deleteproduct/{id}', [ProductController::class, "destroy"])->name('deleteproduct');
Route::get('/viewProducts', [ProductController::class, "viewproducts"])->name('viewproducts');
Route::get('/viewProducts', [ProductController::class, "showtable"])->name('viewproducts');
Route::get('/viewcancelticket', [ProductController::class, "cancelticket"])->name('viewcancelticket');

Route::patch('/editproduct/{id}', [ProductController::class, "update"])->name('product.update');

// Route::get('/', [HomeController::class, "index"])->name('homePage');

Route::get('/registration', [RegisterController::class, "index"])->name('registration');
Route::get('/registration', [RegisterController::class, "showtype"])->name('registration');
Route::post('/registration', [RegisterController::class, "user_registration"])->name('user_registration');
Route::patch('/editregistration/{id}', [RegisterController::class, "update"])->name('resultsuser.update');
Route::get('/deleteuser/{id}', [RegisterController::class, "destroy"])->name('deleteuser');
Route::get('/viewDetails', [RegisterController::class, "viewDetails"])->name('viewDetails');

// Default ::

Route::get('/productPage', [ProductController::class, "index"])->name('productPage');
Route::post('/viewProducts', [ProductController::class, "store"])->name('add_product');   //insert method



// Route::put('/update/{id}', [ProductController::class, "update"])->name('product.update');
// Route::patch('/view/{id}', ['as' => 'data.update', 'uses' => 'ProductController@view']);

Route::patch('/editproduct/{id}', [ProductController::class, "update"])->name('product.update');



Route::get('/locationPage', [LocationController::class, "index"])->name('locationPage');
Route::post('/viewLocation', [LocationController::class, "store"])->name('add_location');
Route::get('/viewLocation', [LocationController::class, "viewlocation"])->name('viewLocation');
Route::get('/viewLocation', [LocationController::class, "show"])->name('viewLocation');
Route::get('/deletelocation/{id}', [LocationController::class, "destroy"])->name('deletelocation');
Route::post('/editlocation/{id}', [LocationController::class, "update"])->name('location.update');
Route::get('/viewLocationDetails/{id}', [LocationController::class, "viewDetails"])->name('viewLocationDetails');


Route::get('/suppliersPage', [SuppliersController::class, "index"])->name('suppliersPage');
Route::get('/viewSupplier', [SuppliersController::class, "viewSupplier"])->name('viewSupplier');
Route::post('/viewSupplier', [SuppliersController::class, "add_supplier"])->name('add_supplier');
Route::get('/viewSupplier', [SuppliersController::class, "show"])->name('viewSupplier');
Route::get('/deletesupplier/{id}', [SuppliersController::class, "destroy"])->name('deletesupplier');
Route::patch('/editsupplier/{id}', [SuppliersController::class, "update"])->name('supplier.update');
Route::get('/viewSupplierDetails/{id}', [SuppliersController::class, "viewDetails"])->name('viewSupplierDetails');



Route::get('/grnPage', [GrnController::class, "index"])->name('grnPage');
Route::get('/viewGrn', [GrnController::class, "viewGrn"])->name('viewGrn');
Route::post('/viewGrn', [GrnController::class, "add_grn"])->name('add_grn');
Route::get('/viewGrn', [GrnController::class, "show"])->name('viewGrn');
Route::get('/deletegrn/{id}', [GrnController::class, "destroy"])->name('deletegrn');
Route::get('/autocomplete-search', [GrnController::class, 'autocompleteSearch']);
Route::patch('/editgrn/{id}', [GrnController::class, "update"])->name('grn.update');
Route::get('/addGrn', [GrnController::class, "addGrn"])->name('addGrn');
Route::get('/addGrn', [GrnController::class, "showaddgrn"])->name('addGrn');
Route::post('/addGrn', [GrnController::class, "add"])->name('posts.add');

Route::get('/gdnPage', [GdnController::class, "index"])->name('gdnPage');
Route::get('/addGdn', [GdnController::class, "addGdn"])->name('addGdn');
Route::get('/addGdn', [GdnController::class, "showaddgdn"])->name('addGdn');    // get data from foreign key
Route::get('/addGdn', [GdnController::class, "showaddgdn"])->name('addGdn');

Route::get('/viewBrand', [BrandController::class, "viewBrand"])->name('viewBrand');
Route::get('/viewBrand', [BrandController::class, "show"])->name('viewBrand');
Route::get('/deletebrand/{id}', [BrandController::class, "destroy"])->name('deletebrand');
Route::post('/viewBrand', [BrandController::class, "add_brand"])->name('add_brand');
Route::patch('/editbrand/{id}', [BrandController::class, "update"])->name('brand.update');
