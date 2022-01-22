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

    public function scopeStatus($q)
    {
        return $q->whereStatus(1) ;
    }

    public function parent()
    {
        return $this->belongsTo(self::class,'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class,'parent_id');
    }


    public function status()
    {
        return $this->status? 'Active' : "Inactive";
    }


}