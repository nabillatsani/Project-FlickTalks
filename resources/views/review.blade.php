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
        color: #fff; /* Mengubah warna teks menjadi putih */
        border-collapse: collapse; /* Ensure no borders are shown */
        text-align: center;
        border-radius: 10px;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border: none; /* Remove all borders */
        border-bottom: 4px solid #000; /* Tambahkan border bottom pada bordered table */
    }

    .table thead th {
        vertical-align: bottom;
        border: none; /* Remove all borders */
        color: #47a2ed; /* Change the color of thead text */
    }

    .table tbody + tbody {
        border-top: none; /* Remove all borders */
    }

    .table .table {
        background-color: #fff;
    }

    .table-bordered {
        border: none; /* Remove all borders */
    }

    .table-bordered th,
    .table-bordered td {
        border: none; /* Remove all borders */
        border-bottom: 4px solid #000; /* Tambahkan border bottom saja */

    }

    .table-bordered thead th,
    .table-bordered thead td {
        border-bottom-width: none;
        border: none; /* Remove all borders */
        border-bottom: 4px solid #000; /* Tambahkan border bottom saja */
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }


    /* Specific CSS for IMAGE column */
    .table th.image-column,
    .table td.image-column {
        width: 80px; /* Adjust the width as needed */
    }

    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">See the Latest Reviews</h3>
                <hr>
            </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">USERNAME</th>
                                <th scope="col">REVIEW</th>
                                <th scope="col">RATING</th>
                                <th scope="col">MOVIE</th>
                                <th scope="col" style="width: 20%">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($review as $review)
                            <tr>
                            @foreach ($review->user()->get() as $user)
                                <td>{{ $user->name}}</td>
                                @endforeach
                                <td>{{ $review->review }}</td>
                                <td>{{ $review->rating }}</td>
                                @foreach ($review->movie()->get() as $movie)
                                <td>{{ $movie->title}}</td>
                                @endforeach 
                                <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('review.destroy', ['review' => $review->id_review]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
</body>
</html>

@endsection