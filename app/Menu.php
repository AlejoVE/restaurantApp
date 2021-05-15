<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function category(){
        // One menu has only one category
        return $this->belongsTo(Category::class);
    }
}
