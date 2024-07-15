<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Category extends Model
{
    use HasFactory;

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ],
        ];
    }

    public function article(){
          return $this->hasMany('App\Models\Article')->where('saved','true')->where('status','Published')->where('removed','false');
    }

    public function subcategory(){
        return $this->hasMany('App\Models\Subcategory')->where('removed','false');
    }

    public function scopeStatus($query,$value){
        if ($value == 'eliminados') {
            return $query->where('removed','true');
        }else{
            return $query->where('removed','false');
        }
    }

    public function scopeSearch($query,$value){
        if($value)
        return $query->where('name','like', '%'.$value.'%');
    }
}
