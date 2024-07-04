<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    public function index(): View
    {
        $review = Review::with('user', 'movie')->orderBy('created_at', 'desc')->get();        return view('review', ['review' => $review]);
    }public function destroy($id_review): RedirectResponse
    {
        $review = Review::findorFail($id_review);

        $review->delete();

        return redirect()->route('review')->with('success', 'Review berhasil dihapus');    }
        public function edit(string $id_review): View{
            $review=Review::findOrFail($id_review);
            return view('edit_review',compact ('review'));
        }
        
        // ReviewController.php

        public function update(Request $request, $id_review): RedirectResponse
        {
        $request->validate([
            'review' => 'required',
            'rating' => 'required',
        ]);
        
        $review = Review::findOrFail($id_review);
        // Update data lainnya
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->save();
        
        return redirect()->route('user_review')->with(['success' => 'Data Berhasil Diubah!']);
        }
        public function store(Request $request, $movie)
{
    $request->validate([
        'review' => 'required|string',
        'rating' => 'required|numeric|min:1|max:5',
    ]);

    Review::create([
        'review' => $request->review,
        'rating' => $request->rating,
        'id_akun' => Auth::id(),
        'movie' => $movie,
    ]);
 // Hitung rata-rata rating baru
 $averageRating = Review::where('movie', $movie)->avg('rating');

 // Update rating pada movie
 $movieModel = Movie::findOrFail($movie);
 $movieModel->rating = $averageRating;
 $movieModel->save();

    // Ambil data movie untuk ditampilkan kembali di halaman insert_review
    $movie = Movie::findOrFail($movie);
    $review = $movie->review()->with('user')->get();

    return redirect()->back()->with('success', 'Review berhasil ditambahkan!');
}
}        
