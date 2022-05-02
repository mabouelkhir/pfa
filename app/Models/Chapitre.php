<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Projet;
use App\Models\Section;
class Chapitre extends Model
{
    use HasFactory;
    protected $fillable=['nom_chapitre','projet_id'];
     /**
     * Get the post that owns the comment.
     *  
     * Syntax: return $this->belongsTo(Post::class, 'foreign_key', 'owner_key');
     *
     * Example: return $this->belongsTo(Post::class, 'post_id', 'id');
     * 
     */
    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    /**
     * Get the comments for the blog post.
     *   
     * Syntax: return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
     *
     * Example: return $this->hasMany(Comment::class, 'post_id', 'id');
     * 
     */
    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
