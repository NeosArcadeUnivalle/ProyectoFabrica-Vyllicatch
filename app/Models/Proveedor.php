<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';  // Nombre de la tabla
    protected $primaryKey = 'idProveedor';  // Clave primaria

    // Desactivamos timestamps porque la tabla no los tiene
    public $timestamps = false;

    // Definir los campos que se pueden llenar masivamente
    protected $fillable = ['nombreProveedor', 'telefonoProveedor', 'correoElectronicoProveedor', 'direccionProveedor'];
}