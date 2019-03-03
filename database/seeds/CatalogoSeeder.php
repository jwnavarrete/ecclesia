<?php use Illuminate\Database\Seeder;
use App\Models\Catalogo;

class CatalogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Catalogo')->delete();
        $dataGrupo="G";
        $dataMeses="M";
        $dataPaises="P";
        $dataCiudad="C";
        
        Catalogo::create(['data'   => $dataGrupo , 'nombre'   => 'Pastor','descripcion'   => 'Pastor de iglesia','estado'   => 'A']);
        Catalogo::create(['data'   => $dataGrupo , 'nombre'   => 'Tesorero','descripcion'   => 'Tesorero de iglesia','estado'   => 'A']);
        Catalogo::create(['data'   => $dataGrupo , 'nombre'   => 'Miembro','descripcion'   => 'Miembro de iglesia','estado'   => 'A']);
        Catalogo::create(['data'   => $dataGrupo , 'nombre'   => 'Visitante','descripcion'   => 'Visitante de iglesia','estado'   => 'A']);
        Catalogo::create(['data'   => $dataGrupo , 'nombre'   => 'Oyente','descripcion'   => 'Oyente de iglesia','estado'   => 'A']);
        Catalogo::create(['data'   => $dataGrupo , 'nombre'   => 'Lider','descripcion'   => 'Lider de iglesia','estado'   => 'A']);


        Catalogo::create(['data'   => $dataMeses , 'nombre'   => 'Enero','descripcion'   => '','estado'   => 'A']);
        Catalogo::create(['data'   => $dataMeses , 'nombre'   => 'Febrero','descripcion'   => '','estado'   => 'A']);
        Catalogo::create(['data'   => $dataMeses , 'nombre'   => 'Marzo','descripcion'   => '','estado'   => 'A']);
        Catalogo::create(['data'   => $dataMeses , 'nombre'   => 'Abril','descripcion'   => '','estado'   => 'A']);
        Catalogo::create(['data'   => $dataMeses , 'nombre'   => 'Mayo','descripcion'   => '','estado'   => 'A']);
        Catalogo::create(['data'   => $dataMeses , 'nombre'   => 'Junio','descripcion'   => '','estado'   => 'A']);
        Catalogo::create(['data'   => $dataMeses , 'nombre'   => 'Julio','descripcion'   => '','estado'   => 'A']);
        Catalogo::create(['data'   => $dataMeses , 'nombre'   => 'Agosto','descripcion'   => '','estado'   => 'A']);
        Catalogo::create(['data'   => $dataMeses , 'nombre'   => 'Septiembre','descripcion'   => '','estado'   => 'A']);
        Catalogo::create(['data'   => $dataMeses , 'nombre'   => 'Octubre','descripcion'   => '','estado'   => 'A']);
        Catalogo::create(['data'   => $dataMeses , 'nombre'   => 'Noviembre','descripcion'   => '','estado'   => 'A']);
        Catalogo::create(['data'   => $dataMeses , 'nombre'   => 'Diciembre','descripcion'   => '','estado'   => 'A']);

        Catalogo::create(['data'   => $dataPaises , 'nombre'   => 'Ecuador','descripcion'   => '','estado'   => 'A']);
        Catalogo::create(['data'   => $dataPaises , 'nombre'   => 'Chile','descripcion'   => '','estado'   => 'A']);
        Catalogo::create(['data'   => $dataPaises , 'nombre'   => 'Peru','descripcion'   => '','estado'   => 'A']);
        Catalogo::create(['data'   => $dataPaises , 'nombre'   => 'Colombia','descripcion'   => '','estado'   => 'A']);

        Catalogo::create(['data'   => $dataCiudad , 'nombre'   => 'Guayaquil','descripcion'   => '','estado'   => 'A']);
        Catalogo::create(['data'   => $dataCiudad , 'nombre'   => 'Quito','descripcion'   => '','estado'   => 'A']);
        Catalogo::create(['data'   => $dataCiudad , 'nombre'   => 'Machala','descripcion'   => '','estado'   => 'A']);
        Catalogo::create(['data'   => $dataCiudad , 'nombre'   => 'Lima','descripcion'   => '','estado'   => 'A']);

    }
}
