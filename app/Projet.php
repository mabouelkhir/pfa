<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Chapitre;
use App\Models\Performance;
use App\Models\PerformanceProjet;
class Projet extends Model
{
    /**
     * Get the comments for the blog post.
     *   
     * Syntax: return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
     *
     * Example: return $this->hasMany(Comment::class, 'post_id', 'id');
     * 
     */
    public function chapitres()
    {
        return $this->hasMany(Chapitre::class);
    }


    public function performances()
    {
        return $this->belongsToMany(Performance::class, PerformanceProjet::class);
    }
     // "performance_projet" is table name
        // OR if we have model PerformaceProjet, then we can use class
        // instead of table name performance_projet
        //return $this->belongsToMany(Role::class, RoleUser::class);
}
