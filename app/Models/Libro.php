<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Autor;

class Libro extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'libros';
    protected $fillable = ['nombre', 'year', 'id_autor', 'estado'];

    public function autor()
    {
        return $this->belongsTo(Autor::class, 'id_autor');
    }
}
