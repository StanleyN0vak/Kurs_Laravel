<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    /**
     * Kategoria jest przypisana do wielu filmow
     */
    public function videos() {
        return $this->belongsToMany('App\Models\Video')->withTimestamps();
    }
}
