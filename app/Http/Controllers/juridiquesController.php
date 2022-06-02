<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\juridiques;

class juridiquesController extends Controller
{
    /**
     * Permet d'afficher toutes les natures juridiques
     * 
     * @return juridiques : toutes les natures juridiques sous format JSON
     */
    public function index()
    {
        return juridiques::all();
    }
}
