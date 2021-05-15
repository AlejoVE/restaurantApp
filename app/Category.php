<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //We have to name the functions as the table we want to map with Category, in this case menus
    public function menus() {
        // There can be many menus in one category, that is why has many
        return $this->hasMany(Menu::class);
    }
}
