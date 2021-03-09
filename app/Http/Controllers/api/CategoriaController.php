<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\CategoriaProducto;
use App\Models\CategoriaUsuario;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\User;
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
            ->distinct()
            ->join('categoria_productos', 'productos.id', '=', 'producto_id')
            ->where('categoria_productos.categoria_id', $categoriaID)
            ->get();
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
        $userID = $request->user()->id;
        $listaCa = Categoria::select("categorias.*")
            ->leftjoin('categoria_usuarios', 'categoria_usuarios.categoria_id', '=', 'categorias.id')
            ->rightjoin('categoria_productos', 'categoria_productos.categoria_id', '=', 'categorias.id')
            ->where('categoria_usuarios.user_id', '=', $userID)
            ->orderBy('categoria_usuarios.categoria_id')
            ->groupBy('categoria_usuarios.categoria_id')->get();


        return $listaCa;
    }
    public function susCategorias (Request $request)
    {  $userID = $request->user()->id;
        $categorias = Categoria::select("categorias.*")
        ->join('categoria_productos', 'categoria_productos.categoria_id', '=', 'categorias.id')
        ->orderBy('categorias.id', 'asc')
        ->groupBy('categorias.id')->get();
        return $categorias;

    }

    public function categoriasConProducto(Request $request)
    {
        $productos = Producto::select("productos.*", "categorias.nombre")
            ->join('categoria_productos', 'productos.id', '=', 'producto_id')
            ->join('categorias', 'categoria_productos.categoria_id', '=', 'categorias.id')
            ->orderBy('productos.id', 'desc', 'categorias.nombre', 'desc')
            ->groupBy('productos.id', 'categorias.nombre')
            ->get();
        return $productos;
    }

    public function categoriasDeUsuario(Request $request)
    {
        $usuarioID = $request["usuarioID"];
        $categorias = Categoria::select("categorias.*")
            ->join('categoria_usuarios', 'categorias.id', '=', 'categoria_id')
            ->where('categoria_usuarios.user_id', '=', $usuarioID)
            ->orderBy('categorias.id', 'desc')
            ->groupBy('categorias.id')
            ->get();
        return $categorias;

    }

    public function cate(Request $request)
    {
        $usuarioID = $request["usuarioID"];
        $categorias = Categoria::whereExists(function ($query) use ($usuarioID) {
            $query->from('categoria_usuarios')->select('categoria_usuarios.categoria_id')->
            where('categoria_usuarios.user_id', '=', $usuarioID);
        })->orderBy('categorias.id', 'asc')
            ->groupBy('categorias.id')->get();
        /*     ->join('categoria_usuarios', 'categorias.id', '=', 'categoria_id')
             ->join('users','categoria_usuarios.user_id', '=', $usuarioID)
             ->where('categoria_usuarios.user_id', '=', $usuarioID)
             ->orderBy('categorias.id', 'desc')
             ->groupBy('categorias.id')
             ->get();*/
        return $categorias;
    }

    public function guardarCategoriasDeUsuario(Request $request)
    {
        $usuarioID = $request["usuarioID"];
        CategoriaUsuario::where('user_id', '=', $usuarioID)->delete();
        $userID = $request["usuarioID"];
        $categorias = $request["preferencias"];

        foreach ($categorias as $categoriaID) {
            CategoriaUsuario::create([
                'categoria_id' => $categoriaID,
                'user_id' => $userID
            ]);
        }
        return true;
    }

    public function prueba(Request $request)
    {
        $usuario = User::where('id', '=', 1)->get();
        return $usuario;

    }

    public function masVendido()
    {
        $producto = Producto::select('productos.*')
            ->join('detalles', 'productos.id', '=', 'detalles.producto_id')
            ->orderBy('detalles.cantidad', 'desc', 'productos.id', 'desc')
            ->groupBy('detalles.cantidad', 'productos.id')
            ->first();
        $marca_id = $producto->marca_id;
        $marca = Marca::where('id', '=', $marca_id)->first();
        return ['producto' => $producto, 'marca' => $marca];

    }

    public function obtenerSimilaes(Request $request)
    {
        $productoID = $request["productoID"];
        $categoriaID = CategoriaProducto::select('categoria_productos.categoria_id')
            ->where('producto_id', '=', $productoID)->first();
        $productos = Producto::select('productos.*')
            ->join('categoria_productos', 'productos.id', '=', 'categoria_productos.producto_id')
            ->where('categoria_productos.categoria_id', '=', function ($query) use ($productoID) {
                $query->from('categoria_productos')->select('categoria_productos.categoria_id')
                    ->where('categoria_productos.producto_id', '=', $productoID)->first();
            })
            ->where('productos.id', '!=', $productoID)
            ->inRandomOrder()
            ->groupby('productos.id')
            ->limit(6)
            ->get();
        return $productos;

    }
}
