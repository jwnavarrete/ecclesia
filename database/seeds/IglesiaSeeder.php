<?php

use Illuminate\Database\Seeder;
use App\Models\Iglesia;

class IglesiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('iglesia')->delete();

        Iglesia::create([
            'id'   => '1',
            'nombre'   => 'ICI el Recreo',
            'direccion'   => 'Ciudadela el Recreo 3 etapa Solar A1',
            //'telefonos'   => '',
            //'pastor'   => '',
            //'tesorero'   => ''
        ]);

    }
}
