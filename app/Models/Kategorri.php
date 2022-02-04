<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategorri extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $guarded = [];
    protected $hidded = [];
    public function artikel()
    {
        return $this->hasOne(Artikel::class);
    }
}