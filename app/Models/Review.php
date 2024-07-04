<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    use HasFactory;
    protected $table = 'review';
    protected $primaryKey = 'id_review';


    public $timestamps = true;

    protected $fillable = [
        'id_akun',
        'review',
        'rating',
        'movie',
    ];

    // Fungsi untuk mendapatkan data review dengan informasi pengguna dan judul film
    public function user(){
        return $this->belongsTo(User::class, 'id_akun');
    }
    public function movie(){
        return $this->belongsTo(Movie::class, 'movie');
    }
}
