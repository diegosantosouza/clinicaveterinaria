<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnamnesesArquivos extends Model
{
    protected $fillable= [
        'anamnese_id',
        'path',
        'cover',
    ];
}
