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
    public function destroy($id)
    {
        //dd($id);
        $sertissage = ComposoFour::find($id);
        $sertissage->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Machine deleted successfully');
    }
}
