<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Article extends \Backpack\NewsCRUD\app\Models\Article
{
    protected $fillable = ['slug', 'title', 'description', 'content', 'image', 'status', 'category_id', 'post_type', 'featured', 'date'];

    public function category()
    {
        return $this->belongsToMany('Backpack\NewsCRUD\app\Models\Category', 'article_category');
    }
}
