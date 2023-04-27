<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\image;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    function productImages($id){
    	$result=DB::select( DB::raw("SELECT id, path FROM images where produit_id=$id"));
       return $result;
    }
function getById($id){

    	 $result=image::find($id);
    	 if(is_null($result)){
    	 	return  "produit n'existe pas ";
    	 }
    	 return $result;

    }
    function AddImage(Request $request){
      
    $result1=$request->file('file')->store('appImages');
    $image=new image;
    $image-> produit_id =$request->produit_id;
        $image-> path= $result1;
       
          $result=$image->save();
          if($result){
            return "image added";
          }
          else{
            return "image not added";
          }
  }
    function updateImage(Request $request,$id){
    	$image=image::find($id);
    	$image-> produit_id = $request->produit_id;
          $image-> path=$request-> path;
          
          
            $result=$image->save();
            if($result){
            	return " image updated";
            }
            else{
            	return "image not updated";
            }
    }
      function delete($id){
    	$image=image::find($id);
    	$result=$image->delete();
    	if($result){
            	return "image deleted";
            }
            else{
            	return "image not deleted";
            }
    }
  
}
