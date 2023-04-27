<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\commentaireController;
use App\Http\Controllers\FavorisController;
use App\Http\Controllers\CarteController;
use App\Http\Controllers\ItemController;
use App\Models\User;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OptionController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// user 
Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
    
    });

Route::post("login",[UserController::class,'login']);
Route::post("register",[UserController::class,'register']);
Route::post('logout', [UserController::class, 'logout']);
Route::get('user-profile', [UserController::class, 'userProfile']);
Route::post('UpdateUserRole/{id}', [UserController::class, 'UpdateUserRole']);
Route::get('GetUserById/{id}', [UserController::class, 'GetUserById']);


//store 
Route::get("allStores",[StoreController::class,'list']);
Route::get("SpecificStore/{id}",[StoreController::class,'getById']);
Route::get("searshStore/{id}",[StoreController::class,'searshStore']);
Route::post("AddStore",[StoreController::class,'AddStore']);
Route::post("updateStore/{id}",[StoreController::class,'updateStore']);
Route::post("deleteStore/{id}",[StoreController::class,'delete']);

// produit
Route::get("allproducts",[ProduitController::class,'list']);
Route::get("newProducts",[ProduitController::class,'newProducts']);
Route::get("bestProducts",[ProduitController::class,'bestProducts']);
Route::get("SameStoreProducts/{id}",[ProduitController::class,'SameStoreProducts']);
Route::get("searchProducts/{id}",[ProduitController::class,'searchProducts']);

Route::get("StoreProduct/{id}",[ProduitController::class,'StoreProducts']);
Route::get("SpecificProduit/{id}",[ProduitController::class,'getById']);
Route::post("Addproduit",[ProduitController::class,'AddProduct']);
Route::post("updateProduct/{id}",[ProduitController::class,'updateProduct']);
Route::post("deleteProduit/{id}",[ProduitController::class,'delete']);

//images 
Route::get("productImages/{id}",[ImageController::class,'productImages']);
Route::get("SpecificImage/{id}",[ImageController::class,'getById']);
Route::post("AddImage",[ImageController::class,'Addimage']);
Route::post("updateImage/{id}",[ImageController::class,'updateImage']);
Route::post("deleteimage/{id}",[ImageController::class,'delete']);
//commentaire 
Route::get("productComments/{id}",[commentaireController::class,'productComments']);
Route::get("productRatingComments/{id}",[commentaireController::class,'productRatingComments']);
Route::post("AddComment",[commentaireController::class,'AddComment']);
Route::post("updateComment/{id}",[commentaireController::class,'updateComment']);
Route::post("deletecmnt/{id}",[commentaireController::class,'delete']);

//favoris
Route::get("userfavoris/{id}",[FavorisController::class,'userfavoris']);
Route::post("Addfavoris",[FavorisController::class,'Addfavoris']);
Route::post("deletefavoris/{id}",[FavorisController::class,'delete']);
// cartes
Route::post("createOrder",[CarteController::class,'createOrder']);
Route::post("userCartes/{id}",[CarteController::class,'userCartes']);
Route::post("currentCarte/{id}",[CarteController::class,'currentCarte']);
Route::post("deleteCarte/{id}",[CarteController::class,'delete']);
Route::get("StoreOrder/{id}",[CarteController::class,'StoreOrder']);

// cartes items
Route::post("createOrderItem",[ItemController::class,'createOrderItem']);
Route::get("carteProducts/{id}",[ItemController::class,'carteProducts']);
Route::post("AddItemToCarte",[ItemController::class,'AddItemToCarte']);
Route::post("deleteItem/{id}",[ItemController::class,'delete']);
Route::get("StoreOrderItem/{id}",[ItemController::class,'StoreOrderItem']);

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

// Contact 
Route::post("AddMessage",[ContactController::class,'AddMessage']);

// Category  
Route::get("getStoreCategory/{id}",[CategoryController::class,'getStoreCategory']);
Route::post("addCategory",[CategoryController::class,'addCategory']);
Route::post("updateCategory/{id}",[CategoryController::class,'updateCategory']);
Route::delete("deleteCategory/{id}",[CategoryController::class,'deleteCategory']);

// option 
Route::post("addOption",[OptionController::class,'addOption']);
Route::get("getOption/{id}",[OptionController::class,'getOption']);
