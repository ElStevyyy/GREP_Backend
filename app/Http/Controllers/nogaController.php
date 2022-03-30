<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nogas;

class nogaController extends Controller
{
    public function index()
    {
        return nogas::all();
    }
}
