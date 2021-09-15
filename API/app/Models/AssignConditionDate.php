<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignConditionDate extends Model
{
    protected $table = 'tblPlant_tblDateRangeFav';
    protected $primaryKey = ['tblPlant_idPlant', 'tblDateRangeFav_idRangeDate'];
    public $incrementing = false;
}
