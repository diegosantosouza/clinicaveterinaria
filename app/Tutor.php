<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Integer;

class Tutor extends Model
{
    protected $table = 'tutor';

    protected $fillable = [
        'nome',
        'genero',
        'cpf',
        'rg',
        'orgao_expedidor',
        'rua',
        'numero',
        'complemento',
        'bairro',
        'estado',
        'cidade',
        'telefone',
        'celular',
        'email',
        'created_at',
        'updated_at'

];
    /**
     * Relacionamentos.
     */

    public function animalsTutor()
    {
        return $this->hasMany(Animal::class,'tutor_n','id');
    }

    public function anamnesesTutor()
    {
        return $this->hasManyThrough(Anamnese::class, Animal::class, 'tutor_n', 'id_animal', 'id','id');
    }

    /**
     * Set and Get Attributes
     */
    public function setCpfAttribute($value)
    {
        $this->attributes['cpf'] = $this->clearField($value);
    }

    public function setTelefoneAttribute($value)
    {
        $this->attributes['telefone'] = $this->clearField($value);
    }

    public function getTelefoneAttribute($value)
    {
        return substr($value, 0, 3) . '.' . substr($value, 3, 3) . '.' . substr($value, 6, 3) . '-' . substr($value, 9, 2);
    }

    public function setCelularAttribute($value)
    {
        $this->attributes['celular'] = $this->clearField($value);
    }

    // public function getcelularAttribute($value)
    // {
    //     return substr($value, 0, 3) . '.' . substr($value, 3, 3) . '.' . substr($value, 6, 3) . '-' . substr($value, 9, 2);
    // }

    private function clearField(?string $param)
    {
        if(empty($param)){
            return '';
        }

        return str_replace(['.', '-', '/', '(', ')', ' '], '', $param);
    }

}
