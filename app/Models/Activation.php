<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{
    protected $table = 'ici_Activation';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}