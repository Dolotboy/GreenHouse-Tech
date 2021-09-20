<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavorableConditionDate extends Model
{
    protected $table = 'tblDateRangeFav';
    protected $primaryKey = 'idRangeDate';
}
