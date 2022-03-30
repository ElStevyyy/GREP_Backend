<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarMiaNoa;

class barMiaNoaController extends Controller
{
    public function index()
    {
        return BarMIaNoa::all();
    }

    public function show(BarMIaNoa $barMiaNoa)
    {
        return $barMiaNoa;
    }

}
