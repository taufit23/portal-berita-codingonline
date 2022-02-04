<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;
    protected $table = 'playlist';
    protected $guarded = [];
    protected $hidded = [];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function materi()
    {
        return $this->hasMany(Materi::class);
    }
}