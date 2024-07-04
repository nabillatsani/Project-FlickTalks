@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flicktalks</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background-color: black;
            color: white;
        }        
        .kontainer{
            background-color: pink;
            color:red;
            height: 100%;
            weight: 100%;
            margin-top: -48px;
            margin-left: -80px;
            margin-right: -76px;
        }
        .overlay {
            position: absolute; /* Menggunakan posisi absolut */
            top: 50%; /* Menempatkan di tengah-tengah vertikal */
            left: 50%; /* Menempatkan di tengah-tengah horizontal */
            transform: translate(-50%, -50%); /* Untuk menggeser ke tengah */
            text-align: center; /* Pusatkan teks */
            color: white; /* Warna teks putih agar kontras dengan latar belakang */
            font-size: 3rem; /* Ukuran font teks */
            font-weight: bold; /* Tebal teks */
        }
        .introduce {
    text-align: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    margin-top: 50px;
    text-align: justify;
    }
    .features {
    text-align: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    margin-top: 50px;
    }

.feature-container {
    display: flex;
    justify-content: space-around;
    margin-top: 30px;
    flex-wrap: nowrap;
}

.feature {
    background-color: #1f2937;
    color: white;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    flex: 1;
    margin: 10px;
    padding: 20px;
    text-align: left;
    max-width: 30%;
    box-sizing: border-box;
}

.feature h5 {
    margin-top: 0;
    color: #47a2ed;
}

.feature p {
    color: white;
}
h2{
    text-align: center;
    margin-bottom: 25px;
}
.image-container {
    display: flex;
    margin-top: 10px;
    align-items: center;
    justify-content: center; /* Mengatur konten di tengah secara horizontal */
}
.image-container img {
    margin: 30px; /* Mengatur jarak antara gambar */
    width: 70px;
}
.team-container {
    display: flex;
    justify-content: center; /* Mengatur konten di tengah secara horizontal */
    margin: 40px;
    gap: 10px; /* Jarak antar team-member */
}

.team-member {
    text-align: center; /* Mengatur teks di tengah */
}

.team-member img {
    width: 200px; /* Mengatur lebar gambar */
    height: auto; /* Memastikan proporsi gambar tetap terjaga */
    margin: 30px;
    border-radius: 100px;
}
.name{
    font-size: 20px;
    color: white;
}
    </style>
</head>
<body>
    <div class="kontainer">
    <img src="/storage/images/bg-about.PNG" alt="Gambar 1">
    <div class="overlay">
            <p>About FlickTalks</p>
        </div>
    </div>
    <div class="introduce">
    <h2>What is FlickTalks?</h2>
    FlickTalks is an online platform dedicated to movie lovers throughout Indonesia. 
    Here, you can find in-depth reviews of the latest movies, see opinions from different points of view, 
    and contribute to your reviews. FlickTalks understands that watching movies is not just about entertainment, 
    but is also an experience of sharing and discussing with a community that has the same interests. 
    With our interactive features, you can explore movies, get recommendations, and connect with people who have 
    similar interests in the world of movie. Join FlickTalks to make your movie watching experience more meaningful 
    and connect with a dynamic global community.<br><br><br><br><br>
    <h2>Why FlickTalks?</h2>

    <div class="image-container">
    <img src="/storage/images/g1.PNG" alt="Gambar 1"> Up-to-date
    <img src="/storage/images/g2.JPG" alt="Gambar 1"> Active Community
    <img src="/storage/images/g3.PNG" alt="Gambar 1"> Multiple Perspectives
    <img src="/storage/images/g4.PNG" alt="Gambar 1"> Easy to use
</div>
</div>
    <div class="features">
        <h2>What can we do at Flick Talks?</h2>
        <div class="feature-container">
            <div class="feature">
                <h5>Lineup of Movies</h5>
                <p>On FlickTalk we can find out what movies have just been released, as well as movies that are popular and currently being talked about</p>
            </div>
            <div class="feature">
                <h5>People's Opinions</h5>
                <p>On FlickTalks, we can see people's opinions about a movie, we can see what rating people give to the movie</p>
            </div>
            <div class="feature">
                <h5>Give an Opinion on a Movie</h5>
                <p>On FlickTalks we can give our opinion about a movie, we will provide a rating in the form of stars and also comments on the movie</p>
            </div>
        </div>
        <br><br><br><br><br>
        <h2 style="color:#47a2ed">Our Team</h2>
        <div class="team-container">
    <div class="team-member">
        <img src="/storage/images/billa.JPG" alt="Gambar 1">
        <p class="name">Nabilla Tsani Ayasi</p>
    </div>
    <div class="team-member">
        <img src="/storage/images/bertha.JPG" alt="Gambar 2">
        <p class="name">Claresta Berthalita J.</p>
    </div>
</div>

    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

@endsection