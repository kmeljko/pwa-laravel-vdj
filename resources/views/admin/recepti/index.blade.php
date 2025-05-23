@extends('layouts.admin')

@section('content')
<h1>Recepti</h1>

<a href="{{ route('admin.recepti.create') }}" class="btn btn-primary mb-3">Dodaj novi recept</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Naziv</th>
            <th>Opis</th>
            <th>Akcije</th>
        </tr>
    </thead>
    <tbody>
        @foreach($recepti as $recept)
        <tr>
            <td>{{ $recept->id }}</td>
            <td>{{ $recept->naziv }}</td>
            <td>{{ $recept->opis }}</td>
            <td>
                <a href="{{ route('admin.recepti.edit', $recept->id) }}" class="btn btn-sm btn-warning">Izmeni</a>
                <form action="{{ route('admin.recepti.destroy', $recept->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Da li ste sigurni da želite da obrišete recept?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit">Obriši</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
