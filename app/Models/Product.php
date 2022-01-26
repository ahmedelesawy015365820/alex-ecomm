<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory,Sluggable,HasTranslations;

    public $translatable = ['name','slug','description'];
    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];

    }

    public function status()
    {
        return $this->status? 'Active' : "Inactive";
    }

    public function scopeStatus($q)
    {
        return $q->whereStatus(1) ;
    }

    // start relation

    public function firstMedia()
    {
        return $this->morphOne(Media::class,'mediable');
    }

    public function media()
    {
        return $this->morphMany(Media::class,'mediable');
    }

    public function product_category() {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function product_subcategory() {
        return $this->belongsTo(Category::class,'subcategory_id','id');
    }

    public function product_child() {
        return $this->belongsTo(Category::class,'child_id','id');
    }

    public function product_subchild() {
        return $this->belongsTo(Category::class,'subchild_id','id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

}
