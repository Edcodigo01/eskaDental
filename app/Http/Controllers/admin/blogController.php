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

        $articles = Article::where('saved','true')->Status($request->estatus)->Category($category_id)->Subcategory($subcategory_id)->Search($request->titulo)->orderBy('created_at','desc')->paginate(8);
        $article = Article::all()->last();

        $categories = Category::where('removed','false')->whereNotNull('slug')->orderBy('name','asc')->get();
        if (!$category_id) {
            $subcategories = Subcategory::where('removed','false')->whereNotNull('slug')->orderBy('name','asc')->get();
        }else{
            $subcategories = Subcategory::where('category_id',$category_id)->where('removed','false')->whereNotNull('slug')->orderBy('name','asc')->get();
        }

        $subcategoriesAll = Subcategory::where('removed','false')->whereNotNull('slug')->orderBy('name','asc')->get();
        if($request->view_ajax == 'true'){
            return view("admin.blog.index_ajax",compact('articles','article','categories','subcategories','subcategoriesAll'));
        }

        return view("admin.blog.index",compact('articles','article','categories','subcategories','subcategoriesAll'));
    }

    public function create(Request $request) {
        $article = new Article;
        $article->save();
        $categories = Category::where('removed','false')->whereNotNull('slug')->orderBy('name','asc')->get();
        $subcategories = Subcategory::where('removed','false')->whereNotNull('slug')->orderBy('name','asc')->get();
        $html = view('admin.blog.modal_create',compact('article','categories','subcategories'))->render();
        return response()->json(["result"=>"ok","html"=>$html,"width"=>"xl","ckedit"=>"description","imgDropzone"=>"formDropzone"]);
    }

    public function store(Request $request) {
        $request->validate([
            'article_id'=>'required|integer',
            'title'=>'required|max:120|'.Rule::unique('articles')->ignore($request->article_id),
            'autor'=>'required|max:60',
            'status'=>'required|in:Published,Not-published',
            'description'=>'required|max:30000',
            'category_id'=>'required|integer',
        ]);

        $subcategoriesCount = Subcategory::where('category_id',$request->category_id)->where('removed','false')->count();
        if ($subcategoriesCount != 0) {
            $request->validate([
                'subcategory_id'=>'required|integer',
            ]);
        }

        $article = Article::find($request->article_id);
        $article->fill($request->all());
        $article->saved = 'true';
        $article->save();
        // $html = view('admin\blog\includes\card_article_sm',compact('article'))->render();

        return response()->json(["result"=>'listar_ajax',"message"=>trans("message.Datos guardados")]);
    }

    public function edit(Request $request) {
        $article = Article::find($request->id);
        $images = Image::where('article_id',$request->id)->orderBy('principal','desc')->get();

        $categories = Category::where('removed','false')->whereNotNull('slug')->orderBy('name','asc')->get();
        $subcategories = Subcategory::where('removed','false')->whereNotNull('slug')->orderBy('name','asc')->get();

        $html = view('admin.blog.modal_edit',compact('article','categories','subcategories','images'))->render();
        return response()->json(["result"=>"ok","html"=>$html,"width"=>"xl","ckedit"=>"description","imgDropzone"=>"formDropzone","images"]);
    }

    public function update(Request $request) {

        $request->validate([
            'article_id'=>'required|integer',
            'title'=>'required|max:120|'.Rule::unique('articles')->ignore($request->article_id)->where('removed','false'),
            'autor'=>'required|max:60',
            'status'=>'required|in:Published,Not-published',
            'description'=>'required|max:30000',
            'category_id'=>'required|integer',
        ]);

        $article = Article::find($request->article_id);
        $article->fill($request->all());

        if ($request->subcategory_id == 'otra') {
            $article->subcategory_id = Null;
        }else{
            $subcategoriesCount = Subcategory::where('category_id',$request->category_id)->where('removed','false')->count();
            if ($subcategoriesCount != 0) {
                $request->validate([
                    'subcategory_id'=>'required|integer',
                ]);
            }
        }

        $article->save();
        $html = view('admin.blog.includes.elements_card_article_sm',compact('article'))->render();
        // restablecer
        if ($request->restore == 'true') {
            $article->removed = 'false';
            $article->save();
            return response()->json(["result"=>"listar_ajax","message"=>trans("message.elemento restaurado")]);
        }
        return response()->json(["result"=>'listar_ajax',"message"=>trans("message.Datos actualizados")]);
    }

    public function delete(Request $request) {
        $article = Article::find($request->id);
        $article->status = 'Not-published';
        $article->removed = 'true';
        $article->save();
        return response()->json(["result"=>"listar_ajax","message"=>trans("message.Movido a papelera")]);
    }




    // public function restore(Request $request) {
    //     // return response()->json(["result"=>"error","message"=>"XXXXX"]);
    //     $category = Category::find($request->id);
    //     // verificar si ahi otra con mismo nombre
    //     $categoryExist = Category::where('name',$category->name)->where('removed','false')->first();
    //     if ($categoryExist) {
    //         return response()->json(["result"=>"error","message"=>trans("message.No restaurar nombre usado")]);
    //     }
    //     $category->removed = 'false';
    //     $category->save();
    //     return response()->json(["result"=>"listar_ajax","message"=>trans("message.elemento restaurado")]);
    // }

}
