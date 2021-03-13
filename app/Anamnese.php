<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anamnese extends Model
{
    protected $table = 'anamneses';

    protected $fillable =[
        'estado_geral',
        'peso',
        'temperatura',
        'frequencia_cardiaca',
        'frequencia_respiratoria',
        'mucosas',
        't_p_capilar',
        'hidratacao',
        'linfonodos',
        'tegumentos',
        'sis_digestorio',
        'sis_genito_urinario',
        'sis_neurologico',
        'sis_cardiologico',
        'ectoparasitos',
        'vermifugacao',
        'banhos',
        'alimentacao',
        'queixa',
        'suspeita_diagnostica',
        'solicitacao_exames',
        'tratamento',
        'valor',
        'id_animal',
        'created_at',
        'updated_at',
        'local'


    ];

    public function arquivos()
    {
        return $this->hasMany(AnamnesesArquivos::class, 'anamnese_id', 'id');
    }

    public function setValorAttribute($value)
    {
        if (empty($value)) {
            $this->attributes['valor'] = null;
        } else {
            $this->attributes['valor'] = floatval($this->convertStringToDouble($value));
        }

    }

    public function convertStringToDouble($param)
    {
        if (empty($param)) {
            return null;
        }
        return str_replace(',', '.', str_replace('.', '', $param));
    }


    public function animalAnamnese()
    {
        return $this->hasOne(Animal::class,'id','id_animal');
    }

    public function tutorAnamnese()
    {
        return $this->hasOneThrough(Tutor::class, Animal::class, 'id', 'id', 'id_animal','tutor_n');
    }

    public function getAnamneseDataAttribute()
    {
        return date('d/m/Y H:m', strtotime($this->created_at));
    }



}
