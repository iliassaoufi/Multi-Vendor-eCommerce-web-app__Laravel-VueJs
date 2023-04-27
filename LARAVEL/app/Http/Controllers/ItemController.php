<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\carteItem;
use App\Models\carte;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    function createOrderItem(Request $request){ 
        $carteItem=new carteItem;

        $carteItem->produit_id = $request->produit_id;
        $carteItem->carte_id = $request->carte_id;
        $carteItem->qte = $request->qte;
        $carteItem->prix = $request->prix;
       
           
        $result= $carteItem->save();
        if($result){
           $r = ["state"=>  true , "message"=>"carteItem created"];
           return response()->json($r);
        }
        else{
            $r = ["state"=>  false , "message"=>"carteItem not created"];
           return $r;
        }

    }


     function carteProducts($id){
         $sql =  "SELECT produits.titre , carte_items.* , images.path FROM carte_items INNER JOIN produits on produits.id = carte_items.produit_id INNER JOIN images on images.id = carte_items.produit_id WHERE carte_id =".$id ;
    	$result=DB::select( DB::raw(  $sql ));
       return $result;
    }
    function StoreOrderItem($id){
        $sql =  "SELECT produits.titre , carte_items.* , images.path , cartes.id as orderId ,  cartes.name , cartes.phone, cartes.email, cartes.address  , cartes.note FROM carte_items INNER JOIN produits on produits.id = carte_items.produit_id INNER JOIN images on images.id = carte_items.produit_id INNER JOIN cartes on cartes.id = carte_items.carte_id WHERE produits.store_id= ".$id ;
    	$result=DB::select( DB::raw(  $sql ));
       return $result;
    }

    

    
    function AddItemToCarte(Request $request){

   $result=DB::select( DB::raw("SELECT * FROM cartes where user_id=$request->user_id and statut_achat=0"));

    	if($result==null){
    	$carte=new carte;
    	$carte-> user_id = $request-> user_id;
    	$carte-> statut_achat =0;
         
         $result=$carte->save();
    		
    	}
    	$result=DB::select( DB::raw("SELECT * FROM cartes where user_id=$request->user_id and statut_achat=0"));
            	
           
    	$item=new carteItem;
    	$item-> carte_id = $result[0]->id;
        $item-> produit_id=$request-> produit_id;
        $item-> qte=$request-> qte;
        $item-> prix=$request-> prix;
        
          
        $result=$item->save();
            if($result){
            	return "item added";
            }
            else{
            	return "item not added";
            }
    }



	function delete($id){
    	$item=carteItem::find($id);
    	$result=$item->delete();
    	if($result){
            	return "item deleted";
            }
            else{
            	return "item not deleted";
            }
    }

}
