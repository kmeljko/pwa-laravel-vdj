@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Blogovi</h1>

    <a href="{{ route('admin.blogs.create') }}" class="btn btn-success mb-3">Dodaj novi blog</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @forelse($blogs as $blog)
        <div class="mb-4 p-3 border rounded">
            <h3>{{ $blog->naslov }}</h3>
            <div>{!! $blog->sadrzaj !!}</div>
            <small class="text-muted">Kreirano: {{ $blog->created_at->format('d.m.Y H:i') }}</small>
        </div>
    @empty
        <p>Nema blogova.</p>
    @endforelse

    {{ $blogs->links() }}
</div>
@endsection
