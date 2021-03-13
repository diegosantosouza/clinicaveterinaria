<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Racas extends Model
{
    protected $table = 'racas';

    protected $fillable =[
        'especie',
        'raca'
    ];
}
