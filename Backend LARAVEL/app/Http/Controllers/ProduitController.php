<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produit;
use Illuminate\Support\Facades\DB;

class ProduitController extends Controller
{
    // get all stores 
    function list(){
       
       //$result=Store::all();
       $result=DB::select( DB::raw("SELECT id FROM produits"));
       return $result;
    }
    function searchProducts($id){
      $sql = "SELECT produits.* , (SELECT images.path FROM images WHERE images.produit_id = produits.id ORDER BY images.id LIMIT 1 ) as path FROM produits WHERE titre like \"%$id%\" "; 
      $result=DB::select( DB::raw($sql));
      return $result;
   }
    function newProducts(){
       
       //$result=Store::all();
       $result=DB::select( DB::raw("SELECT id FROM `produits` ORDER BY created_at DESC LIMIT 6"));
       return $result;
    }
    function bestProducts(){
       //SELECT produits.* FROM `carte_items` INNER JOIN produits on produits.id = carte_items.produit_id GROUP by produit_id ORDER by COUNT(produit_id) DESC

       //$result=Store::all();
       $result=DB::select( DB::raw("SELECT `produit_id` as id  FROM `carte_items` GROUP by produit_id ORDER by COUNT(produit_id) DESC LIMIT 8"));
       return $result;
    }
    function SameStoreProducts($id){
      $sql = "SELECT id FROM `produits` WHERE store_id = $id ORDER BY created_at DESC LIMIT 4      "; 
      $result=DB::select( DB::raw($sql));
      return $result;
   }

    function StoreProducts($id){
       $sql = "SELECT produits.* , (SELECT images.path FROM images WHERE images.produit_id = produits.id ORDER BY images.id  LIMIT 1 ) as path FROM produits WHERE produits.store_id= ".$id; 
    	$result=DB::select( DB::raw($sql));
       return $result;
    }

    
    function getById($id){
     
      $result=DB::select(" SELECT produits.* , categories.name as catName FROM `produits` LEFT JOIN categories on categories.id = produits.category_id    WHERE produits.id = " . $id);
      if(is_null($result)){
         return  "produit n'existe pas ";
      }
     
      return $result;

  }


    function AddProduct(Request $request){

    	$produit=new produit;
    	$produit-> store_id = $request->store_id;
      $produit-> titre=$request-> titre;
      $produit->  description = $request->  description;
      $produit-> shortDescription= $request-> shortDescription;
      $produit-> qte = $request-> qte;
      $produit-> prix = $request-> prix;
      $produit-> option_name = $request-> option_name;
      $produit-> category_id = $request-> category_id;

      $result=$produit->save();
      if($result){ 
         $r = ["productId"=>  $produit->id , "message"=>"product added"];
         return response()->json($r);
         
               
      }
      else{
         return "product not added";
      }
   }
   function updateProduct(Request $request,$id){
   $produit=produit::find($id);
  
   $produit-> titre=$request-> titre;
   $produit->  description = $request->  description;
   $produit-> shortDescription= $request-> shortDescription;
   $produit-> qte = $request-> qte;
   $produit-> prix = $request-> prix;

         $result=$produit->save();


         if($result){
            return "product updated";
         }
         else{
            return "product not updated";
         }
    }


    function delete($id){
    	$produit=produit::find($id);
    	$result=$produit->delete();
    	if($result){
            	return "produit deleted";
            }
            else{
            	return "produit not deleted";
            }
    }
}
