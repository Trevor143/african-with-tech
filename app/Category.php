<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends \Backpack\NewsCRUD\app\Models\Category
{
    public function articles()
    {
        return $this->belongsToMany('Backpack\NewsCRUD\app\Models\Article', 'article_category');
    }
}
