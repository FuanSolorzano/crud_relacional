<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Libro;

class Autor extends Model
{
    use HasFactory;
    protected $table = 'autores';
    protected $fillable = ['nombre', 'estado'];

    public function libros()
    {
        return $this->hasMany(Libro::class, 'id_autor');
    }
}
