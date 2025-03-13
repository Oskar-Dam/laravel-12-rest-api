<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotionIngredient extends Model
{
    use HasFactory;

    protected $table = 'potions_ingredients';
    public $timestamps = false;

    protected $fillable = ['potion_id', 'ingredient_id', 'qty'];
}
