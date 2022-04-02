<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etablissement;


class etablissementController extends Controller
{
    //

    public function testAdresse(){
        $etablissement = Etablissement::find(1);
        $adresse = $etablissement->adress()->get();
        echo($adresse);
   }
}
