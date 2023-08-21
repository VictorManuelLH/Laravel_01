<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model {

    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName(){
        return 'url';
    }

    //* Relacion proyecto categoria
    public function category(){
        return $this -> belongsTo(Category::class);
    }
}
