<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Image;

use Illuminate\Support\Facades\File;
use ImageIntervention;
use Auth;

class imageController extends Controller
{
    public function upload_image(Request $request) {

        $request->validate([
            'file'=>'required|image|mimes:jpg,png,jpeg,gif,svg,webp',
            'model'=>'required',
            'model_id'=>'required|integer'
        ]);

        $model = $request->model;
        $name_model_id = $request->model.'_id';

        $image_file = ImageIntervention::make($request->file('file')->getRealPath());
        $width = $image_file->width();
        $height = $image_file->height();
        $width_min = 400;
        $height_min = 300;
        $width_max = 1200;
        $height_max = 1200;

        if ($width < $width_min) {
            return response()->json(["result"=>"error","message"=> trans("message.imagen tamaño mínimo",['attribute'=>$width_min])]);
        }
        if ($height < $height_min) {
            return response()->json(["result"=>"error","message"=>trans("message.imagen anchura mínima",['attribute'=>$height_min])]);
        }
        // if ($width > $width_max or $height > $width_max) {
        //     return response()->json(["result"=>"error","message"=>trans("message.imagen tamaño máximo",['attribute'=>$width_max])]);
        // }

        $image = new Image;
        $imagePExist = Image::where($name_model_id,$request->model_id)->where("principal","true")->count();
        if($imagePExist == 0){
            $image->principal = 'true';
        }
        $image->path = 'example';
        $image->model = $model;
        $image->save();

        $file = $request->file('file');
        $fileName = 'image_'.$image->id.'.'.$file->getClientOriginalExtension();

        if(!File::exists('public/images/'.$model.'s/'.Auth::user()->id.'/'.$request->model_id)) {
            if (!File::exists('public/images/'.$model.'s/')) {
                File::makeDirectory('public/images/'.$model.'s/');
            }
            if (!File::exists('public/images/'.$model.'s/'.Auth::user()->id)) {
                File::makeDirectory('public/images/'.$model.'s/'.Auth::user()->id);
            }
            if (!File::exists('public/images/'.$model.'s/'.Auth::user()->id.'/'.$request->model_id)) {
                File::makeDirectory('public/images/'.$model.'s/'.Auth::user()->id.'/'.$request->model_id);
            }
        }

        // imagen normal
        if ($width > $width_max) {
            $thumb = $image_file->resize($width_max, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumb->save('public/images/'.$model.'s/'.Auth::user()->id.'/'.$request->model_id.'/'.$fileName);
        }elseif ($height > $height_max) {
            $thumb = $image_file->resize(null, $height_max, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumb->save('public/images/'.$model.'s/'.Auth::user()->id.'/'.$request->model_id.'/'.$fileName);
        }else{
            $image_file->save('public/images/'.$model.'s/'.Auth::user()->id.'/'.$request->model_id.'/'.$fileName);
        }
        // imagen miniatura
        $thumb = $image_file->resize(350, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $thumb->save('public/images/'.$model.'s/'.Auth::user()->id.'/'.$request->model_id.'/thumb-'.$fileName);
        $path = public_path().'public/images/'.$model.'s/'.Auth::user()->id.'/'.$request->model_id;

        $image->path = 'public/images/'.$model.'s/'.Auth::user()->id.'/'.$request->model_id.'/'.$fileName;
        $image->path_thumb =  'public/images/'.$model.'s/'.Auth::user()->id.'/'.$request->model_id.'/thumb-'.$fileName;
        $image[$name_model_id] = $request->model_id;
        $image->save();

        $html = view('admin.blog.includes.card_image',compact('image'))->render();
        return response()->json(["result"=>"ok","img"=>$image,'html'=>$html]);
    }

    public function delete_image(Request $request)
    {
        $image_id = $request->image_id;
        $model = $request->model;
        $model_id = $request->model_id;
        $name_model_id = $request->model.'_id';
        $img = Image::find($image_id);

        if($img->principal == 'true'){
            $images = Image::where($name_model_id,$model_id)->where('id','!=',$image_id)->get();
            if($images->count() > 0){
                $imageFirst = $images->first();
                $imageFirst->principal = 'true';
                $imageFirst->save();
            }
        }

        if(File::exists(base_path($img->path))) {
            File::delete(base_path($img->path));
        }
        $thumbPath = str_replace('/image_','/thumb-image_',$img->path);

        if(File::exists(base_path($thumbPath))) {
            File::delete(base_path($thumbPath));
        }
        $img->delete();
        $images = Image::where($name_model_id,$model_id)->orderBy('principal','desc')->get();
        $html = view('admin.blog.includes.images_load',compact('images'))->render();
        return response()->json(["result"=>"html","viewReplace"=>".images_load","html"=>$html,"message"=>trans("message.Elemento eliminado")]);

    }

    public function set_as_main_image(Request $request){
        $image_id = $request->image_id;
        $model = $request->model;
        $model_id = $request->model_id;
        $name_model_id = $request->model.'_id';

        $img = Image::find($image_id);
        $images = Image::where($name_model_id,$model_id)->get();

        foreach ($images as $key => $value) {
            $value->principal = 'false';
            $value->save();
        }

        $img->principal = 'true';
        $img->save();

        $images = Image::where($name_model_id,$model_id)->orderBy('principal','desc')->get();
        $html = view('admin.blog.includes.images_load',compact('images'))->render();
        return response()->json(["result"=>"html","viewReplace"=>".images_load","html"=>$html,"message"=>trans("message.Elemento establecido")]);
    }

}
