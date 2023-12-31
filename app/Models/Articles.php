<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Articles extends Model
{
    use HasFactory;
    use SoftDeletes;

    function getCategory(){
        return $this->hasOne('App\Models\Category','id','category_id');
    }

    
}
