<!-- resources/views/dashboard.blade.php -->

<x-app-layout>
    
    

@section('content')
                    @auth
                        @if(Auth::user()->role === 'Staff')
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
            background-color: #121212;
            color: #e0e0e0;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .content {
            padding: 30px;
            border-radius: 10px;
        }
        h1 {
            font-size: 5rem;
            margin-bottom: 20px;
            color: #47a2ed;
        }
        p {
            font-size: 1.25rem;
            color: #e0e0e0;
        }
        .card-deck {
            margin-top: 20px;
            width: 100%;
            justify-content: center;
            gap: 20px;
        }
        .card {
            background-color: #1f2937;
            border: none;
            border-radius: 10px;
            color: #e0e0e0;
            width: 180px;
            height: 250px;
        }
        .card-title {
            color: #47a2ed;
        }
        .move-up-down {
            display: inline-block;
            animation: moveUpDown 1s ease-in-out infinite alternate;
        }

        @keyframes moveUpDown {
            0% { transform: translateY(0); }
            100% { transform: translateY(-20px); }
        }
        .box-content {
            background-color: #1f2937;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            width: 95%;
            margin-left: auto;
            margin-right: auto;
        }
        .img-1{
            margin-top: 10px;
            margin-left: 9px;
            width: 160px;
        }
        .img-2{
            margin-top: 0px;
            margin-left: 9px;
            width: 160px;
        }
        .img-3{
            margin-top: 0px;
            margin-left: 5px;
            width: 170px;
        }
        .img-4{
            margin-top: 7px;
            margin-left: 10px;
            width: 160px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
        <h1><span class="move-up-down">FlickTalks</span></h1>
            <p>Welcome to the FlickTalks Staff page!<br>Please select the menu below to assist you with your work.</p>
        </div>
        <div class="card-deck">
        <a href="#section1">
            <div class="card">
            <img src="/storage/images/ToDo.PNG" class="card-img-top img-1" alt="Gambar 1">
                <div class="card-body">
                    <h5 class="card-title">What To Do?</h5>
                </div>
            </div></a>
            <a href="#section2">
            <div class="card">
                <img src="/storage/images/Manage.PNG" class="card-img-top img-2" alt="Gambar 2">
                <div class="card-body">
                    <h5 class="card-title">How to Manage Data</h5>
                </div>
            </div></a>
            <a href="#section3">
            <div class="card">
                <img src="/storage/images/Movie.PNG" class="card-img-top img-3" alt="Gambar 3">
                <div class="card-body">
                    <h5 class="card-title">Card 3</h5>
                </div>
            </div></a>
        <a href="#section4">
            <div class="card">
                <img src="/storage/images/Company.PNG" class="card-img-top img-4" alt="Gambar 4">
                <div class="card-body">
                    <h5 class="card-title">About Flick Talks</h5>
                </div>
            </div></a>
        </div>
        <br><br><br><br><br>
        <div id="section1" class="box-content">
            <h2>What To Do?</h2>
            <p>Konten untuk section 1.</p>
        </div>
        <br><br><br><br><br>
        <div id="section2" class="box-content">
            <h2>How to Manage Data?</h2>
            <p>Konten untuk section 2.</p>
        </div>
        <br><br><br><br><br>
        <div id="section3" class="box-content">
            <h2>sa</h2>
            <p>Konten untuk section 3.</p>
        </div>
        <br><br><br><br><br>
        <div id="section4" class="box-content">
            <h2>About Flick Talks</h2>
            <p>Konten untuk section 4.</p>
        </div>
        <br><br><br><br><br>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
                        @elseif(Auth::user()->role === 'User')
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
            margin-bottom: 100px;
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
        .card {
            background-color: transparent;
            color: white;
            margin: 10px 0;
        }
        .card img {

        }
        .card-body {
            text-align: left;
        }

    </style>
</head>
<body>
    <div class="content">
        <h1>FlickTalks</h1>
        <div class="counter" id="counter">0</div>
        <p>Review ada FlickTalks!</p>
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

    <h2>Popoular Movies</h2>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="/storage/images/poster_insideout2.jpg" class="card-img-top" alt="Movie Poster 1">
                        </div>
                    </div>
                    <div class="col-md-8 d-flex align-items-center">
                        <div>
                            <h4 class="card-title">Inside Out 2</h4>
                            <p class="card-text" style="text-align:justify"> Disney and Pixar’s “Inside Out 2” returns to the mind of newly minted teenager Riley just as headquarters is undergoing a sudden demolition to make room for something entirely unexpected: new Emotions! Joy, Sadness, Anger, Fear and Disgust, who’ve long been running a successful operation by all accounts, aren’t sure how to feel when Anxiety shows up. And it looks like she’s not alone.</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="/storage/images/poster_thefallguy.jpg" class="card-img-top" alt="Movie Poster 2">
                        </div>
                    </div>
                    <div class="col-md-8 d-flex align-items-center">
                        <div>
                            <h4 class="card-title">The Fall Guy</h4>
                            <p class="card-text" style="text-align:justify">The Fall Guy tells the story of a stuntman who experiences a serious accident and almost ends his career. This film stars several Oscar nominees such as Ryan Gosling (Colt Seavers) and Emily Blunt (Jody Moreno).</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="/storage/images/poster_kingdom.jpg" class="card-img-top" alt="Movie Poster 3">
                        </div>
                    </div>
                    <div class="col-md-8 d-flex align-items-center">
                        <div>
                            <h4 class="card-title">Kingdom of the Planet of the Apes</h4>
                            <p class="card-text" style="text-align:justify">Kingdom of the Planet of the Apes tells the world 300 years after the events in the film War of the Planet of the Apes. In this period, the monkeys led by Caesar and his descendants have succeeded in building an advanced technological and intelligence empire. However, under the ruthless and authoritarian rule of Proximus Caesar (Kevin Durand), conflict begins to arise.</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="/storage/images/poster_strangers.jpg" class="card-img-top" alt="Movie Poster 4">
                        </div>
                    </div>
                    <div class="col-md-8 d-flex align-items-center">
                        <div>
                            <h4 class="card-title">The STRANGERS : chapter 1</h4>
                            <p class="card-text" style="text-align:justify">It tells the story of Maya (Madelaine Petsch) and Ryan (Froy Gutierrez), a young couple who are passing through a small town that initially seems peaceful. They decided to stop and spend the night in a comfortable, remote cabin. The atmosphere turned tense when the two of them were terrorized by three masked strangers who attacked mercilessly and without motive.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
                        @endif
                    @else
                        <p>{{ __("You are not logged in!") }}</p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
