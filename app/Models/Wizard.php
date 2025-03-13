<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wizard extends Model
{
    use HasFactory;

    protected $table = 'wizards';
    protected $primaryKey = 'wizard_id';
    public $timestamps = false;

    protected $fillable = ['name', 'age', 'magic_level'];

    public function potions()
    {
        return $this->belongsToMany(Potion::class, 'wizards_potions', 'wizard_id', 'potion_id')
                    ->withPivot('date_brewed');
    }
}
