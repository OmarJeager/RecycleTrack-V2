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
        $machines=CoupeOne::all();
        return view('admin.coupeone.create', compact('machines'));
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

    public function edit($id)
    {
        $sertissage = CoupeOne::find($id);
        return view('admin.coupeone.edit', compact('sertissage'));
    }
    public function update(Request $request, $id)
    {
        $machine = CoupeOne::find($id);
        $request->validate([
            'machines'=> 'required',
        ]);
        $machine->update([
            'machines' => $request->machines,
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'Machine updated successfully');
    }
    public function destroy($id)
    {
        //dd($id);
        $sertissage = CoupeOne::find($id);
        $sertissage->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Machine deleted successfully');
    }
}
