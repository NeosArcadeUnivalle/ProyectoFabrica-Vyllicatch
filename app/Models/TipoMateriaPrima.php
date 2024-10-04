<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMateriaPrima extends Model
{
    use HasFactory;

    protected $table = 'tiposdemateriaprima';  // Nombre de la tabla
    protected $primaryKey = 'idTipoMateriaPrima';  // Clave primaria

    // Desactivamos timestamps porque la tabla no los tiene
    public $timestamps = false;

    // Definir los campos que se pueden llenar masivamente
    protected $fillable = ['nombreTipoMateriaPrima'];
}