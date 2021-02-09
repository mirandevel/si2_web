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

    public function guardarPreferencias(Request $request)
    {
        $userID = $request->user()->id;
        $categorias = $request["categorias"];

        foreach ($categorias as $categoriaID) {
            CategoriaUsuario::create([
                'categoria_id' => $categoriaID,
                'user_id' => $userID
            ]);
        }


        return response()->json(['mensaje' => 'ok']);
    }

    public function obtenerPorCategoria(Request $request)
    {
        $categoriaID = $request["categoriaID"];
        $productos = Producto::select("productos.*")
            ->join('categoria_productos', 'productos.id', '=', 'producto_id')
            ->where('categoria_productos.categoria_id', $categoriaID)->get();
        return $productos;
    }

    public function obtenerProductos(Request $request)
    {
        $productos = Producto::select("productos.*", "categorias.id")
            ->join('categoria_productos', 'productos.id', '=', 'producto_id')
            ->join('categorias', 'categoria_productos.categoria_id', '=', 'categorias.id')
            ->orderBy('productos.id', 'desc', 'categorias.id', 'desc')
            ->groupBy('productos.id', 'categorias.id')
            ->get();
        return $productos;
    }

    public function categoriasConProductos(Request $request)
    {
        $categorias = Categoria::select("categorias.*")
                ->join('categoria_productos', 'categoria_productos.categoria_id', '=', 'categorias.id')
                ->orderBy('categorias.id', 'asc')
                ->groupBy('categorias.id')->get();
        return $categorias;
    }

}
