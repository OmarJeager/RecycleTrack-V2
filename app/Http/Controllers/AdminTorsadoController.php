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
        $machines=Toursado::all();
        return view('admin.torsado.create', compact('machines'));
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
    public function edit($id)
    {
        $sertissage = Toursado::find($id);
        return view('admin.torsado.edit', compact('sertissage'));
    }
    public function update(Request $request, $id)
    {
        $sertissage = Toursado::find($id);
        $sertissage->machines = $request->machines;
        $sertissage->save();
        return redirect()->route('admin.dashboard')->with('success', 'Machine updated successfully');
    }
    public function destroy($id)
    {
        //dd($id);
        $sertissage = Toursado::find($id);
        $sertissage->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Machine deleted successfully');
    }
}
