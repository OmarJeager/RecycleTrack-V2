<?php

namespace App\Http\Controllers;

use App\Models\ComposeTow;
use App\Models\ComposeTowComponets;
use Illuminate\Http\Request;

class AdminComposeTow extends Controller
{
    //
    public function archive()
    {
        $machines = ComposeTowComponets::all();
        return view('admin.composetwo.archive', compact('machines'));
    }
    public function index()
    {
        $machines = ComposeTowComponets::all();
        return view('admin.composetwo.index', compact('machines'));
    }
    public function create()
    {
        $machines=ComposeTow::all();
        return view('admin.composetwo.create', compact('machines'));
    }
    public function store(Request $request)
    {
        $machine = $request->machines;
        $request->validate([
            'machines'=> 'required',
        ]);
        ComposeTow::create([
            'machines' => $machine,
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'Machine created successfully');
    }
    public function destroy($id)
    {
        //dd($id);
        $sertissage = ComposeTow::find($id);
        $sertissage->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Machine deleted successfully');
    }
}
