<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Article;

use Illuminate\Validation\Rule;

class categoryController extends Controller
{
    public function index(Request $request) {
        $categories = Category::Status($request->estatus)->Search($request->nombre)->orderBy('created_at','desc')->get();
        $subcategories = Subcategory::where('removed','false')->get();

        foreach ($categories as $key => $cate) {
            $subscategories = [];
            foreach ($subcategories as $key => $sub) {
                if($sub->category_id == $cate->id){
                    $subscategories[] = ['id'=>$sub->id ,'name'=>$sub->name];
                }
            }
            $cate->subcategories = $subscategories;
        }

        if($request->view_ajax == 'true'){

            return response()->json(["data"=>$categories,"table"=>"#table_category"]);
        }
        return view("admin.blog.category.index",compact('categories'));
    }

    public function create(Request $request) {
        $html = view('admin.blog.category.modal_create')->render();
        return response()->json(["result"=>"ok","html"=>$html,"width"=>""]);
    }

    public function store(Request $request) {
        $request->validate([
            'name'=>'required|max:60|'.Rule::unique('categories')->where('removed','false'),
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return response()->json(["result"=>'datatable',"message"=>trans("message.Datos guardados")]);
    }

    public function edit(Request $request) {
        $category = Category::find($request->id);
        $html = view('admin.blog.category.modal_edit',compact('category'))->render();
        return response()->json(["result"=>"ok","html"=>$html]);
    }

    public function update(Request $request) {
        $request->validate([
            'name'=>'required|max:60|'.Rule::unique('categories')->ignore($request->id)->where('removed','false'),
        ]);

        $category = Category::find($request->id);
        $category->name = $request->name;
        if (request()->restore == 'true') {
            $category->removed = 'false';
            $category->save();
            return response()->json(["result"=>'datatable',"message"=>trans("message.elemento restaurado")]);
        }else{
            $category->save();
            return response()->json(["result"=>'datatable',"message"=>trans("message.Datos actualizados")]);
        }


    }


    public function delete(Request $request) {

        // verifica articulos asignados
        $articulos = Article::where('removed','false')->where('category_id',$request->id)->count();
        if ($articulos != 0) {
            return response()->json(["result"=>"error","message"=>trans("message.No puede eliminar",['attr'=>trans("message.Artículos")])]);
        }
        $subs = Subcategory::where('removed','false')->where('category_id',$request->id)->count();
        if ($subs != 0) {
            return response()->json(["result"=>"error","message"=>trans("message.No puede eliminar",['attr'=>trans("message.Subcategorías")])]);
        }
        $category = Category::find($request->id);
        $category->removed = 'true';
        $category->save();
        return response()->json(["result"=>"datatable","message"=>trans("message.Elemento eliminado")]);
    }

    public function restore(Request $request) {
        // return response()->json(["result"=>"error","message"=>"XXXXX"]);
        $category = Category::find($request->id);
        // verificar si ahi otra con mismo nombre
        $categoryExist = Category::where('name',$category->name)->where('removed','false')->first();
        if ($categoryExist) {
            return response()->json(["result"=>"error","message"=>trans("message.No restaurar nombre usado")]);
        }
        $category->removed = 'false';
        $category->save();
        return response()->json(["result"=>"datatable","message"=>trans("message.elemento restaurado")]);
    }

    // admin\blog\category\index_ajax
}
