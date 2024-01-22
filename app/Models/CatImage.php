<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatImage extends Model
{
    protected $table = 'cat_images'; // Nom de la taula a la base de dades
    protected $fillable = ['_id', 'mimetype', 'size', 'tags']; // Camps que es poden omplir

    protected $casts = [
        'tags' => 'json', // Especifica que el camp 'tags' és de tipus JSON
    ];
}
