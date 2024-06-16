<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'comment'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function videogames()
    {
        return $this->belongsTo(Videogame::class);
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }
}
