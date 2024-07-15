<?php

namespace App\Http\Controllers\front;

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

        $category_id = Category::where('removed','false')->where('slug',$request->categoria)->whereNotNull('slug')->first();
        if ($category_id) {
            $category_id = $category_id->id;
        }

        if (request()->subcategoria == 'otra') {
            $subcategory_id = 'otra';
        }else {
            $subcategory_id = Subcategory::where('removed','false')->where('slug',$request->subcategoria)->whereNotNull('slug')->first();
            if ($subcategory_id) {
                $subcategory_id = $subcategory_id->id;
            }
        }

        if (request()->orden and request()->orden == 'entradas-antiguas') {
            $orderBy = 'asc';
        }else{
            $orderBy = 'desc';
        }

        $articles = Article::where('removed','false')->where('saved','true')->where('status','Published')->Status($request->estatus)->Category($category_id)->Subcategory($subcategory_id)->Search($request->titulo)->orderBy('created_at',$orderBy)->paginate(6);
        $article = Article::all()->last();

        $categories = Category::where('removed','false')->whereNotNull('slug')->orderBy('name','asc')->get();

        $subcategories = Subcategory::where('removed','false')->whereNotNull('slug')->orderBy('name','asc')->get();
        if($request->view_ajax == 'true'){
            return view("front.blog.index_ajax",compact('articles','categories','subcategories'));
        }
        return view("front.blog.index",compact('articles','categories','subcategories'));
    }

    public function change_view(Request $request) {

        session(['type_view' => $request->type_view]);
        return back();
    }

    public function article_detail(Request $request) {
        $article = Article::where('slug',$request->titulo)->where('status','published')->first();
        if (!$article) {
            return redirect(url('/'));
        }
        $categories = Category::where('removed','false')->whereNotNull('slug')->orderBy('name','asc')->get();
        $subcategories = Subcategory::where('removed','false')->whereNotNull('slug')->orderBy('name','asc')->get();
        $images = Image::where('article_id',$article->id)->where('principal','!=','true')->get();
        $articles = Article::where('id','!=',$article->id)->where('removed','false')->where('status','Published')->orderBy('created_at','asc')->take(10)->get();
        return view("front.blog.article.index",compact('article','categories','subcategories','images','articles'));

    }

}
