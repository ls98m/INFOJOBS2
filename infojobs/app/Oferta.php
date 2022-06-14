<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $table = 'ofertas';

    protected $primaryKey = 'id_oferta';

    protected $fillable = [
        'id_oferta', 'puesto_trabajo', 'fecha_publicacion','id_empresa','descripcion','jornada','contrato','salario',"imagen",'empresa'
    ];
}
