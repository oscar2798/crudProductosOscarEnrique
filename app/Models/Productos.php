<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'productos';
    protected $fillable = ['id','sku','precioDolares','precioPesos','puntos','activo','eliminado'];
}
