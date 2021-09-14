<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignConditionDate extends Model
{
    protected $table = 'tblPlant_tblDateRangeFavorableCondition';
    protected $primaryKey = ['tblPlant_idPlant', 'tblDateRangeFavorableCondition_idRangeDate'];
    public $incrementing = false;
}
