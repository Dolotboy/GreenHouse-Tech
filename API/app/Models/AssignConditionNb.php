<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignConditionNb extends Model
{
    protected $table = 'tblPlant_tblRangeFavorableConditionNb';
    protected $primaryKey = ['tblPlant_idPlant', 'tblRangeFavorableConditionNb_idRangeNb'];
    public $incrementing = false;
}
