<?php

namespace App\Http\Controllers;

use App\Models\ComposeTow;
use App\Models\ComposeTowComponets;
use Illuminate\Http\Request;

class AdminComposeTow extends Controller
{
    //
    public function index()
    {
        $machines = ComposeTowComponets::all();
        return view('admin.composetwo.index', compact('machines'));
    }
    public function create()
    {
        return view('admin.composetwo.create');
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
}
