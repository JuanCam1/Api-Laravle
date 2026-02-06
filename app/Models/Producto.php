<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Producto extends Model
{
    protected $table = 'producto';
    protected $hidden = ['id_cat','created_at','updated_at'];

    public function categoria () {
        return $this->belongsTo(Categoria::class,'id_cat','id_cat');
    }

    protected $fillable = [
        'name',
        'marca',
        'precio',
        'id_cat'
    ];
}
