<?php

namespace App\Http\Controllers;
use App\Models\Sertissage;
use App\Models\MachineEntry;
use Illuminate\Http\Request;

class MachineEntryController extends Controller
{
    //
    public function create()
    {
        $machines = Sertissage::all();
        return view('sertissages.create', compact('machines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'machine_id' => 'required',
            'name' => 'required',
            'echantillon_cfa' => 'required',
            'refus_machine' => 'required',
            'refus_prototype' => 'required',
            'matricule' => 'required',
            'refus_mc' => 'required',
            'production' => 'required',
            'nb_reg' => 'required',
            'maint' => 'required',
            'pcl' => 'required',
            'refus_mc2'=> 'required',
            'production2' => 'required',
            'nb_reg2' => 'required',
            'maint2' => 'required',
            'pcl2' => 'required',
            'refus_mc3' => 'required',
            'production3' => 'required',
            'nb_reg3' => 'required',
            'maint3' => 'required',
            'pcl3' => 'required',
            'refus_mc4' => 'required',
            'production4' => 'required',
            'nb_reg4' => 'required',
            'maint4' => 'required',
            'pcl4' => 'required',
            'nb_carte_kanban' => 'required',
            'nb_heures' => 'required',
        ]);

        MachineEntry::create($request->all());

        return redirect()->route('machineEntries.create')->with('success', 'Data added successfully!');
    }
}
