<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Taille;
class tailleController extends Controller
{
    public function index()
    {
        return Taille::all();
    }
}
