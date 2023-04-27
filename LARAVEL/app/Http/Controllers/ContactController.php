<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    function AddMessage(Request $request){

    	$contact=new Contact;
    
      $contact-> name=$request-> name;
      $contact->  subject = $request->  subject;
      $contact-> email= $request-> email;
      $contact-> message = $request-> message;  

      $result=$contact->save();
      if($result){ 
         $r = [ "message"=>"message added"];
         return response()->json($r);
               
      }
      else{
         return "message not added";
      }
   }
}
