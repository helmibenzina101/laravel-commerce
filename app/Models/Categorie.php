<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ['nomcategorie','imagecategorie'];
    use HasFactory;
public function scategorie()
{
    return $this->hasMany(Scategorie::class, 'categorieID');
}
}
