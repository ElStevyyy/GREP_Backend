<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\juridiques;

class juridiquesController extends Controller
{
    public function index()
    {
        return juridiques::all();
    }
}
