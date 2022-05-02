<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PerformanceProjet extends Model
{
    use HasFactory;

    protected $table = "performance_projet";

    protected $fillable = ['projet_id','performance_id','statut'];

    public $timestamps = false;
    
}
