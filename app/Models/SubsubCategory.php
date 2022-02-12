<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubsubCategory extends Model
{
    
    use HasFactory;
    protected $guarded = [];



    public function category(){

         return $this->BelongsTo('App\Models\Category','category_id');

    }

    public function subcategory(){

        return $this->BelongsTo('App\Models\Subcategory','subcategory_id');

   }
}
