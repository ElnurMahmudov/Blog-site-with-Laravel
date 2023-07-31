<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function articleCount(){
        return $this->hasMany('App\Models\Articles','category_id','id')->count();
        // Baglanacagimiz Model // baglanacagimiz sutun // baglanalicaq id
    }
}
