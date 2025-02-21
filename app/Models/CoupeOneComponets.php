<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoupeOneComponets extends Model
{
    //
    protected $fillable = [
        'machine_id',
        'name',
        'matricule',
        'objnbreg',
        'nbreg',
        'production',
        'dpndebobine',
        'mp',
        'tempsmort',
        'mce',
        'reglage',
        'process',
        'nbdeafaut',
        'nbheures',
        'metal',
        'echantilliondecfa',
        'echantilliondereglage',
        'refusmachine',
        'refusqualite',
        'refusprototype',
        'totalscrapemachine',
        'group',
        'namecm',
        'fill',
        'scrappic',
        'terminal',
        'date',
    ] ;
}
