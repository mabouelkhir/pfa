<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Projet;
use App\Model\Point;

class Performance extends Model
{
    use HasFactory;
    protected $fillable = ["nom_performance"];
    /**
     * The performances that belong to the projet.
     */
    public function projets()
    {
        return $this->belongsToMany(Projet::class, 'performance_projet');
    }
    public function points()
    {
        return $this->belongsToMany(Point::class, 'performance_point');
    }

   
}
