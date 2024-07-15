<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class contactController extends Controller
{
    public function mail_contact(Request $request){
      $request->validate([
          'email'=>'required|min:4|email',
          'message'=>'required|min:4'
      ]);

      $data = ['data'=>['email'=>$request->email,'message'=>$request->message]];

      Mail::send('mails.message_contact',$data,function($message){
          $message->subject('Mensaje de visitante de Sapiencia Web');
          $message->to('edtalentoinformatico@gmail.com');
      });

      return response()->json(["result"=>"message contact","message"=>"Mensaje enviado con éxito."]);
    }

    public function mail_view(Request $request){
        return view("mails.".$request->view);
    }
}
