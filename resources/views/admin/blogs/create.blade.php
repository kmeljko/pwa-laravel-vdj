@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Dodaj novi blog</h1>

    <form method="POST" action="{{ route('admin.blogs.store') }}">
        @csrf

        <div class="mb-3">
            <label for="naslov" class="form-label">Naslov</label>
            <input type="text" class="form-control @error('naslov') is-invalid @enderror" id="naslov" name="naslov" value="{{ old('naslov') }}" required>
            @error('naslov')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="sadrzaj" class="form-label">Sadržaj</label>
            <textarea id="summernote" name="sadrzaj" class="form-control @error('sadrzaj') is-invalid @enderror">{{ old('sadrzaj') }}</textarea>
            @error('sadrzaj')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Sačuvaj blog</button>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">Nazad</a>
    </form>
</div>
@endsection

@section('scripts')
    <!-- Summernote CSS & JS CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,
                placeholder: 'Unesite sadržaj bloga...',
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });
        });
    </script>
@endsection
