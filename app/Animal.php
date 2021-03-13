<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends Model
{
    protected $table = 'animals';
    use SoftDeletes;

    protected $fillable = [
        'nome_animal',
        'especie',
        'raca',
        'sexo',
        'idade',
        'castrado',
        'observacoes',
        'tutor_n',
        'created_at',
        'updated_at'

    ];


    public function anamnesesAnimal()
    {
        return $this->hasMany(Anamnese::class,'id_animal','id');
    }

    public function tutorAnimal()
    {
        return $this->hasOne(Tutor::class,'id','tutor_n');
    }

    public function getCreateDataAttribute()
    {
        return date('d/m/y y:m', strtotime($this->created_at));
    }

    public function setIdadeAttribute($value)
    {
        $this->attributes['idade'] = $this->convertStringToDate($value);
    }

    public function getIdadeAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    private function convertStringToDate(?string $param)
    {
        if(empty($param)){
            return null;
        }

        list($day, $month, $year) = explode('/', $param);
        return (new \DateTime($year . '-' . $month . '-' . $day))->format('Y-m-d');
    }
}
