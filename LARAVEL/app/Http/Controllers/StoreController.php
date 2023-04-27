<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
	// get all stores 
    function list(){
       
       //$result=Store::all();
       $result=DB::select( DB::raw("SELECT id FROM stores"));
       return $result;
    }
    function searshStore($id){
       
        //$result=Store::all();
        $result=DB::select( DB::raw("SELECT * FROM `stores` WHERE name like '%$id%' "));
      
        return $result;
     }


    function getById($id){

    	 $result=Store::find($id);
    	 if(is_null($result)){
    	 	return  "store n'existe pas ";
    	 }
    	 return $result;

    }


    function AddStore(Request $request){
        $imgLogo=$request->file('imgLogo')->store('appImages');
        $imgCover=$request->file('imgCover')->store('appImages');

    	$store=new Store;
    	$store-> name = $request->name;
        $store-> user_id=$request-> user_id;
        $store->  email = $request->  email;
        $store-> description= $request-> description;
        $store-> image_profil = $imgLogo;
        $store-> image_coverture = $imgCover;
        $store-> numero = $request->numero;
        $result=$store->save();
        if($result){
            $r = ["storeId"=>  $store->id , "message"=>"store added"];
            return response()->json($r);
            
        }
        else{
            return "store not added";
        }
    }
    function updateStore(Request $request,$id){
    	$store=Store::find($id);
    	$store-> name = $request->name;
        // $store-> user_id=$request-> user_id;
         $store->  email = $request->  email;
          $store-> description= $request-> description;
           //$store-> image_profil = $request-> image_profil;
           // $store-> image_coverture = $request-> image_coverture;
            $store-> numero = $request->numero;
            $result=$store->save();
            if($result){
            	return "store updated";
            }
            else{
            	return "store not updated";
            }
    }
    function delete($id){
    	$store=Store::find($id);
    	$result=$store->delete();
    	if($result){
            	return "store deleted";
            }
            else{
            	return "store not deleted";
            }
    }
}
