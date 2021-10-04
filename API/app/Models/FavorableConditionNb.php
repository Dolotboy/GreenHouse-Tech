<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavorableConditionNb extends Model
{
    protected $table = 'tblRangeNb';
    protected $primaryKey = 'idRangeNb';

    public function plants()
    {
        return $this->belongsToMany(Plant::class, 'tblPlant_tblRangeNb', 'tblPlant_idPlant', 'tblRangeNb_idRangeNb');
    }
}
