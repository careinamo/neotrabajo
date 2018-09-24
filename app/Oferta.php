<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    public function tipoContrato()
    {
    	return $this->hasOne('App\TipoContrato', 'id', 'tipo_contrato_id');
    }
}
