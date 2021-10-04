<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $table = 'tblPlant';
    protected $primaryKey = 'idPlant';

    public function plantProblems()
    {
        return $this->belongsToMany(Problem::class, 'tblPlant_tblProblem', 'tblPlant_idPlant', 'tblProblem_idProblem');
    }

    public function plantFavConditionDate()
    {
        return $this->belongsToMany(FavorableConditionDate::class, 'tblPlant_tblRangeDate', 'tblPlant_idPlant', 'tblRangeDate_idRangeDate');
    }

    public function plantFavConditionNb()
    {
        return $this->belongsToMany(FavorableConditionNb::class, 'tblPlant_tblRangeNb', 'tblPlant_idPlant', 'tblRangeNb_idRangeNb');
    }
}
