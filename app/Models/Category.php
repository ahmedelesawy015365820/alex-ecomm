<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\Translatable\HasTranslations;


class Category extends Model
{
    use HasFactory,Sluggable,HasTranslations;

    public $translatable = ['name','slug'];
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

    public function parent()
    {
        return $this->belongsTo(self::class,'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class,'parent_id');
    }

    public function product_category() {
        return $this->hasOne(Product::class,'category_id');
    }

    public function product_subcategory() {
        return $this->hasOne(Product::class,'subcategory_id');
    }

    public function product_child() {
        return $this->hasOne(Product::class,'child_id');
    }

    public function product_subchild() {
        return $this->hasOne(Product::class,'subchild_id');
    }

}