<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sertissage;
use App\Models\MachineEntry;
class AdminController extends Controller
{
    public function archive()
    {
        $machines = MachineEntry::all();
        $sertissages = Sertissage::all();
        return view('admin.sertissage.archive', compact('machines','sertissages'));
    }
    public function index()
    {
        $machines = MachineEntry::all();
        $sertissages = Sertissage::all();
        return view('admin.sertissage.index', compact('machines','sertissages'));
    }
    public function create()
    {
        $machines = Sertissage::all();
        return view('admin.sertissage.create',compact('machines'));
    }
    public function store(Request $request)
    {
        $machine = $request->machines;
        $request->validate([
            'machines'=> 'required',
        ]);
        Sertissage::create([
            'machines' => $machine,
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'Machine created successfully');
    }
    public function edit($id)
    {
        $sertissage = Sertissage::find($id);
        return view('admin.sertissage.edit', compact('sertissage'));
    }
    public function update(Request $request, $id)
    {
        $sertissage = Sertissage::find($id);
        $sertissage->machines = $request->machines;
        $sertissage->save();
        return redirect()->route('admin.dashboard')->with('success', 'Machine updated successfully');
    }
    public function destroy($id)
    {
        //dd($id);
        $sertissage = Sertissage::find($id);
        $sertissage->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Machine deleted successfully');
    }
}
