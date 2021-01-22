<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre' => 'Sofás',
        ]);
        Categoria::create([
            'nombre' => 'Mesas',
        ]);
        Categoria::create([
            'nombre' => 'Sillas',
        ]);
        Categoria::create([
            'nombre' => 'Camas',
        ]);
        Categoria::create([
            'nombre' => 'Escritorios',
        ]);
        Categoria::create([
            'nombre' => 'Colchones',
        ]);
        Categoria::create([
            'nombre' => 'Cómodas',
        ]);
        Categoria::create([
            'nombre' => 'Otomanas',
        ]);
        Categoria::create([
            'nombre' => 'Mesas de comedor',
        ]);
        Categoria::create([
            'nombre' => 'Sillas de comedor',
        ]);
        Categoria::create([
            'nombre' => 'Sofás seccionales',
        ]);
        Categoria::create([
            'nombre' => 'Muebles de televisor',
        ]);
        Categoria::create([
            'nombre' => 'Bibliotecas',
        ]);
        Categoria::create([
            'nombre' => 'Futones',
        ]);
        Categoria::create([
            'nombre' => 'Literas',
        ]);
        Categoria::create([
            'nombre' => 'Mesitas de café',
        ]);
        Categoria::create([
            'nombre' => 'Taburetes',
        ]);
        Categoria::create([
            'nombre' => 'Mesas auxiliares de salón',
        ]);
        Categoria::create([
            'nombre' => 'Mesa de noche',
        ]);
        Categoria::create([
            'nombre' => 'Mini bar',
        ]);
        Categoria::create([
            'nombre' => 'Islas para cocina',
        ]);
        Categoria::create([
            'nombre' => 'Armarios',
        ]);
        Categoria::create([
            'nombre' => 'Bancos de almacenamiento',
        ]);
        Categoria::create([
            'nombre' => 'Organizadores de juguetes',
        ]);
        Categoria::create([
            'nombre' => 'Percheros de pared',
        ]);
        Categoria::create([
            'nombre' => 'Muebles pequeños',
        ]);
        Categoria::create([
            'nombre' => 'Sillas decorativas',
        ]);
        Categoria::create([
            'nombre' => 'Patas de muebles',
        ]);
        Categoria::create([
            'nombre' => 'Estilos de respaldos de sillas',
        ]);
        Categoria::create([
            'nombre' => 'Estilos de apoyabrazos',
        ]);
        Categoria::create([
            'nombre' => 'Muebles para jardín',
        ]);
    }
}
