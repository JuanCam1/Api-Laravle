<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Producto extends Model
{
    protected $table = 'producto';

    public function categoria () {
        $this->belongsTo(Categoria::class,'id_cat','id_cat');
    }

    protected $fillable = [
        'name',
        'marca',
        'precio',
        'id_cat'
    ];
}
