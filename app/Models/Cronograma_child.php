<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cronograma_child extends Model
{
    protected $table = "ici_cronograma_child";
    
    protected $fillable = [
        'id',
        'title',
        'description',
        'start_date',
        'end_date',
        'created',
        'status',
        ];

    public $timestamps = false;
}
