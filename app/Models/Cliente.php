<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';  // Nombre de la tabla
    protected $primaryKey = 'idCliente';  // Clave primaria
    public $timestamps = false;  // Desactivar timestamps si no se usan en la tabla

    protected $fillable = ['empresa', 'telefono', 'correoElectronico', 'idPersona'];  // Campos que se pueden llenar
}