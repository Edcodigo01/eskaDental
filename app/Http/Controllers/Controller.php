<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subcategory;
use App\Models\Category;


use Auth;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function inicio_de_sesion(Request $request){
        return view("admin.login.login_admin");
    }

    function iniciar_sesion(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        // return response()->json(["result"=>"error","message"=>"XXXXXXX"]);
        $user = User::where('email',$request->email)->first();
        if($user == Null){
            return response()->json(['result'=>'error','message'=>'El correo agregado no existe en la base de datos.']);
        }else{
            $credentials = $request->only('email', 'password');
            if(Auth::attempt($credentials)) {
                return response()->json(['result'=>'redirect','url'=>url('admin/blog/articulos')]);
            }else{
                return response()->json(['result'=>'error','message'=>'Has ingresado una contraseña inválida.']);
            }
        }
    }

    public function cerrar_sesion(){
        Auth::logout();
        return redirect(url('/'));
    }

    // Categorias por slug
    public function fill_subcategories(Request $request){

        $category = Category::where('slug',$request->slug)->whereNotNull('slug')->first();
        if ($category) {
            $subcategories = Subcategory::where('category_id',$category->id)->where('removed','false')->orderBy('name','asc')->get();

            return response()->json(["result"=>"ok","data"=>$subcategories]);
        }else{
            return response()->json(["result"=>"ok","data"=>[]]);
        }
    }

    // Categorias por id
    public function fill_subcategories_id(Request $request){
        // el slug aca en realidad es el id entero
        
        $category = Category::find($request->slug);
        if ($category) {
            $subcategories = Subcategory::where('category_id',$category->id)->where('removed','false')->orderBy('name','asc')->get();

            return response()->json(["result"=>"ok","data"=>$subcategories]);
        }else{
            return response()->json(["result"=>"ok","data"=>[]]);
        }
    }


}
