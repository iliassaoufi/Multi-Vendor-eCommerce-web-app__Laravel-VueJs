<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\carte;
use Illuminate\Support\Facades\DB;

class CarteController extends Controller
{
   //les cartes deja crees et achetees par le user 
   function createOrder(Request $request){
      $carte=new carte;
      $carte->user_id = $request->user_id;
      $carte->statut_achat = $request->statut_achat;
      $carte->name = $request->name;
      $carte->phone = $request->phone;
      $carte->email = $request->email;
      $carte->address = $request->address;

      $carte-> note = $request->note;
         
      $result= $carte->save();
      if($result){
         $r = ["orderId"=>  $carte->id , "message"=>"order created"];
         return response()->json($r);
      }
      else{
         return "order not created";
      }
   }
	//les cartes deja crees et achetees par le user 
     function userCartes($id){
    	$result=DB::select( DB::raw("SELECT * FROM cartes where user_id=$id " ));
       return $result;
    }

    //la  Carte actuelle
    function currentCarte($id){
    	$result=DB::select( DB::raw("SELECT * FROM cartes where user_id=$id and statut_achat=0"));
    	if($result==null){
    		return "vous n'avez pas une carte ";
    	}
       return $result;
    }

    function delete($id){
    	$carte=carte::find($id);
    	$result=$carte->delete();
    	if($result){
            	return "carte deleted";
            }
            else{
            	return "carte not deleted";
            }
    }

}
