<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    protected $table = 'donaciones';
    protected $fillable = ['donador', 'beneficiario_id', 'cantidad'];

    public function Beneficiario()
    {
        return $this->hasOne(User::class, 'id', 'beneficiario_id');
    }

    public function setDonadorAttribute($donador) {
        $this->attributes['nombre'] = $donador;
    }
}
