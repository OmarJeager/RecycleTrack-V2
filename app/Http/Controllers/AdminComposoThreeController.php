<?php

namespace App\Http\Controllers;

use App\Models\ComposeThree;
use App\Models\ComposeThreeComponets;
use Illuminate\Http\Request;

class AdminComposoThreeController extends Controller
{
    //
    public function archive()
    {
        $machines = ComposeThreeComponets::all();
        return view('admin.composethree.archive', compact('machines'));
    }
    public function index()
    {
        $machines = ComposeThreeComponets::all();
        return view('admin.composethree.index', compact('machines'));
    }
    public function create()
    {
        $machines=ComposeThree::all();
        return view('admin.composethree.create',compact('machines'));
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
     public function destroy($id)
    {
        //dd($id);
        $sertissage = ComposeThree::find($id);
        $sertissage->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Machine deleted successfully');
    }
}
