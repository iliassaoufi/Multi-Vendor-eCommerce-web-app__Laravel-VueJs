<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\commentaires;
use Illuminate\Support\Facades\DB;

class commentaireController extends Controller
{
    function productComments($id){
        $sql = "SELECT users.name , c.`rating` , c.`message`        FROM commentaires as c         INNER JOIN users ON users.id = c.`user_id`    where c.produit_id =  $id"  ;
    	$result=DB::select( DB::raw( $sql));
       return $result;
    }           
    function productRatingComments($id){
    	$result=DB::select( DB::raw("SELECT AVG(rating) as productRating FROM commentaires where produit_id=$id"));
       return $result;
    }

    function AddComment(Request $request){

    	$cmnt=new commentaires;
    	$cmnt-> produit_id = $request->produit_id;
    	$cmnt-> user_id= $request->user_id;
        $cmnt-> message=$request-> message;
         
          
            $result=$cmnt->save();
            if($result){
            	return "cmnt added";
            }
            else{
            	return "cmnt not added";
            }
    }
    function updateComment(Request $request,$id){
    	$cmnt=commentaires::find($id);
    	$cmnt-> produit_id = $request->produit_id;
    	$cmnt-> user_id= $request->user_id;
        $cmnt-> message=$request-> message;
         
          
          
            $result=$cmnt->save();
            if($result){
            	return " cmnt updated";
            }
            else{
            	return "cmnt not updated";
            }
    }
      function delete($id){
    	$cmnt=commentaires::find($id);
    	$result=$cmnt->delete();
    	if($result){
            	return "cmnt deleted";
            }
            else{
            	return "cmnt not deleted";
            }
    }
}
