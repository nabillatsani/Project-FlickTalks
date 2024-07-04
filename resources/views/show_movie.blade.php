@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background: black; /* Mengubah latar belakang menjadi hitam */
        color: white; /* Mengubah warna teks menjadi putih */
    }
    .card-body{
        background: #1f2937;
        color: white;
    }
    .card-body1{
        background: transparent;
    }
    h3 {
        font-size: 2rem;
        margin-bottom: 10px;
        color: #47a2ed;
    }
    .star1{
            font-size: 30px;
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
    </style>
</head>
<body>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div>
                    <div class="card-body1">
                        <img src="{{ asset('/storage/movie/'.$movie->image) }}"  style="width: 340px;">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>{{ $movie->title }}</h3>
                    <div>
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
                        <p>Release : {{ $movie->release_year }}</p>
                        <hr/>
                        <p style="text-align: justify;">{!! $movie->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>