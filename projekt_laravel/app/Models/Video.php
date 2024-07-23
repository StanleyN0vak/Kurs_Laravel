<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'url',
        'description'
    ];

    /**
     * Film ma swojego autora
     */

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Film ma wiele kategorii
     */
    public function categories(){
        return $this->belongsToMany('App\Models\Category')->withTimestamps();
    }

    /**
     * Lista Id kategorii dla filmu
     */
    public function getCategoryListAttribute() {
        return $this->categories->pluck('id')->all();
    }
}
