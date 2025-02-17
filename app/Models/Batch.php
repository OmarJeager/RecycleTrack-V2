<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    //
    protected $fillable = ['group', 'name_mc', 'wk'];

    public function machineEntries()
    {
        return $this->hasMany(MachineEntry::class);
    }
}
