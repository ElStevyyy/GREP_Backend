<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bars;

class barMiaNoaController extends Controller
{
    /**
     * Permet de récupérer tous les bars ainsi que leur adresse associée
     * 
     * @return Bars : la liste des bars présents dans la bdd
     */
    public function index()
    {
 
        return Bars::with('adress')->get();
    }

    public function show(Bars $barMiaNoa)
    {
        return $barMiaNoa;
    }

}
