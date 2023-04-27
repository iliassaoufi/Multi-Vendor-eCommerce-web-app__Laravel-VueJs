<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\favoris;
use Illuminate\Support\Facades\DB;

class FavorisController extends Controller
{
   function userfavoris($id){
    	$result=DB::select( DB::raw("SELECT produit_id FROM favoris where user_id=$id"));
       return $result;
    }

    function Addfavoris(Request $request){

    	$cmnt=new favoris;
    	$cmnt-> produit_id = $request->produit_id;
    	$cmnt-> user_id= $request->user_id;
       
        
            $result=$cmnt->save();
            if($result){
            	return "added";
            }
            else{
            	return " not added";
            }
    }
    function delete($id){
    	$favoris=favoris::find($id);
    	$result=$favoris->delete();
    	if($result){
            	return " deleted";
            }
            else{
            	return " not deleted";
            }
    }
}
