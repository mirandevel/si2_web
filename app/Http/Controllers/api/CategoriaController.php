<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\CategoriaUsuario;
use App\Models\Producto;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    /**
     *
     * metodo que retorna todas las categorias
     *
     * @return Categoria[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getcategorias()
    {
        return Categoria::all();
    }
    public function guardarPreferencias(Request $request){
        $userID = $request->user()->id;
        $categorias = $request["categorias"];

        foreach ($categorias as $categoriaID){
            CategoriaUsuario::create([
                'categoria_id'=>$categoriaID,
                'user_id'=> $userID
            ]);
        }

    }
    public function obtenerPorCategoria(Request $request){
        $categoriaID = $request["categoriaID"];
        $productos = Producto::select("productos.*")
        ->join('categoria_productos', 'productos.id', '=', 'producto_id')
            ->where('categoria_productos.categoria_id',$categoriaID)->get();
        return $productos;
    }
}
