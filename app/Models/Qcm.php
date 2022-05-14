<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Point;
use App\Models\Proposition;
class Qcm extends Model
{
    use HasFactory;
    protected $fillable=['nom_qcm','point_id','description','nom_performance','auteur','statut','amorce'];
    public function point()
    {
        return $this->belongsTo(Point::class);
    }
    public function propositions()
    {
        return $this->hasMany(Proposition::class);
    }
}

