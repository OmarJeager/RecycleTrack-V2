<?php

namespace App\Http\Controllers;

use App\Models\Lphunk;
use App\Models\LphunkComponets;
use Illuminate\Http\Request;

class AdminLphunkController extends Controller
{
    //
    public function archive()
    {
       // $machines = ToursadoComponets::all();
        $machines = LphunkComponets::all();
        return view('admin.Lphunk.archive', compact('machines','machines'));
    }
    public function index()
    {
       // $machines = ToursadoComponets::all();
        $machines = LphunkComponets::all();
        return view('admin.Lphunk.index', compact('machines','machines'));
    }
    public function create()
    {
        return view('admin.lphunk.create');
    }
    public function store(Request $request)
    {
        $machine = $request->machines;
        $request->validate([
            'machines'=> 'required',
        ]);
        Lphunk::create([
            'machines' => $machine,
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'Machine created successfully');
    }
}
