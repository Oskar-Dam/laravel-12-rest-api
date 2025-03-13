<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $table = 'ingredients';
    protected $primaryKey = 'ingredient_id';
    public $timestamps = false;

    protected $fillable = ['ingredient_name', 'price', 'rarity'];

    public function potions()
    {
        return $this->belongsToMany(Potion::class, 'potions_ingredients', 'ingredient_id', 'potion_id')
                    ->withPivot('qty');
    }
}
