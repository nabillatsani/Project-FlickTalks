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
        margin-bottom: 50px;
        color: #47a2ed;
    }
    .container {
        margin-bottom: 20px;
    }
    .box {
        background: #1f2937;
        margin: 20px auto; /* This centers the box */
        padding: 10px;
        width: 70%;
        border-radius: 20px;
        display: flex;
        align-items: center; /* Center items vertically */
    }
    .card {
        margin-right: 10px;
        border-radius: 10px;
        width: 170px;
        height: 250px;
        background-color: #1f2937;
    }
    .card img {
        width: 170px;
        height: 250px;
        object-fit: cover;
        border-radius: 10px;
    }
    .desc {
        padding: 10px;
        flex-grow: 1; /* Take remaining space */
        width: 100px;
    }
    .rating .star {
        color: #ffcc00; /* Color for filled stars */
    }
    .rating .empty-star {
        color: #ccc; /* Color for empty stars */
    }
    .star {
        font-size: 20px;
    }
    .star-half {
        font-size: 20px;
        color: #ffcc00;
        position: relative;
        display: inline-block;
    }
    .star-half::after {
        content: '\2605'; /* Full star */
        position: absolute;
        left: 0;
        color: #ccc; /* Empty star color */
        width: 50%;
        overflow: hidden;
    }
    .btn-del{
        background: red;
        padding: 5px;
        margin: 10px;
        border-radius: 20px;
        width: 80px;
    }
    .btn-del:hover{
        background: white;
        text-decoration: none;
        color:red;
    }
    .btn-up{
        background: #47a2ed;
        padding: 5px;
        border-radius: 20px;
        width: 80px;
        height: 34px;
        color: white;
        margin-top: 10px;
        text-align: center;
    }
    .btn-up:hover{
        background: white;
        text-decoration: none;
        color: #47a2ed;
    }
    </style>
</head>
<body>
    <h3 class="text-center">All Reviews From You</h3>
<div class="container">
    @foreach ($review as $review)
    <div class="box">
        @foreach ($review->user()->get() as $user)
        @endforeach
        @foreach ($review->movie()->get() as $movie)
        <div class="card">
            <img src="{{ asset('/storage/movie/'.$movie->image) }}" alt="{{ $movie->title }}">
        </div>
        <div class="desc">
            <h5>{{ $movie->title }}</h5>
        @endforeach
            <div class="rating">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $review->rating)
                        <span class="star">&#9733;</span>
                    @elseif ($i == ceil($review->rating) && $review->rating - floor($review->rating) > 0)
                        <span class="star-half">&#9733;</span>
                    @else
                        <span class="star empty-star">&#9733;</span>
                    @endif
                @endfor
            </div>
            <p style="text-align: justify;">{{ $review->review }}</p>
            <div class="btn-group" role="group">
                <a href="{{ route('review.edit', ['review' => $review->id_review]) }}" class="btn-up">Update</a>
                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('user_destroy', ['review' => $review->id_review]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-del">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
</body>
</html>
@endsection