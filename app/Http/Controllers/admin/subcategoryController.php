<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Article;


use Illuminate\Validation\Rule;


class subcategoryController extends Controller
{
    public function index(Request $request) {
        $category_id = Category::where('slug',$request->categoria)->whereNotNull('slug')->first();
        if ($category_id) {
            $category_id = $category_id->id;
        }

        $subcategories = Subcategory::Status($request->estatus)->Category($category_id)->Search($request->nombre)->orderBy('created_at','desc')->get();

        $categories = Category::where('removed','false')->whereNotNull('slug')->orderBy('name','asc')->get();
        if($request->view_ajax == 'true'){

            return response()->json(["data"=>$subcategories,"table"=>"#table_subcategory"]);
        }
        return view("admin.blog.subcategory.index",compact('subcategories','categories'));
    }

    public function create(Request $request) {

        if ($request->category_id) {
            $category_id = $request->category_id;
        }else{
            $category_id = Null;
        }

        $categories = Category::where('removed','false')->get();
        $html = view('admin.blog.subcategory.modal_create',compact('category_id','categories'))->render();

        return response()->json(["result"=>"ok","html"=>$html,"width"=>"sm"]);
    }

    public function store(Request $request) {
        $request->validate([
            'name'=>'required|max:60|'.Rule::unique('subcategories')->where('removed','false'),
            'category_id'=>'required|integer',
        ]);

        $subcategory = new Subcategory;
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();

        return response()->json(["result"=>'datatable',"message"=>trans("message.Datos guardados")]);
    }

    public function edit(Request $request) {

        $subcategory = Subcategory::find($request->id);
        $categories = Category::where('removed','false')->get();
        $subcategory_id = $subcategory->id;
        $html = view('admin.blog.subcategory.modal_edit',compact('subcategory','categories'))->render();
        return response()->json(["result"=>"ok","html"=>$html]);
    }

    public function update(Request $request) {
        $request->validate([
            'name'=>'required|max:60|'.Rule::unique('subcategories')->ignore($request->id)->where('removed','false'),
            'category_id'=>'required|integer',
        ]);

        $subcategory = Subcategory::find($request->id);
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        if (request()->restore == 'true') {
            $subcategory->removed = 'false';
            $subcategory->save();
            return response()->json(["result"=>'datatable',"message"=>trans("message.elemento restaurado")]);
        }else{
            $subcategory->save();
            return response()->json(["result"=>'datatable',"message"=>trans("message.Datos actualizados")]);
        }


    }

    public function delete(Request $request) {
        // verifica articulos asignados
        $articulos = Article::where('removed','false')->where('subcategory_id',$request->id)->count();

        if ($articulos != 0) {
            return response()->json(["result"=>"error","message"=>trans("message.No puede eliminar",['attr'=>trans("message.Artículos")])]);
        }
        $subcategory = Subcategory::find($request->id);
        $subcategory->removed = 'true';
        $subcategory->save();
        return response()->json(["result"=>"datatable","message"=>trans("message.Movido a papelera")]);
    }

    public function restore(Request $request) {
        // return response()->json(["result"=>"error","message"=>"XXXXX"]);
        $subcategory = Subcategory::find($request->id);
        // verificar si ahi otra con mismo nombre
        $subcategoryExist = Subcategory::where('name',$subcategory->name)->where('removed','false')->first();
        if ($subcategoryExist) {
            return response()->json(["result"=>"error","message"=>trans("message.No restaurar nombre usado")]);

        }
        $subcategory->removed = 'false';
        $subcategory->save();
        return response()->json(["result"=>"datatable","message"=>trans("message.elemento restaurado")]);
    }
}
