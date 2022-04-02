<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etablissement;


class EtablissementController extends Controller
{
    public function index()
    {
        $etablissement = Etablissement::select("*")
        ->where("idEtablissement", "=", 2)
        ->get();

        return  $etablissement;
    }


}
