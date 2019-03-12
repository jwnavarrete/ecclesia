<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compassion_child_list extends Model
{
    protected $table="ici_comp_child_list";
    
    protected $fillable = [
        'child',
        'data',
        'codigo',
    ];

    public $timestamps = false;

}
