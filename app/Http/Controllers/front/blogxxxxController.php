<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Subcategory;

use App\Models\Image;
use Illuminate\Validation\Rule;

class blogController extends Controller
{

    public function index(Request $request) {

        $category_id = Category::where('slug',$request->categoria)->whereNotNull('slug')->first();
        if ($category_id) {
            $category_id = $category_id->id;
        }

        $subcategory_id = Subcategory::where('slug',$request->subcategoria)->whereNotNull('slug')->first();
        if ($subcategory_id) {
            $subcategory_id = $subcategory_id->id;
        }

        $articles = Article::where('saved','true')->Status($request->estatus)->Category($category_id)->Subcategory($subcategory_id)->Search($request->titulo)->orderBy('created_at','desc')->paginate(5);
        $article = Article::all()->last();

        $categories = Category::where('removed','false')->whereNotNull('slug')->orderBy('name','asc')->get();
        if (!$category_id) {
            $subcategories = Subcategory::where('removed','false')->whereNotNull('slug')->orderBy('name','asc')->get();
        }else{
            $subcategories = Subcategory::where('category_id',$category_id)->where('removed','false')->whereNotNull('slug')->orderBy('name','asc')->get();
        }

        if($request->view_ajax == 'true'){
            return view("front\blog\index_ajax",compact('articles','article','categories','subcategories'));
        }

        return view("front\blog\index",compact('articles','article','categories','subcategories'));
    }

}
