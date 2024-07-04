@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Flicktalks Dashboard</title>

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #000000;
      color: #e0e0e0;
    }

    h3 {
      font-size: 2.5rem;
      margin-top: 60px;
      margin-bottom: 70px;
      color: #47a2ed;
      text-align: center;
    }
    .title {
    margin-bottom: 20px;
    width: 170px;
    text-align: center;
    display: block; /* Tambahkan ini jika elemen inline */
    }

    .card {
      width: 18rem;
      margin-bottom: 80px;
      margin-right: 10px;
      margin-left: 10px;
      margin-top: 15px;
      border-radius: 10px;
      width: 170px;
      height: 250px;
      background-color: #1f2937;
      transition: transform 0.2s;    
    }
    .card:hover {
      transform: translateY(-20px);    
    }
    .card-img-top {
    }
    .move-left-right {
      display: inline-block;
      animation: moveLeftRight 1s ease-in-out infinite alternate;
    }
    .move-right-left {
      display: inline-block;
      animation: moveRightLeft 1s ease-in-out infinite alternate;
    }
    .img-sett{
      width: 18rem;
      border-radius: 10px;
      width: 170px;
      height: 250px;
    }
    @keyframes moveLeftRight {
      from {
        transform: translateX(0);
      }
      to {
        transform: translateX(-20px);
      }
    }
    @keyframes moveRightLeft {
      from {
        transform: translateX(0);
      }
      to {
        transform: translateX(20px);
      }
    }
    .search{
      border-radius: 20px;
      width: 350px;
      margin-right: 10px;
      color: black;
    }
    .btn-search{
      width: 8%;
      padding: 8px;
      background: #47a2ed;
      color: black;
      border-radius: 20px;
      cursor: pointer;
    }
    .btn-search:hover{
      background: #1f2937;
      color: white;
    }
  </style>
</head>
<body>
    <h3><span class="move-left-right">>></span> MOVIES <span class="move-right-left"><<</span></h3>
    <form action="{{ route('user_movie') }}" method="GET" class="form-inline mb-3">
        <input type="text" class="search" id="search" name="search" placeholder="Search by title"
            value="{{ Request::get('search') }}">
        <button type="submit" class="btn-search">Search</button>
    </form>
    <div class="row" id="movie-table-body">
        @forelse ($movie as $movie)
        
        <div>
            <div class="card">
                <a href="{{ route('movie.review', ['movie' => $movie->title]) }}">
                    <img src="{{ asset('/storage/movie/'.$movie->image) }}" class="card-img-top img-sett" alt="{{ $movie->title }}">
                </a>
                <p class="title">{{ $movie->title }}</p>
            </div>
        </div>
        @empty
        <p class="text-center">No movies available.</p>
        @endforelse
    </div>

</body>
@section('scripts')
<script>
    // Fungsi untuk menangani perubahan nilai pada input pencarian
    function handleSearchInput(event) {
        event.preventDefault();
        let searchValue = document.getElementById('search').value.trim();

        // Lakukan request AJAX jika nilai pencarian tidak kosong
        if (searchValue !== '') {
            fetch('{{ route('user_movie') }}?search=' + encodeURIComponent(searchValue))
                .then(response => response.text())
                .then(data => {
                    // Update bagian tabel dengan hasil pencarian yang diperbarui
                    document.getElementById('movie-table-body').innerHTML = data;
                })  
                .catch(error => console.error('Error:', error));
        } else {
            // Jika nilai pencarian kosong, tampilkan kembali data asli (semua data)
            fetch('{{ route('user_movie') }}')
                .then(response => response.text())
                .then(data => {
                    // Update bagian tabel dengan data asli
                    document.getElementById('movie-table-body').innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        }
    }

    // Menambahkan event listener untuk form pencarian
    document.getElementById('search').addEventListener('input', handleSearchInput);
</script>
@endsection

</html>
@endsection