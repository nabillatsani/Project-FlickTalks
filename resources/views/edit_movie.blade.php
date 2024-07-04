@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Movie</title>
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
    </style>
</head>
<body>

    <div class="custom-container">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body" style="background-color: #1f2937;">
                        <form action="{{ route('movie.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                            @method('PUT')
                            <h3 class="text-center my-4">UPDATE MOVIES</h3>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold question">IMAGE</label>
                                <!-- Tampilkan gambar yang sudah ada jika ada -->
                                @if($movie->image)
                                    <img src="{{ asset('/storage/movie/'.$movie->image) }}" class="mt-2" style="max-width: 200px; background-color: #e3e1e1;">
                                @endif
                                <input type="file" style="background-color: #e3e1e1;" class="form-control @error('image') is-invalid @enderror" name="image" >
                                <!-- error message untuk image -->
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group mb-3">
                                <label class="font-weight-bold question">TITLE</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $movie->title) }}" style="background-color: #e3e1e1;">
                            
                                <!-- error message untuk title -->
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group mb-3">
                                <label class="font-weight-bold question">DESCRIPTION</label>
                                <!-- Strip tags HTML sebelum menampilkan deskripsi -->
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" style="background-color: #e3e1e1;">{{ strip_tags(old('description', $movie->description)) }}</textarea>
                    
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
                                        <input type="number" class="form-control @error('release_year') is-invalid @enderror" name="release_year" value="{{ old('release_year', $movie->release_year) }}" style="background-color: #e3e1e1;">
                                    
                                        <!-- error message untuk price -->
                                        @error('price')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>

                        </form> 
                    </div>
                </div>  
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

</body>
</html>