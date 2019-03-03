<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder{

    public function run(){
        DB::table('roles')->delete();

        Role::create([
            'id'   => '1',
            'name'   => 'admin'
        ]);
        
        Role::create([
            'id'   => '2',
            'name'   => 'user'
        ]);

        

    }
}