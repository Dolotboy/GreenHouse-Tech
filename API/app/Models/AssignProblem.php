<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignProblem extends Model
{
    protected $table = 'tblPlant_tblProblem';
    protected $primaryKey = ['tblPlant_idPlant', 'tblProblem_idProblem'];
    public $incrementing = false;
}
