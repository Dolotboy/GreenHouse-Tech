<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $table = 'tblProblem';
    protected $primaryKey = 'idProblem';

    public function plants()
    {
        return $this->belongsToMany(Plant::class, 'tblPlant_tblProblem', 'tblPlant_idPlant', 'tblProblem_idProblem');
    }
}
