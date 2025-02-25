<?php

namespace App\Http\Controllers;

use App\Models\Lphunk;
use App\Models\LphunkComponets;
use Illuminate\Http\Request;

class LphunkComponetsController extends Controller
{
    //
    public function create(){
        $machines=Lphunk::all();
        return view('lphunk.create',compact('machines'));
    }
    public function store(Request $request){
         //dd($request->all());
          $validated = $request->validate([
            'machine_id' => 'required|array',
            'name' => 'required|array',
            'echantillon_cfa' => 'required|array',
            'refus_machine' => 'required|array',
            'refus_prototype' => 'required|array',
            'matricule' => 'required|array',
            'refus_mc' => 'required|array',
            'production' => 'required|array',
            'nb_reg' => 'required|array',
            'maint' => 'required|array',
            'pcl' => 'required|array',
            'refus_mc2' => 'required|array',
            'production2' => 'required|array',
            'nb_reg2' => 'required|array',
            'maint2' => 'required|array',
            'pcl2' => 'required|array',
            'refus_mc3' => 'required|array',
            'production3' => 'required|array',
            'nb_reg3' => 'required|array',
            'maint3' => 'required|array',
            'pcl3' => 'required|array',
            'refus_mc4' => 'required|array',
            'production4' => 'required|array',
            'nb_reg4' => 'required|array',
            'maint4' => 'required|array',
            'pcl4'=> 'required|array',
            'nb_carte_kan' => 'required|array',
            'nb_heures' => 'required|array',
            'group' => 'required|string',
            'name_mc' => 'required|string',
            'date'=>'required|array',
        ]);
         // Prepare the data to be stored
    $data = [];

    $count = count($request->machine_id);

    for ($i = 0; $i < $count; $i++) {
        $data[] = [
            'machine_id' => $request->machine_id[$i] ?? null,
            'name' => $request->name[$i] ?? null,
            'echantillon_cfa' => $request->echantillon_cfa[$i] ?? null,
            'refus_machine' => $request->refus_machine[$i] ?? null,
            'refus_prototype' => $request->refus_prototype[$i] ?? null,
            'matricule' => $request->matricule[$i] ?? null,
            'refus_mc' => $request->refus_mc[$i] ?? null,
            'production' => $request->production[$i] ?? null,
            'nb_reg' => $request->nb_reg[$i] ?? null,
            'maint' => $request->maint[$i] ?? null,
            'pcl' => $request->pcl[$i] ?? null,
            'refus_mc2' => $request->refus_mc2[$i] ?? null,
            'production2' => $request->production2[$i] ?? null,
            'nb_reg2' => $request->nb_reg2[$i] ?? null,
            'maint2' => $request->maint2[$i] ?? null,
            'pcl2' => $request->pcl2[$i] ?? null,
            'refus_mc3' => $request->refus_mc3[$i] ?? null,
            'production3' => $request->production3[$i] ?? null,
            'nb_reg3' => $request->nb_reg3[$i] ?? null,
            'maint3' => $request->maint3[$i] ?? null,
            'pcl3' => $request->pcl3[$i] ?? null,
            'refus_mc4' => $request->refus_mc4[$i] ?? null,
            'production4' => $request->production4[$i] ?? null,
            'nb_reg4' => $request->nb_reg4[$i] ?? null,
            'maint4' => $request->maint4[$i] ?? null,
            'pcl4' => $request->pcl4[$i] ?? null,
            'nb_carte_kan' => $request->nb_carte_kan[$i] ?? null,
            'nb_heures' => $request->nb_heures[$i] ?? null,
            'group' => $request->group ?? null,
            'name_mc' => $request->name_mc ?? null,
            'date' => $request->date[$i] ?? null,
            'created_at' => now(),
        ];
    }
    

    //dd($data);

    // Store the data in the database
    LphunkComponets::insert($data);

    return redirect()->route('lphunkuser.create')->with('success', 'Machines details stored successfully.');
    }
}
