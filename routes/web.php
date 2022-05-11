<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BackController;

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

/*Front*/
Route::get('/', [HomeController::class,'index']);
Route::get('/index', [HomeController::class,'index']);
Route::get('/login', [HomeController::class,'login']);
Route::get('/logout', [HomeController::class,'logout']);
Route::post('/login', [HomeController::class,'loginCheck']);
Route::post('/register', [HomeController::class,'storeUser']);
Route::post('/checkWithdraw', [HomeController::class,'checkWithdraw']);
Route::post('/withdrawRequest', [HomeController::class,'withdrawRequest']);
Route::get('/packs', [HomeController::class,'packs']);
Route::get('/packs', [HomeController::class,'packs']);
Route::get('/dashboard', [HomeController::class,'dashboard']);
Route::get('/addPaymentHistory/{souscription}', [HomeController::class,'addPaymentHistory']);
Route::get('/userpacks', [HomeController::class,'userpacks']);
Route::post('/loadPack', [HomeController::class,'loadPack']);
Route::post('/emptyPackPerso', [HomeController::class,'emptyPackPerso']);
Route::post('/addToPack', [HomeController::class,'addToPack']);
Route::post('/loadPackPerso', [HomeController::class,'loadPackPerso']);
Route::post('/loadPackPersoSee', [HomeController::class,'loadPackPersoSee']);
Route::post('/activatePack', [HomeController::class,'activatePack']);
Route::get('/register/{user}', [HomeController::class,'register']);
Route::post('/createPackPerso', [HomeController::class,'createPackPerso']);


/*Back*/
Route::get('/admin/login', [BackController::class,'index']);
Route::get('/admin/index', [BackController::class,'dashboard']);
Route::get('/admin/packs', [BackController::class,'packs']);
Route::post('/storeItem', [BackController::class,'storeItem']);
Route::post('/updateItem', [BackController::class,'updateItem']);
Route::post('/storePack', [BackController::class,'storePack']);
Route::post('/getPack', [BackController::class,'getPack']);
Route::post('/getItem', [BackController::class,'getItem']);
Route::post('/updatePack', [BackController::class,'updatePack']);
Route::get('/admin/articles', [BackController::class,'articles']);
Route::get('/admin/deletePack/{id}', [BackController::class,'deletePack']);
Route::get('/admin/deleteUser/{id}', [BackController::class,'deleteUser']);
Route::get('/admin/deleteItem/{id}', [BackController::class,'deleteItem']);
Route::get('/admin/deleteSouscription/{id}', [BackController::class,'deleteSouscription']);
Route::get('/admin/retraits', [BackController::class,'retraits']);
Route::get('/admin/paiements', [BackController::class,'paiements']);
Route::get('/admin/souscriptions', [BackController::class,'souscriptions']);
Route::get('/admin/affiliations', [BackController::class,'affiliations']);
Route::get('/admin/trackings', [BackController::class,'trackings']);
Route::get('/admin/users', [BackController::class,'users']);
Route::post('/updateWithdrawStatus', [BackController::class,'updateWithdrawStatus']);
Route::post('/admin/login', [BackController::class,'control']);