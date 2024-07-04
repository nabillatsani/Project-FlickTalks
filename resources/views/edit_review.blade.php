@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Review</title>
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
                    <form action="{{ route('review.update', $review->id_review) }}" method="POST">
    @csrf
    @method('PUT')
                            <h3 class="text-center my-4">UPDATE REVIEW</h3>
                            
                            <div class="form-group mb-3">
                                <label class="font-weight-bold question">REVIEW</label>
                                <!-- Strip tags HTML sebelum menampilkan deskripsi -->
                                <textarea class="form-control @error('description') is-invalid @enderror" name="review" rows="5" style="background-color: #e3e1e1;">{{ strip_tags(old('review', $review->review)) }}</textarea>
                    
                                <!-- error message untuk description -->
                                @error('review')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold question">RATING</label>
                                        <input type="number" class="form-control @error('rating') is-invalid @enderror" name="rating" value="{{ old('rating', $review->rating) }}" style="background-color: #e3e1e1;">
                                    
                                        <!-- error message untuk price -->
                                        @error('rating')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
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