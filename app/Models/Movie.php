<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    public $timestamps = false;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'title',
        'description',
        'release_year',
        'rating',   
    ]; //belum dikasih relasi ke review
    public function review(){
        return $this->hasMany(Review::class, 'movie');
    }
}