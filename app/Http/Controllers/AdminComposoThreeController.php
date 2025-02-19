<?php

namespace App\Http\Controllers;

use App\Models\ComposeThree;
use App\Models\ComposeThreeComponets;
use Illuminate\Http\Request;

class AdminComposoThreeController extends Controller
{
    //
    public function index()
    {
        $machines = ComposeThreeComponets::all();
        return view('admin.composethree.index', compact('machines'));
    }
    public function create()
    {
        return view('admin.composethree.create');
    }
    public function store(Request $request)
    {
        $machine = $request->machines;
        $request->validate([
            'machines'=> 'required',
        ]);
        ComposeThree::create([
            'machines' => $machine,
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'Machine created successfully');
    }
}
