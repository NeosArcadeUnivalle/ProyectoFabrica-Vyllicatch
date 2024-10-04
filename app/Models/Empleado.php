<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = 'empleados';  // Nombre de la tabla
    protected $primaryKey = 'idEmpleado';  // Clave primaria

    // Desactivar timestamps si no se usan
    public $timestamps = false;

    // Definir los campos que se pueden llenar masivamente
    protected $fillable = ['correoElectronico', 'password', 'puesto', 'fechaContratacion', 'idPersona'];
}