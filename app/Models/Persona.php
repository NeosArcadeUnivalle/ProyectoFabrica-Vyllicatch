<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    // Definir el nombre de la tabla si es diferente al plural por defecto
    protected $table = 'personas';

    // Definir la clave primaria
    protected $primaryKey = 'idPersona';

    // Desactivar timestamps si no los usas en tu tabla
    public $timestamps = false;

    // Definir los campos que se pueden llenar masivamente
    protected $fillable = ['nombre', 'apellido'];
}