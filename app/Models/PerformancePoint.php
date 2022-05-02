<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformancePoint extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = "performance_point";

    protected $fillable = ['point_id','performance_id','statut'];

    public $timestamps = false;
}
