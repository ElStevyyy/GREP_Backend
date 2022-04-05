<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bars;

class barMiaNoaController extends Controller
{
    public function index()
    {
 
        return Bars::with('adress')->get();
    }

    public function show(Bars $barMiaNoa)
    {
        return $barMiaNoa;
    }

}
