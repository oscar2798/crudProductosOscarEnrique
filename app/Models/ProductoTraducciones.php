<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoTraducciones extends Model
{
    protected $table = 'producto_traducciones';
    protected $fillable = ['id','producto_id','nombre','descripcion_corta','descripcion_larga','url','idioma'];

    public function producto()
    {
        return $this->hasOne(Productos::class, 'id', 'producto_id');
    }

}
