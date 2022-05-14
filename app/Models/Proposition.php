<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Qcm;

class Proposition extends Model
{
    use HasFactory;
    protected $fillable=['proposition','qcm_id','statut'];
    public function qcm()
    {
        return $this->belongsTo(Qcm::class);
    }
}
