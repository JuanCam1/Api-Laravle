<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    public $primaryKey = 'id_cat';
    protected $hidden = ['created_at','updated_at'];

    public function getProductos() {
        return $this->hasMany(Producto::class,'id_cat','id_cat');
    }

    protected $fillable = [
        'name'
    ];
}
