<?php

namespace App\Http\Controllers;

use App\Models\CoupeOne;
use App\Models\CoupeOneComponets;
use Illuminate\Http\Request;

class AdminCoupeOneController extends Controller
{
    //
    public function archive()
    {
        $machines = CoupeOneComponets::all();
        return view('admin.coupeone.archive', compact('machines'));
    }
    public function index()
    {
        $machines = CoupeOneComponets::all();
        return view('admin.coupeone.index', compact('machines'));
    }
    public function create()
    {
        return view('admin.coupeone.create');
    }
    public function store(Request $request)
    {
        $machine = $request->machines;
        $request->validate([
            'machines'=> 'required',
        ]);
        CoupeOne::create([
            'machines' => $machine,
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'Machine created successfully');
    }
}
