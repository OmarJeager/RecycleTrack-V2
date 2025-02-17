<?php

namespace App\Http\Controllers;

use App\Models\Toursado;
use App\Models\ToursadoComponets;
use Illuminate\Http\Request;

class TorsadoController extends Controller
{
    public function create(){
        $machines=Toursado::all();
        return view('torsado.create',compact('machines'));
    }
    //
    public function storedata(Request $request){
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
            'wk' => 'required|int',
            'date'=>'required|array',
        ]);
         // Prepare the data to be stored
         
    $data = [];

    $count = count($request->machine_id);

    for ($i = 0; $i < $count; $i++) {
        $data[] = [
            'machine_id' => $request->machine_id[$i],
            'name' => $request->name[$i],
            'echantillon_cfa' => $request->echantillon_cfa[$i],
            'refus_machine' => $request->refus_machine[$i],
            'refus_prototype' => $request->refus_prototype[$i],
            'matricule' => $request->matricule[$i],
            'refus_mc' => $request->refus_mc[$i],
            'production' => $request->production[$i],
            'nb_reg' => $request->nb_reg[$i],
            'maint' => $request->maint[$i],
            'pcl' => $request->pcl[$i],
            'refus_mc2' => $request->refus_mc2[$i],
            'production2' => $request->production2[$i],
            'nb_reg2' => $request->nb_reg2[$i],
            'maint2' => $request->maint2[$i],
            'pcl2' => $request->pcl2[$i],
            'refus_mc3' => $request->refus_mc3[$i],
            'production3' => $request->production3[$i],
            'nb_reg3' => $request->nb_reg3[$i],
            'maint3' => $request->maint3[$i],
            'pcl3' => $request->pcl3[$i],
            'refus_mc4' => $request->refus_mc4[$i],
            'production4' => $request->production4[$i],
            'nb_reg4' => $request->nb_reg4[$i],
            'maint4' => $request->maint4[$i],
            'pcl4' => $request->pcl4[$i],
            'nb_carte_kan' => $request->nb_carte_kan[$i],
            'nb_heures' => $request->nb_heures[$i],
            'group' => $request->group,
            'name_mc' => $request->name_mc,
            'wk' => $request->wk,
            'date' => $request->date[$i],
        ];
    }
    //dd($data);

    // Store the data in the database
    ToursadoComponets::insert($data);

    return redirect()->route('add.create')->with('success', 'Machines details stored successfully.');
    }
}
