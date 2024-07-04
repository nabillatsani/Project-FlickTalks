@extends('layouts.app')

@section('content')
<!DOCTYPE html>

<html lang="id">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlickTalks</title>
    <style>
        body {
            background: url('/storage/images/background.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            align-items: center;
            text-align: center;
        }

        .content {
            position: relative;
            z-index: 2;
            padding: 20px;
        }
        h1 {
            margin-top: 150px;
            font-size: 5rem;
            margin-bottom: 20px;
            color: white;
            animation: fadeIn 2s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-50px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .slider {
            position: relative;
            width: 100%;
            max-width: 900px;
            margin: 20px auto;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            margin-top: 200px;
        }
        .slides {
            display: flex;
            transition: transform 1s ease-in-out;
        }
        .slides img {
            width: 100%;
            height: auto;
        }
        .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: #fff;
            cursor: pointer;
            font-size: 24px;
            user-select: none;
            z-index: 3;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
            border-radius: 50%;
        }
        .arrow-left {
            left: 10px;
        }
        .arrow-right {
            right: 10px;
        }
        .counter {
            font-size: 48px;
            text-align: center;
            margin-top: 10px;
            animation: counterFadeIn 1s ease-in-out;
        }
        @keyframes counterFadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .btn-container {
            display: flex;
            gap: 20px;
            margin-top: 20px;
            justify-content: center;
        }
        .btn {
            background-color: transparent;
            border: 1px solid #fff;
            color: #fff;
            font-size: 16px;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            border-radius: 20px;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>FlickTalks</h1>
        <div class="counter" id="counter">0</div>
        <p>Review ada FlickTalks!<br>
        Masuk Sekarang juga dan berikan pendapatmu mengenai film yang sudah kamu tonton!</p>
        <div class="btn-container">
            <a href="{{ route('login') }}" class="btn">Log in</a>
            <a href="{{ route('register') }}" class="btn">Register</a>
        </div>
    </div>

    <div class="slider">
        <div class="slides">
            <img src="/storage/images/insideout2.JPG" alt="Gambar 1">
            <img src="/storage/images/thefallguy.JPG" alt="Gambar 2">
            <img src="/storage/images/kingdom.JPG" alt="Gambar 3">
            <img src="/storage/images/thes.JPG" alt="Gambar 4">
        </div>
        <span class="arrow arrow-left" onclick="plusSlides(-1)">❮</span>
        <span class="arrow arrow-right" onclick="plusSlides(1)">❯</span>
    </div>

    <script>
        let slideIndex = 0;
        const slides = document.querySelectorAll(".slides img");
        const totalSlides = slides.length;

        function showSlides(n) {
            slideIndex = (n + totalSlides) % totalSlides;
            const slidesContainer = document.querySelector('.slides');
            slidesContainer.style.transform = `translateX(${-slideIndex * 100}%)`;
        }

        function plusSlides(n) {
            showSlides(slideIndex + n);
        }

        document.addEventListener('DOMContentLoaded', () => {
            showSlides(slideIndex);

            setInterval(() => {
                plusSlides(1);
            }, 5000);
        });

        const counterElement = document.getElementById('counter');
        const finalCount = 20863;
        const duration = 3000;
        const frameRate = 30;
        const increment = finalCount / (duration / 1000 * frameRate);
        let currentCount = 0;

        function animateCounter() {
            const animation = setInterval(() => {
                currentCount += increment;
                counterElement.textContent = Math.floor(currentCount);

                if (currentCount >= finalCount) {
                    clearInterval(animation);
                    counterElement.textContent = finalCount;
                }
            }, 1000 / frameRate);
        }

        document.addEventListener('DOMContentLoaded', animateCounter);
    </script>
</body>
</html>
@endsection