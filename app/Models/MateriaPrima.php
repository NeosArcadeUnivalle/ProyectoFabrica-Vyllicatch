<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriaPrima extends Model
{
    use HasFactory;

    protected $table = 'materiaprima';  // Nombre de la tabla
    protected $primaryKey = 'idMaterial';  // Clave primaria

    // Desactivamos timestamps porque la tabla no los tiene
    public $timestamps = false;

    // Definir los campos que se pueden llenar masivamente
    protected $fillable = ['nombreMateriaPrima', 'cantidadDisponible', 'fechaUltimaCompra', 'idProveedor', 'idTipoMateriaPrima'];
}