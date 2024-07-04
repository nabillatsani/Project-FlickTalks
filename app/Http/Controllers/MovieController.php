<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');
    // Query dasar untuk film, diurutkan berdasarkan tahun rilis secara descending
    $query = Movie::orderBy('release_year', 'desc');

    // Jika ada parameter pencarian, tambahkan kondisi WHERE
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('title', 'LIKE', '%' . $search . '%')
              ->orWhere('rating', 'LIKE', '%' . $search . '%')
              ->orWhere('release_year', 'LIKE', '%' . $search . '%');
        });
    }

    // Ambil data film dengan paginasi
    $movie = $query->paginate(10);

    return view('movie', ['movie' => $movie]);
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
    ]);

    $image = $request->file('image');
    $image->storeAs('public/movie', $image->hashName());

    $movie = Movie::create([
        'image' => $image->hashName(),
        'title' => $request->title,
        'description' => $request->description,
        'release_year' => $request->release_year,
        'rating' => null,
    ]);

    // Redirect ke halaman detail movie
    return redirect()->route('movie')->with(['success' => 'Data Berhasil Disimpan!']);
}
public function show(string $id): View{
    $movie = Movie::findOrFail($id);
    return view ('show_movie', compact('movie'));
}
public function edit(string $id): View{
    $movie=Movie::findOrFail($id);
    return view('edit_movie',compact ('movie'));
}
public function update(Request $request, $id): RedirectResponse
{
    $request->validate([
        'title' => 'required|min:5',
        'description' => 'required|min:10',
        'release_year' => 'required|numeric',
    ]);

    $movie = Movie::findOrFail($id);

    // Jika ada file gambar baru diunggah, simpan gambar baru
    if ($request->hasFile('image')) {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png'
        ]);

        // Hapus gambar lama jika ada
        if ($movie->image) {
            Storage::delete('public/movie/' . $movie->image);
        }

        // Simpan gambar baru
        $image = $request->file('image');
        $image->storeAs('public/movie', $image->hashName());

        // Update nama gambar di database
        $movie->image = $image->hashName();
    }

    // Update data lainnya
    $movie->title = $request->title;
    $movie->description = $request->description;
    $movie->release_year = $request->release_year;
    $movie->save();

    // Hitung ulang rata-rata rating berdasarkan review yang ada
    $averageRating = Review::where('movie', $movie->id)->avg('rating');

    // Jika tidak ada review yang diberikan, rating tetap NULL
    $movie->rating = $averageRating;

    $movie->save();

    return redirect()->route('movie')->with(['success' => 'Data Berhasil Diubah!']);
}

public function destroy($id): RedirectResponse
{
    $movie = Movie::findOrFail($id);

    Storage::delete('public/movie/'. $movie->image);

    $movie->delete();

    return redirect()->route('movie')->with(['success' => 'Data Berhasil Dihapus!']);
}
public function review($title)
{
    $movie = Movie::where('title', $title)->first(); // Mengambil film berdasarkan judul

    if (!$movie) {
        // Jika film tidak ditemukan, arahkan kembali ke halaman sebelumnya dengan pesan error
        return redirect()->back()->with('error', 'Film tidak ditemukan.');
    }

 $review = $movie->review()->with('user')->get();
    return view('user/insert_review', compact('movie', 'review'));
}
public function getAverageRatings()
    {
        // Ambil data movie dengan rata-rata rating
        $ratings = Movie::with('reviews')
                        ->get()
                        ->map(function ($movie) {
                            return [
                                'title' => $movie->title,
                                'avg_rating' => $movie->reviews->avg('rating')
                            ];
                        });

        return response()->json($ratings);
    }

}

