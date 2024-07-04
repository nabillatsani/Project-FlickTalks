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
            display: flex;
            flex-direction: column;
        }
        .poster {
        background-color: #1f2937;
        width: 255px;
        height: 390px;
        border-radius: 10px;
        margin-bottom: 10px;
        float: left;
        margin-right: 50px;
        overflow: hidden; 
        }
        .img {
        width: 100%;
        height: 100%;
        border-radius: 10px; 
        object-fit: cover; 
        }
        .left {
            width: 23%;
            height: 450px;
            float: left;
            border-radius: 10px;
            margin-right: 20px;
        }
        .right {
            width: 66%;
            height: 458px;
            float: left;
            border-radius: 10px;
            background-color: #1f2937;
            padding: 10px;
        }
        .title {
            height: 30px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .review {
            height: 340px;
            overflow-y: scroll;
            padding: 0px;

        }
        .write {
            height: 70px;
            margin-top: 0px;
            display: flex;
            flex-direction: column;
        }
        .komen {
            width: 80%;
            height: 60px;
            border-radius: 20px;
            border: 1px solid white;
            background-color: #1f2937;
            order: -1;
        }
        .font-title {
            text-align: center;
            color: #47a2ed;
        }
        .kirim {
            float: right;
            height: 70px;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center; /* Memastikan konten vertikal tengah */
            justify-content: center; /* Memastikan konten horizontal tengah */
        }
        .btn {
            background-color: #47a2ed;;
            border: 1px solid #fff;
            color: #fff;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            border-radius: 20px;
            transition: background-color 0.3s, transform 0.3s;
            width: 120px;
            height: 30px;
            padding: 0;
            margin: 0;
        }
        .btn:hover {
            background-color: white;
            color: #47a2ed;
            transform: scale(1.05);
        }
        .btn2 {
            background-color: #47a2ed;;
            border: 1px solid #fff;
            color: #fff;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            border-radius: 20px;
            transition: background-color 0.3s, transform 0.3s;
            padding-left: 20px;
            padding-right: 20px;
            padding-bottom: 10px;
            padding-top: 10px;
        }
        .btn2:hover {
            background-color: white;
            color: #47a2ed;
            transform: scale(1.05);
            text-decoration: none;
        }
        .rating {
            unicode-bidi: bidi-override;
            direction: rtl;
            font-size: 30px;
            display: inline-block;
            padding: 0;
            margin: 0;
        }

        .rating input {
            display: none;
        }

        .rating label {
            float: right;
            cursor: pointer;
            color: #ccc;
        }

        .rating label:before {
            content: '\2605'; /* Bintang kosong */
            margin: 3px;
        }

        .rating input:checked ~ label,
        .rating label:hover,
        .rating label:hover ~ label {
            color: #ffcc00; /* Warna bintang saat diisi atau dihover */
        }

        .rating .star {
            color: #ccc; /* Warna bintang yang belum diisi */
        }
        .star{
            font-size: 20px;
        }
        .star-half {
            position: relative;
            display: inline-block;
        }

        .star-half::before {
            content: '\2605'; /* Bintang penuh */
            position: absolute;
            color: #ffcc00;
            width: 50%;
            overflow: hidden;
        }

        .star-half::after {
            content: '\2605'; /* Bintang penuh */
            color: #ccc; /* Warna bintang kosong */
            width: 50%;
            overflow: hidden;
        }
        .star1{
            font-size: 40px;
        }
        .star1-half {
            position: relative;
            display: inline-block;
        }

        .star1-half::before {
            content: '\2605'; /* Bintang penuh */
            position: absolute;
            color: #ffcc00;
            width: 50%;
            overflow: hidden;
        }

        .star1-half::after {
            content: '\2605'; /* Bintang penuh */
            color: #ccc; /* Warna bintang kosong */
            width: 50%;
            overflow: hidden;
        }
        .kontainer{
            margin-left: 80px;
            margin-right: 80px;
            margin-bottom: 80px;
        }
    </style>
     <script>
        function checkLogin(event) {
            @if(!Auth::check())
                event.preventDefault();
                alert('Please login to submit a review.');
                window.location.href = '{{ route('login') }}';
            @endif
        }
    </script>
</head>
<body>
    @if ($movie)
    <div class="left">

    <div class="poster">
        <img src="{{ asset('/storage/movie/'.$movie->image) }}" class="card-img-top img-sett" alt="{{ $movie->title }}">
    </div>
        @php
            $fullStars = floor($movie->rating); // Bintang penuh berdasarkan rating
            $halfStar = $movie->rating - $fullStars; // Bagian pecahan dari bintang
            $emptyStars = 5 - $fullStars - ceil($halfStar); // Bintang kosong
        @endphp
        <h2>{{ $movie->rating }}
        @for ($i = 0; $i < $fullStars; $i++)
            <span class="star1" style="color: #ffcc00;">&#9733;</span>
        @endfor

        @if ($halfStar > 0)
            <span class="star1-half"></span>
        @endif

        @for ($i = 0; $i < $emptyStars; $i++)
            <span class="star1">&#9733;</span>
        @endfor 
    </div> 
    </div>
    <div class="right">
        <div class="title"><h4 class="font-title">{{ $movie->title }}</h4></div>
        <div class="review">
            @forelse ($review as $review)
                <div class="review-item">
                @foreach ($review->user()->get() as $user)
                        <h8 style="color:#47a2ed; padding:0px; margin:0px">{{ $user->name}} @endforeach</h8> 
                                @for ($i = 0; $i < floor($review->rating); $i++)
                            <span class="star" style="color: #ffcc00;">&#9733;</span>
                        @endfor
                        @if ($review->rating - floor($review->rating) > 0)
                            <span class="star-half"></span>
                        @endif
                        @for ($i = floor($review->rating) + ceil($review->rating - floor($review->rating)); $i < 5; $i++)
                            <span class="star">&#9733;</span>
                        @endfor <br>
                                 <p style="text-align: justify; margin-right: 10px;">{{ $review->review }}</p>
                </div>
            @empty
                No reviews yet.
            @endforelse
        </div>
        <div class="write">
        <form action="{{ route('review.store', $movie->id) }}" method="POST" onsubmit="checkLogin(event)">
                @csrf
    <input type="text" name="review" class="komen" placeholder="Write your comments here!"></input>
    <div class="kirim" style="margin: 0; padding: 0;">
    <div class="rating" style="display: inline-block;">
            <input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
            <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
            <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
            <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
            <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
        </div>
    <button type="submit" class="btn" >Upload</button>
</div>
</form>

        </div>
    </div>
    
</div>
<div class="kontainer">
<p>This Movie was Released in {{$movie->release_year}}</hp> 
<h5>Movie Sysnopsis :</h5>
<p style="text-align:justify; color:grey;">{{$movie->description}}</p>
<a href="{{ route('user_movie') }}" class="btn2">Back</a><br>
</div>
@else
    <p class="text-center">No movie found.</p>
    @endif
</body>
</html>
@endsection