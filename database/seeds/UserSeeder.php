<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder{

    public function run(){
        DB::table('users')->delete();

        $adminRole = Role::whereName('admin')->first();
        $userRole = Role::whereName('user')->first();

        $user = User::create(array(
            'id'    => '1',
            'first_name'    => 'John',
            'last_name'     => 'Doe',
            'email'         => 'jwnavarretez@gmail.com',
            'password'      => Hash::make('john1994'),
            'token'         => str_random(64),
            'activated'     => true,            
            'role_id'     => $adminRole->id
        ));
      
        $user = User::create(array(
            'id'    => '2',
            'first_name'    => 'Jane',
            'last_name'     => 'Doe',
            'email'         => 'yula@gmail.com',
            'password'      => Hash::make('johnyyula'),
            'token'         => str_random(64),
            'activated'     => true,
            'role_id'     => $userRole->id         
        ));
        
    }
}