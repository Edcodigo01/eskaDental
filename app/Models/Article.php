<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Article extends Model
{
    use HasFactory;

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ],
        ];
    }
    protected $fillable = [

        'title',
        'autor',
        'status',
        'description',
        'category_id',
        'subcategory_id',

    ];
    public function category(){
        return $this->belongsTo('App\Models\Category')->where('removed','false');
    }
    public function subcategory(){
        return $this->belongsTo('App\Models\Subcategory')->where('removed','false');
    }
    // scopes

    public function scopeStatus($query,$fitro){
        if ($fitro) {
            if ($fitro == 'publicado') {
                return $query->where('status','Published')->where('removed','false');
            }elseif ($fitro == 'no-publicado') {
                return $query->where('status','Not-ublished')->where('removed','false');
            }elseif ($fitro == 'eliminados') {
                return $query->where('removed','true');
            }
        }else{
            return $query->where('removed','false');
        }
    }

    public function scopeSearch($query,$value){
        if($value)
        return $query->where('title','like', '%'.$value.'%');
    }

    public function scopeCategory($query,$value){
        if($value)
        return $query->where('category_id',$value);
    }

    public function scopeSubcategory($query,$value){
        if($value)
        if ($value == 'otra') {
            return $query->whereNull('subcategory_id');
        }else{
            return $query->where('subcategory_id',$value);
        }

    }

    // ----
    public function imageP()
    {
        return $this->hasOne('App\Models\Image')->where('principal','true')->oldest();
    }

    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }
}
