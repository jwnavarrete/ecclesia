<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    protected $table = 'ici_roles';
    protected $fillable = ['name','descripcion'];
}