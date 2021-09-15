<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignConditionNb extends Model
{
    protected $table = 'tblPlant_tblNbRangeFav';
    protected $primaryKey = ['tblPlant_idPlant', 'tblNbRangeFav_idRangeNb'];
    public $incrementing = false;
}
