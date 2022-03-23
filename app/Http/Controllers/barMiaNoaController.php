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
    
    public function store(Request $request)
    {
        $barMiaNoa = BarMIaNoa::create($request->all());

        return response()->json($barMiaNoa, 201);
    }

    public function update(Request $request, BarMIaNoa $barMiaNoa)
    {
        $barMiaNoa->update($request->all());

        return response()->json($barMiaNoa, 200);
    }

    public function delete(BarMIaNoa $barMiaNoa)
    {
        $barMiaNoa->delete();

        return response()->json(null, 204);
    }
}
