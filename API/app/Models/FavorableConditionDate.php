<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavorableConditionDate extends Model
{
    protected $table = 'tblDateRangeFav';
    protected $primaryKey = 'idRangeDate';

    public function plants()
    {
        return $this->belongsToMany(Plant::class, 'tblPlant_tblDateRangeFav', 'tblPlant_idPlant', 'tblDateRangeFav_idRangeDate');
    }
}
