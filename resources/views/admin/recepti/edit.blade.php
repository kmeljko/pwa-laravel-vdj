@extends('layouts.admin')

@section('content')
<h1>Izmeni recept</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/admin/recepti/{{ $recept->id }}"  method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="naziv" class="form-label">Naziv</label>
        <input type="text" class="form-control" id="naziv" name="naziv" value="{{ old('naziv', $recept->naziv) }}" required>
    </div>

    <div class="mb-3">
        <label for="opis" class="form-label">Opis</label>
        <textarea class="form-control" id="opis" name="opis" rows="5" required>{{ old('opis', $recept->opis) }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Sačuvaj izmene</button>
    <a href="{{ route('admin.recepti.index') }}" class="btn btn-secondary">Nazad</a>
</form>
@endsection
