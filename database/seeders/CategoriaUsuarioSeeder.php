<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\CategoriaUsuario;
use App\Models\RolUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class CategoriaUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = Categoria::select('id')->get()->toArray();
        $categoriasId = array();
        foreach ($categorias as $categoria)
        {
            $categoriasId[] = $categoria['id'];
        }
        $clientesId = RolUser::select('user_id')
            ->groupBy('user_id')
            ->havingRaw('COUNT(*) = ?', [1])
            ->get();

        foreach ($clientesId as $cliente)
        {
            shuffle($categoriasId);
            $categoriasDelUsuario = array_slice($categoriasId, rand(0, count($categoriasId)), rand(1, 10));
            for ($i = 0; $i < count($categoriasDelUsuario); $i++) {
                CategoriaUsuario::create([
                    'categoria_id' => $categoriasDelUsuario[$i],
                    'user_id' => $cliente->user_id,
                ]);
            }
        }
    }
}
