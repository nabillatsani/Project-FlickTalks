@extends('layouts.app')

    @section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flicktalks Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #000000;
        color: #e0e0e0;
    }
    h3 {
        font-size: 2.5rem;
        margin-bottom: 10px;
        color: #47a2ed;
    }
    .table {
        width: 100%;
        margin-bottom: 1rem;
        background-color: #1f2937;
        color: #fff;
        border-collapse: collapse;
        text-align: center;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        border: none;
        border-bottom: 4px solid #000;
        text-align: center; /* Horizontal alignment */
        vertical-align: middle;
    }

    .table thead th {
        vertical-align: bottom;
        border: none;
        color: #47a2ed;
    }

    .table tbody + tbody {
        border-top: none;
    }

    .table .table {
        background-color: #fff;
    }

    .table-bordered {
        border: none;
    }

    .table-bordered th,
    .table-bordered td {
        border: none;
        border-bottom: 4px solid #000;
    }

    .table-bordered thead th,
    .table-bordered thead td {
        border-bottom-width: none;
        border: none;
        border-bottom: 4px solid #000;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .table-primary,
    .table-primary > th,
    .table-primary > td {
        background-color: #b8daff;
    }

    .table-hover .table-primary:hover {
        background-color: #9fcdff;
    }

    .btn-add {
        border-radius: 20px;
        padding: 10px;
    }

    .table th.image-column,
    .table td.image-column {
        width: 150px;
    }
    .table th.rating-column,
    .table td.rating-column {
        width: 20px;
    }
    .btn-edit {
        margin-top: 4px;
        margin-bottom: 4px;
        background-color: #e8ac04;
        border-radius: 20px;
    }
    .btn-show {
        background-color: #47a2ed;
        border-radius: 20px;
    }
    .btn-show:hover {
        background-color: white;
        color: blue;
    }
    .btn-delete {
        border-radius: 20px;
    }
    .btn-delete:hover {
        background-color: white;
        color: red;
    }
    .btn-edit:hover {
        background-color: white;
        color: #e8ac04;
    }
    .search{
      border-radius: 20px;
      width: 300px;
      margin-right: 10px;
      color: black;
    }
    .btn-search{
      width: 17%;
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
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">SET MOVIES</h3>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <a href="{{ route('movie.create') }}" class="btn btn-md btn-success btn-add">+ ADD MOVIE</a>
                    <form action="{{ route('movie') }}" method="GET" class="form-inline d-flex">
                        <input type="text" class="search" id="search" name="search" placeholder="Search by title, rating, or year" value="{{ Request::get('search') }}">
                        <button type="submit" class="btn-search">Search</button>
                    </form>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" class="image-column">IMAGE</th>
                            <th scope="col">TITLE</th>
                            <th scope="col">RELEASE</th>
                            <th scope="col">RATING</th>
                            <th scope="col" class="actions-column">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody id="movie-table-body" class="text-align: justify;">
                        @forelse ($movie as $movie)
                            <tr>
                                <td class="text-center image-column">
                                    <img src="{{ asset('/storage/movie/'.$movie->image) }}" alt="{{ $movie->title }}">
                                </td>
                                <td>{{ $movie->title }}</td>
                                <td>{{ $movie->release_year }}</td>
                                <td>{{ $movie->rating }}</td>
                                <td class="text-center actions-column">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('movie.destroy', ['movie' => $movie->id]) }}" method="POST">
                                        <a href="{{ route('movie.show', ['movie' => $movie->id]) }}" class="btn btn-sm btn-show">Show</a><br>
                                        <a href="{{ route('movie.edit', ['movie' => $movie->id]) }}" class="btn btn-sm btn-edit">Update</a><br>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger btn-delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    <div class="alert alert-danger">
                                        Data Movie belum Tersedia.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

@section('scripts')
<script>
    // Fungsi untuk menangani perubahan nilai pada input pencarian
    function handleSearchInput() {
        let searchValue = document.getElementById('search').value.trim();

        // Lakukan request AJAX jika nilai pencarian tidak kosong
        if (searchValue !== '') {
            fetch('{{ route('movie') }}?search=' + encodeURIComponent(searchValue))
                .then(response => response.text())
                .then(data => {
                    // Update bagian tabel dengan hasil pencarian yang diperbarui
                    document.getElementById('movie-table-body').innerHTML = data;
                })  
                .catch(error => console.error('Error:', error));
        } else {
            // Jika nilai pencarian kosong, tampilkan kembali data asli (semua data)
            fetch('{{ route('movie') }}')
                .then(response => response.text())
                .then(data => {
                    // Update bagian tabel dengan data asli
                    document.getElementById('movie-table-body').innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        }
    }

    // Menambahkan event listener untuk input pencarian
    document.getElementById('search').addEventListener('input', handleSearchInput);
</script>
@endsection

</html>
@endsection