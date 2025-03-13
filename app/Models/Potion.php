<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potion extends Model
{
    use HasFactory;

    protected $table = 'potions';
    protected $primaryKey = 'potion_id';
    public $timestamps = false;

    protected $fillable = ['magical_name', 'description', 'curative', 'magic_level_required'];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'potions_ingredients', 'potion_id', 'ingredient_id')
                    ->withPivot('qty');
    }

    public function wizards()
    {
        return $this->belongsToMany(Wizard::class, 'wizards_potions', 'potion_id', 'wizard_id')
                    ->withPivot('date_brewed');
    }
}
