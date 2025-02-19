<?php

namespace App\Http\Controllers;

use App\Models\ComposeThree;
use App\Models\ComposeThreeComponets;
use Illuminate\Http\Request;

class ComposeThreeComponetsController extends Controller
{
    //
    public function create(){
        $machines=ComposeThree::all();
        return view('composothree.create',compact('machines'));
    }
    public function store(Request $request){
        //dd($request->all());
        $validated = $request->validate([
            'machine_id' => 'required|array',
            'name' => 'required|array',
            'matricule'=>'required|array',
            'objnbreg'=>'required|array',
            'nbreg'=>'required|array',
            'production'=> 'required|array',
            'dpndebobine'=>'required|array',
            'mp'=>'required|array',
            'tempsmort'=>'required|array',
            'mce'=>'required|array',
            'reglage'=>'required|array',
            'process'=>'required|array',
            'nbdeafaut'=>'required|array',
            'nbheures'=>'required|array',
            'metal'=>'required|array',
            'echantilliondecfa'=>'required|array',
            'echantilliondereglage'=>'required|array',
            'refusmachine'=>'required|array',
            'refusqualite'=>'required|array',
            'refusprototype'=>'required|array',
            'totalscrapemachine'=>'required|array',
            'group'=>'required|string',
            'namecm'=>'required|string',
            'fill'=>'required',
            'scrappic'=>'required',
            'terminal',
        ]);
         // Prepare the data to be stored
    $data = [];

    $count = count($request->machine_id);

    for ($i = 0; $i < $count; $i++) {
        $data[] = [
            'machine_id' => $request->machine_id[$i],
            'name' => $request->name[$i],
            'matricule'=> $request->matricule[$i],
            'objnbreg'=>$request->objnbreg[$i],
            'nbreg'=> $request->nbreg[$i],
            'production'=>$request->production[$i],
            'dpndebobine'=> $request->dpndebobine[$i],
            'mp'=>$request->mp[$i],
            'tempsmort'=>$request->tempsmort[$i],
            'mce'=> $request->mce[$i],
            'reglage'=> $request->reglage[$i],
            'process'=> $request->process[$i],
            'nbdeafaut'=> $request->nbdeafaut[$i],
            'nbheures'=> $request->nbheures[$i],
            'metal'=> $request->metal[$i],
            'echantilliondecfa'=> $request->echantilliondecfa[$i],
            'echantilliondereglage'=> $request->echantilliondereglage[$i],
            'refusmachine'=> $request->refusmachine[$i],
            'refusqualite'=> $request->refusqualite[$i],
            'refusprototype'=> $request->refusqualite[$i],
            'totalscrapemachine'=> $request->totalscrapemachine[$i],
            'group'=>$request->group,
            'namecm'=>$request->namecm,
            'fill'=>$request->fill,
            'scrappic'=>$request->scrappic,
            'terminal'=>$request->terminal,
            'created_at' => now(),
        ];
    }
    //dd($data);

    // Store the data in the database
    ComposeThreeComponets::insert($data);

    return redirect()->route('usercomposothree.create')->with('success', 'Machines details stored successfully.');
    }
}
