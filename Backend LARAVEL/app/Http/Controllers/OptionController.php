<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;
use Illuminate\Support\Facades\DB;

class OptionController extends Controller
{
    function addOption(Request $request){
       
        for($i =0 ; $i < count($request->toArray()) ; $i++) {
        $option=new Option;
        
          $option-> product_id=$request[$i]["product_id"];
          $option->  value = $request[$i]["value"];
          $option->  price = $request[$i]["price"];
          $option->  quantity = $request[$i][  "quantity"];
       
         
          $result=$option->save();
        }
          if($result){ 
             $r = [ "message"=>"option added"];
             return response()->json($r);
                   
          }
          else{
             return "option not added";
          }
          
         // return $rr[0]["price"] ;
      
       }
       function getOption($id){
        $sql = "SELECT * FROM `options` WHERE `product_id` =".$id; 
        $result=DB::select( DB::raw($sql));
         return $result;
       }




}
