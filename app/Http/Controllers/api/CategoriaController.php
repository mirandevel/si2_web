<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
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
}
