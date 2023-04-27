<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    function getStoreCategory($id){
        $result=DB::select( DB::raw("SELECT * FROM `categories` WHERE `store_id` = ".$id));
        return $result;
   }

    function addCategory(Request $request){
    $category=new Category;
    
      $category-> name=$request-> name;
      $category->  store_id = $request->  store_id;
     
      $result=$category->save();
      if($result){ 
         $r = [ "message"=>"category added"];
         return response()->json($r);
               
      }
      else{
         return "category not added";
      }
   }
   function updateCategory(Request $request , $id){

    $category=Category::find($id);
      $category-> name=$request-> name;
     
      $result=$category->save();
      if($result){ 
         $r = [ "message"=>"category update"];
         return response()->json($r);
               
      }
      else{
         return "category not update";
      }
   }
   function deleteCategory( $id){
       
    $category=Category::find($id);
    $result=$category->delete();
      if($result){ 
         $r = [ "message"=>"category delete"];
         return response()->json($r);
               
      }
      else{
         return "category not delete";
      }
   }
  
}
