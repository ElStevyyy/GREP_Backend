<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nogas;

class nogaController extends Controller
{
    /**
     * Permet d'afficher tous les codes Noga
     * 
     * @return nogas : tous les codes Noga sous format JSON
     */
    public function index()
    {
        return nogas::all();
    }
}
