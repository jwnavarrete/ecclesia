<?php use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Menu')->delete();

        $m1 = factory(Menu::class)->create([
            'id' => '1',
            'name' => 'Seguridad',
            'slug' => '',
            'icon' => 'fa fa-user-secret',
            'parent' => 0,
            'order' => 0,
        ]);
        
        factory(Menu::class)->create([
            'id' => '2',
            'name' => 'Usuarios',
            'slug' => 'usuarios',
            'icon' => 'fa fa-users',
            'parent' => $m1->id,
            'order' => 0,
        ]);
        factory(Menu::class)->create([
            'id' => '3',
            'name' => 'Menu',
            'slug' => 'menu',
            'icon' => 'fa fa-list-ul',
            'parent' => $m1->id,
            'order' => 1,
        ]);        
        factory(Menu::class)->create([
            'id' => '4',
            'name' => 'Roles',
            'slug' => 'roles',
            'icon' => 'fa fa-sitemap',
            'parent' => $m1->id,
            'order' => 2,
        ]);
        factory(Menu::class)->create([
            'id' => '5',
            'name' => 'Permisos',
            'slug' => 'permisos',
            'icon' => 'fa fa-key',
            'parent' => $m1->id,
            'order' => 3,
        ]);

        factory(Menu::class)->create([
            'id' => '6',
            'name' => 'Opción 2',
            'slug' => 'opcion2',
            'parent' => 0,
            'order' => 1,
        ]);
        $m3 = factory(Menu::class)->create([
            'id' => '7',
            'name' => 'Opción 3',
            'slug' => 'opcion3',
            'parent' => 0,
            'order' => 2,
        ]);
        $m4 = factory(Menu::class)->create([
            'id' => '8',
            'name' => 'Opción 4',
            'slug' => 'opcion4',
            'parent' => 0,
            'order' => 3,
        ]);
        
        factory(Menu::class)->create([
            'id' => '9',
            'name' => 'Opción 3.1',
            'slug' => 'opcion-3.1',
            'parent' => $m3->id,
            'order' => 0,
        ]);
        $m32 = factory(Menu::class)->create([
            'id' => '10',
            'name' => 'Opción 3.2',
            'slug' => 'opcion-3.2',
            'parent' => $m3->id,
            'order' => 1,
        ]);
        factory(Menu::class)->create([
            'id' => '11',
            'name' => 'Opción 4.1',
            'slug' => 'opcion-4.1',
            'parent' => $m4->id,    
            'order' => 0,
        ]);        
    }
}
