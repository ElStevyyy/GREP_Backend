<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Taille;

class tailleController extends Controller
{
    
    /**
     * Permet d'afficher toutes les tailles possibles dans l'ordre croissant
     * 
     * @return tailles : toutes les tailles
     */
    public function index()
    {
        return \DB::table('tailles')->orderByraw('LENGTH(taille) asc')->get();
    }
}
