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
    <link href="https://fonts.googleapis.com/css2?family=Gorga+Grotesque:wght@400;700&display=swap" rel="stylesheet">
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
        h3 {
            font-size: 3rem;
            margin-bottom: 20px;
            margin-top: -25px;
            color: #47a2ed;
        }
        h2{
            color: #47a2ed;
            margin-bottom: 30px;
        }
        .welcome {
            font-size: 1.25rem;
            color: #e0e0e0;
        }
        .card-deck {
            margin-top: 30px;
            margin-bottom: 30px;
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
            transition: transform 0.2s;    
        }
        .card:hover {
        transform: translateY(-20px);    
        }
        .card-title {
            color: white;
            text-decoration: none;
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
            padding: 40px;
            border-radius: 10px;
            margin-top: 20px;
            width: 95%;
            margin-left: auto;
            margin-right: auto;
        }
        .diagram-container {
            background-color: #1f2937;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            width: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-top: 0px;
            margin-bottom: 120px;
            margin-left: 15px;
            margin-right: 15px;
        }
        .diagram-wrapper {
            display: flex;
            justify-content: space-between; /* atau justify-content: space-around; */
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
        .count{
            font-size: 8rem;
            margin-bottom: -50px;
            color: #47a2ed;
            font-family: 'Gorga Grotesque', sans-serif;
            font-weight: bold;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <div class="content">
            <h3><span class="move-up-down">FlickTalks</span></h3>
            <p class="welcome">Welcome {{ Auth::user()->name }}!</p>
        </div>
        <div class="diagram-wrapper">
            <div class="diagram-container">
                <canvas id="myChart" width="300" height="300"></canvas>
            </div>
            <div class="diagram-container">
            <canvas id="weeklyChart" width="300" height="300"></canvas>
            </div>
            <div class="diagram-container">
                <p class="count">{{ $movieCount }}</p><br>
                <p>Movies<br>Have Been Added!</p>
            </div>
        </div>            
        
        <h5>Select the menu below to help you in your work</h5>

        <div class="card-deck">
            <a href="#section1">
                <div class="card">
                    <img src="/storage/images/ToDo.PNG" class="card-img-top img-1" alt="Gambar 1">
                    <div class="card-body">
                        <h5 class="card-title">What To Do?</h5>
                    </div>
                </div>
            </a>
            <a href="#section2">
                <div class="card">
                    <img src="/storage/images/Manage.PNG" class="card-img-top img-2" alt="Gambar 2">
                    <div class="card-body">
                        <h5 class="card-title">How to Manage Data</h5>
                    </div>
                </div>
            </a>
            <a href="#section3">
                <div class="card">
                    <img src="/storage/images/compolicy.PNG" class="card-img-top img-3" alt="Gambar 3">
                    <div class="card-body">
                        <h5 class="card-title">Community Policy</h5>
                    </div>
                </div>
            </a>
            <a href="#section4">
                <div class="card">
                    <img src="/storage/images/Company.PNG" class="card-img-top img-4" alt="Gambar 4">
                    <div class="card-body">
                        <h5 class="card-title">About Flick Talks</h5>
                    </div>
                </div>
            </a>
        </div>
        <br><br><br><br><br>
        <div id="section1" class="box-content">
            <h2 style="text-align: left">What To Do?</h2>
            <p style="text-align: left"> 1. Add a New Film to the Database<br>
                2. Edit Film Data in Case of Data Changes<br>
                3. Monitor Reviews Given by Users<br>
                4. Delete Reviews if They Violate Rules for Everyone's Comfort</p><br>
            <p style="text-align: left">Conditions for Deleting Reviews:<br>
                1. If the review contains harsh language.<br>
                2. If the review is completely unrelated to the film being reviewed.<br>
                3. If the review touches on sensitive issues.</p>
        </div>
        <br><br><br><br><br>
        <div id="section2" class="box-content">
            <h2 style="text-align: left">How to Manage Data?</h2>
            <p style="text-align: justify; line-height: 2;" > 1. Data Entry : A brief guide to entering new data into the system with validation processes to ensure accuracy.<br>
                2. Data Editing : Steps to edit or update existing data, including policies to maintain data consistency post-editing.<br>
                3. Data Retrieval : Methods for retrieving data from the database for analysis or reporting using queries or appropriate search tools.<br>
                4. Data Deletion : Criteria for deleting irrelevant or no longer needed data with procedures compliant with privacy and security policies.<br>
                5. Data Backup and Recovery : Regular routines for creating data backups and procedures for data recovery in case of system loss or failure.<br>
                6. Data Security : Data security policies covering access controls and encryption technologies to safeguard sensitive information.<br>
                7. Data Maintenance : Routine processes to ensure data cleanliness and integrity, with team responsibilities for ongoing data quality maintenance.</p>
        </div>
        <br><br><br><br><br>
        <div id="section3" class="box-content">
            <h2 style="text-align: left">Community Policy for Staff</h2>
            <p style="text-align: justify; line-height: 2;"> 1. Professionalism : Act with a high level of professionalism in all interactions with team members and users. Respect the privacy and rights of others.<br>
                2. Team Collaboration : Contribute positively to the team and support each other in achieving common goals. Communicate openly, honestly, and respect the perspectives of other team members.<br>
                3. Data Security Policy : Adhere to the data security policy to protect user information and the interests of the platform. Take responsibility for managing and handling data according to established guidelines.<br>
                4. Conflict Resolution : Handle conflicts wisely and professionally, seeking mutually beneficial solutions for all parties involved. Report issues or discomfort promptly and follow established procedures.<br>
                5. Self-Development : Commit to learning and developing the necessary skills and knowledge. Utilize training and development opportunities to enhance performance and contribution.<br>
                6. Policy Enforcement : Respect and enforce this community policy among staff members. Take consistent actions against policy violations according to established procedures.</p>
        </div>
        <br><br><br><br><br>
        <div id="section4" class="box-content">
            <h2 style="text-align: left">About Flick Talks</h2>
            <p style="text-align: justify; line-height: 2;"> FlickTalks is an online platform dedicated to movie lovers throughout Indonesia. 
                Here, you can find in-depth reviews of the latest movies, see opinions from different points of view, 
                and contribute to your reviews. FlickTalks understands that watching movies is not just about entertainment, 
                but is also an experience of sharing and discussing with a community that has the same interests. 
                With our interactive features, you can explore movies, get recommendations, and connect with people who have 
                similar interests in the world of movie. Join FlickTalks to make your movie watching experience more meaningful 
                and connect with a dynamic global community.</p>
        </div>
        <br><br><br><br><br>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Data penjualan bulanan
        var reviewData = {
            Jan: 150,
            Feb: 120,
            Mar: 170,
            Apr: 160,
            May: 180,
            Jun: 140,
            Jul: 200,
            Aug: 190,
            Sep: 220,
            Oct: 210,
            Nov: 230,
            Dec: 240
        };

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Data Review (Monthly)',
                    data: [
                        reviewData.Jan, reviewData.Feb, reviewData.Mar, reviewData.Apr,
                        reviewData.May, reviewData.Jun, reviewData.Jul, reviewData.Aug,
                        reviewData.Sep, reviewData.Oct, reviewData.Nov, reviewData.Dec
                    ],
                    backgroundColor: 'rgba(71, 162, 237, 0.3)',
                    borderColor: 'rgba(2, 130, 235, 1)',
                    borderWidth: 1,
                    fill: true
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        // Data penjualan mingguan
        var weeklySalesData = {
            week1: 50,
            week2: 75,
            week3: 60,
            week4: 90,
        };

        var ctxWeekly = document.getElementById('weeklyChart').getContext('2d');
        var weeklyChart = new Chart(ctxWeekly, {
            type: 'bar',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [{
                    label: 'Data Review (Weekly)',
                    data: [
                        weeklySalesData.week1, weeklySalesData.week2, weeklySalesData.week3, weeklySalesData.week4
                    ],
                    backgroundColor: 'rgba(71, 162, 237, 1)', // Biru muda transparan
                    borderColor: 'rgba(71, 162, 237, 1)', // Biru
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
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
            slidesContainer.style.transform = translateX(${-slideIndex * 100}%);
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
