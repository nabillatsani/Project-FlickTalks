<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah data di tabel movies
        $movieCount = Movie::count();

        // Mengirimkan data ke view
        return view('dashboard', compact('movieCount'));
    }
}
