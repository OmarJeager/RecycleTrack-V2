<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MachineEntry extends Model
{
    protected $fillable = [
        'machine_id',
        'name',
        'echantillon_cfa',
        'refus_machine',
        'refus_prototype',
        'matricule',
        'refus_mc',
        'production',
        'nb_reg',
        'maint',
        'pcl',
        'refus_mc2',
        'production2',
        'nb_reg2',
        'maint2',
        'pcl2',
        'refus_mc3',
        'production3',
        'nb_reg3',
        'maint3',
        'pcl3',
        'refus_mc4',
        'production4',
        'nb_reg4',
        'maint4',
        'pcl4',
        'nb_carte_kanban',
        'nb_heures',
    ];
    public function machine()
    {
        return $this->belongsTo(Sertissage::class, 'machine_id');
    }
}
