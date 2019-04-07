<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategories extends Model
{
    //
    protected $table = "product_categories";


    protected $fillable = [
        'category_name'
    ];
}
