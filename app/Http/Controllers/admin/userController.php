<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
class userController extends Controller
{
    public function index(Request $request) {
        return view("admin.user.index");
    }

    public function change_password(Request $request) {
        $request->validate([
            'password_now'=>'required',
            'password'=>'required|min:5',
            'password_confirm'=>'required|min:5',
        ]);

        $user = Auth::user();
        if (!Hash::check($request->password_now, $user->password))
        {
            return response()->json(["result"=>"error_input","input"=>"password_now","message"=>"La contraseña actual ingresada es incorrecta."]);
        }

        if ($request->password != $request->password_confirm) {
            return response()->json(["result"=>"error_input","input"=>"password_confirm","message"=>"La contraseña nueva y de confirmación deben coincidir."]);
        }

        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json(["result"=>"hide_modal","message"=> trans("message.Contraseña actualizada")]);
    }


}
