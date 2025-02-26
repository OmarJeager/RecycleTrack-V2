<?php

namespace App\Http\Controllers;

use App\Models\ComposoFour;
use App\Models\ComposoFourComponets;
use Illuminate\Http\Request;

class AdminComposoFourController extends Controller
{
    //
    public function archive()
    {
        $machines = ComposoFourComponets::all();
        return view('admin.composofour.archive', compact('machines'));
    }
    public function index()
    {
        $machines = ComposoFourComponets::all();
        return view('admin.composofour.index', compact('machines'));
    }
    public function create()
    {
        $machines=ComposoFour::all();
        return view('admin.composofour.create', compact('machines'));
    }
    public function store(Request $request)
    {
        $machine = $request->machines;
        $request->validate([
            'machines'=> 'required',
        ]);
        ComposoFour::create([
            'machines' => $machine,
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'Machine created successfully');
    }
    public function edit($id)
    {
        $sertissage = ComposoFour::find($id);
        return view('admin.composofour.edit', compact('sertissage'));
    }
    public function update(Request $request, $id)
    {
        //dd($id, request()->all()); // Debugging

        $machine = ComposoFour::find($id);
    
        if (!$machine) {
            return redirect()->route('admin.dashboard')->with('error', 'Machine not found.');
        }
    
        $request->validate([
            'machines' => 'required',
        ]);
    
        $machine->update([
            'machines' => $request->machines,
        ]);
    
        return redirect()->route('admin.dashboard')->with('success', 'Machine updated successfully');
    }

    public function destroy($id)
    {
        //dd($id);
        $sertissage = ComposoFour::find($id);
        $sertissage->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Machine deleted successfully');
    }
}
