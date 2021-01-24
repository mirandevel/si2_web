<?php

namespace Database\Seeders;

use App\Models\CategoriaProducto;
use Illuminate\Database\Seeder;

class CategoriaProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sofa = 1;
        $mesa = 2;
        $silla = 3;
        $cama = 4;
        $armario = 5;
        $biblioteca = 6;
        $escritorio = 7;
        $colchon = 8;
        $comoda = 9;
        $otomana = 10;
        $mesaDeComedor = 11;
        $sillaDeComedor = 12;
        $sofaSeccional = 13;
        $muebleDeTelevisor = 14;
        $futon = 15;
        $litera = 16;
        $mesitaDeCafe = 17;
        $taburete = 18;
        $mesaAuxiliarDeSalon = 19;
        $mesaDeNoche = 20;
        $miniBar = 21;
        $islaParaCocina = 22;
        $bancoDeAlmacenamiento = 23;
        $organizadorDeJuguetes = 24;
        $percheroDePared = 25;
        $mueblePequeno = 26;
        $sillaDecorativa = 27;
        $pataDeMueble = 28;
        $estiloDeRespaldoDeSilla = 29;
        $estiloDeApoyabrazos = 30;
        $muebleParaJardin = 31;

        CategoriaProducto::create([
            'categoria_id' => $silla,
            'producto_id' => 1,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $sillaDecorativa,
            'producto_id' => 1,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $silla,
            'producto_id' => 2,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $silla,
            'producto_id' => 3,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $sillaDecorativa,
            'producto_id' => 3,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $sillaDeComedor,
            'producto_id' => 3,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $mesa,
            'producto_id' => 4,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $mesa,
            'producto_id' => 5,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $mesitaDeCafe,
            'producto_id' => 5,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $mesaDeNoche,
            'producto_id' => 5,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $sofa,
            'producto_id' => 6,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $cama,
            'producto_id' => 7,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $mesa,
            'producto_id' => 8,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $mesaDeNoche,
            'producto_id' => 8,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $mesaAuxiliarDeSalon,
            'producto_id' => 8,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $sofa,
            'producto_id' => 9,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $cama,
            'producto_id' => 10,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $silla,
            'producto_id' => 11,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $sillaDecorativa,
            'producto_id' => 11,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $mesa,
            'producto_id' => 12,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $mesaDeNoche,
            'producto_id' => 12,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $mesaAuxiliarDeSalon,
            'producto_id' => 12,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $silla,
            'producto_id' => 13,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $sillaDecorativa,
            'producto_id' => 13,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $mesa,
            'producto_id' => 14,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $mesaDeComedor,
            'producto_id' => 14,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $mesaAuxiliarDeSalon,
            'producto_id' => 14,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $mesa,
            'producto_id' => 15,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $mesaAuxiliarDeSalon,
            'producto_id' => 15,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $mesaDeNoche,
            'producto_id' => 15,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $cama,
            'producto_id' => 16,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $cama,
            'producto_id' => 17,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $silla,
            'producto_id' => 18,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $sillaDecorativa,
            'producto_id' => 18,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $sillaDeComedor,
            'producto_id' => 18,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $sofa,
            'producto_id' => 19,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $mesa,
            'producto_id' => 20,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $mesaDeComedor,
            'producto_id' => 20,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $cama,
            'producto_id' => 21,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $sofa,
            'producto_id' => 22,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $sofa,
            'producto_id' => 23,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $sofa,
            'producto_id' => 24,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $armario,
            'producto_id' => 25,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $biblioteca,
            'producto_id' => 26,
        ]);
        CategoriaProducto::create([
            'categoria_id' => $armario,
            'producto_id' => 27,
        ]);

    }
}
