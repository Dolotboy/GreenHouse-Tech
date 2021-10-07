<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignConditionDate extends Model
{
    protected $table = 'tblPlant_tblRangeDate';
    protected $primaryKey = ['tblPlant_idPlant', 'tblRangeDate_idRangeDate'];
    public $incrementing = false;
}
