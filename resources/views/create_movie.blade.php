<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Movie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background: black; /* Mengubah latar belakang menjadi hitam */
        color: white; /* Mengubah warna teks menjadi putih */
    }
    h3 {
        font-size: 2rem;
        margin-bottom: 10px;
        color: #47a2ed;
    }
    .question{
        color: white;
    }
    .custom-container {
        width: 70%; /* Mengatur lebar kontainer menjadi 70% dari lebar layar */
        margin: auto; /* Memposisikan kontainer di tengah halaman */
        margin-top: 18px;
    }
    .btn-save {
        background-color: #47a2ed;
        border-radius: 20px;
        width: 80px;
        padding: 8px;
    }
    .btn-save:hover {
        background-color: white;
        color: blue;
    }
    .btn-res {
        background-color: red;
        border-radius: 20px;
        width: 80px;
        padding: 8px;
        color: white;
    }
    .btn-res:hover {
        background-color: white;
        color: red;
    }
    </style>
</head>
<body>

    <div class="custom-container"> <!-- Menambahkan kelas custom-container -->
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body" style="background-color: #1f2937;"> <!-- Mengubah warna kotak menjadi #1f2937 -->
                        <form action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                            <h3 class="text-center my-4">ADD MOVIES</h3>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold question">IMAGE</label>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="image" style="background-color: #e3e1e1;" > <!-- Mengubah warna kotak input menjadi hitam -->
                            
                                <!-- error message untuk image -->
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold question">TITLE</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror fontcolor" name="title" value="{{ old('title') }}" placeholder="Enter the Movie Title (minimum 5 letters)" style="background-color: #e3e1e1;"> <!-- Mengubah warna kotak input menjadi hitam -->
                            
                                <!-- error message untuk title -->
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold question">DESCRIPTION</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" placeholder="Movie Description (minimum 10 letters)" style="background-color: #e3e1e1;"></textarea> <!-- Mengubah warna kotak input menjadi hitam -->
                            
                                <!-- error message untuk description -->
                                @error('description')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold question">RELEASE YEAR</label>
                                        <input type="text" class="form-control @error('release_year') is-invalid @enderror" name="release_year" value="{{ old('release_year') }}" placeholder="Enter the Movie Release Year. Example: 2024" style="background-color: #e3e1e1;"> <!-- Mengubah warna kotak input menjadi hitam -->
                                    </div>
                                </div>
                            </div>

                            <!-- tambahkan bagian lain dari form sesuai kebutuhan -->

                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-sm btn-save">SAVE</button>
                                </div>
                                <div class="col-md-6 text-end">
                                    <button type="reset" class="btn btn-sm btn-res">RESET</button>
                                </div>
                            </div>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>