<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)    
    {
        
    $search = $request->input('search');
    // Query dasar untuk film, diurutkan berdasarkan tahun rilis secara descending
    $query = Movie::orderBy('release_year', 'desc');

    // Jika ada parameter pencarian, tambahkan kondisi WHERE
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('title', 'LIKE', '%' . $search . '%');
        });
    }
    $movie = $query->get();
        return view('user/user_movie', ['movie' => $movie]);
    }

    public function create(): View
    {
        return view('create_movie');
    }

   public function store(Request $request): RedirectResponse
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,jpg,png',
        'title' => 'required|min:5',
        'description' => 'required|min:10',
        'release_year' => 'required|numeric',
        'rating' => 'required|numeric'
    ]);

    $image = $request->file('image');
    $image->storeAs('public/movie', $image->hashName());

    $movie = Movie::create([
        'image' => $image->hashName(),
        'title' => $request->title,
        'description' => $request->description,
        'release_year' => $request->release_year,
        'rating' => $request->rating
    ]);

    // Redirect ke halaman detail movie
    return redirect()->route('user_movie')->with(['success' => 'Data Berhasil Disimpan!']);
}
public function review(): View
    {
        $review = Review::with('user', 'movie')->where('id_akun', Auth::id())->get();
        return view('user/user_review', ['review' => $review]);
    }
    public function destroy($id_review): RedirectResponse
    {
        $review = Review::findorFail($id_review);

        $review->delete();

        return redirect()->route('user_review')->with('success', 'Review berhasil dihapus');    
    }
}
