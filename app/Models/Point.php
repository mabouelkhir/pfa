<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Section;
use App\Models\Qcm;
use App\Models\Performance;
class Point extends Model
{
    use HasFactory;
    protected $fillable=['nom_point','section_id'];
       /**
     * Get the post that owns the comment.
     *  
     * Syntax: return $this->belongsTo(Post::class, 'foreign_key', 'owner_key');
     *
     * Example: return $this->belongsTo(Post::class, 'post_id', 'id');
     * 
     */
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function performances()
    {
        return $this->belongsToMany(Performance::class, 'performance_point');
    }
    public function qcms()
    {
        return $this->hasMany(Qcm::class);
    }
}
