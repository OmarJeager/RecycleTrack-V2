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
        $machines=Lphunk::all();
        return view('admin.lphunk.create', compact('machines'));
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
    public function edit($id)
    {
        $sertissage = Lphunk::find($id);
        return view('admin.lphunk.edit', compact('sertissage'));
    }
    public function update(Request $request, $id)
    {
        //dd($request->all());
        //dd($id);
        $request->validate([
            'machines' => 'required',
        ]);
        $sertissage = Lphunk::find($id);

    if (!$sertissage) {
        return redirect()->route('admin.dashboard')->with('error', 'Machine not found');
    }
        $sertissage->machines = $request->machines;
        $sertissage->save();
        return redirect()->route('admin.dashboard')->with('success', 'Machine updated successfully');
    }
    public function destroy($id)
    {
        //dd($id);
        $sertissage = Lphunk::find($id);
        $sertissage->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Machine deleted successfully');
    }
}
