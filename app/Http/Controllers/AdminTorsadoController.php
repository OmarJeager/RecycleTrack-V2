<?php

namespace App\Http\Controllers;

use App\Models\Toursado;
use App\Models\ToursadoComponets;
use Illuminate\Http\Request;

class AdminTorsadoController extends Controller
{
    public function archive()
    {
        $machines = ToursadoComponets::all();
        $sertissages = Toursado::all();
        return view('admin.torsado.archive', compact('machines','sertissages'));
    }
    public function index()
    {
        $machines = ToursadoComponets::all();
        $sertissages = Toursado::all();
        return view('admin.torsado.index', compact('machines','sertissages'));
    }
    public function create()
    {
        return view('admin.torsado.create');
    }
    public function store(Request $request)
    {
        $machine = $request->machines;
        $request->validate([
            'machines'=> 'required',
        ]);
        Toursado::create([
            'machines' => $machine,
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'Machine created successfully');
    }
}
