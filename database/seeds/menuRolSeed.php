<?php use Illuminate\Database\Seeder;
use App\Models\menu_x_rol;

class menuRolSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_x_rol')->delete();
       
        menu_x_rol::create([
            'role_id'   => '1',
            'menu_id'   => '1'
        ]);
        menu_x_rol::create([
            'role_id'   => '1',
            'menu_id'   => '2'
        ]);
        menu_x_rol::create([
            'role_id'   => '1',
            'menu_id'   => '3'
        ]);
        menu_x_rol::create([
            'role_id'   => '1',
            'menu_id'   => '4'
        ]);
        menu_x_rol::create([
            'role_id'   => '1',
            'menu_id'   => '5'
        ]);
        menu_x_rol::create([
            'role_id'   => '1',
            'menu_id'   => '6'
        ]);
        menu_x_rol::create([
            'role_id'   => '1',
            'menu_id'   => '7'
        ]);
        menu_x_rol::create([
            'role_id'   => '1',
            'menu_id'   => '8'
        ]);
        menu_x_rol::create([
            'role_id'   => '1',
            'menu_id'   => '9'
        ]);
        menu_x_rol::create([
            'role_id'   => '1',
            'menu_id'   => '10'
        ]);
        menu_x_rol::create([
            'role_id'   => '1',
            'menu_id'   => '11'
        ]);
        
    }
}
