@extends('layouts.admin')

@section('content')
    <h1>Izmeni log</h1>

    <form action="/admin/logovi/{{ $log->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="naziv" class="form-label">Naziv</label>
            <input type="text" name="naziv" id="naziv" class="form-control @error('naziv') is-invalid @enderror" value="{{ old('naziv', $log->naziv) }}" required>
            @error('naziv')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="po_receptu" class="form-label">Recept</label>
            <select name="po_receptu" id="po_receptu" class="form-select @error('po_receptu') is-invalid @enderror" required>
                <option value="">-- Izaberi recept --</option>
                @foreach($recepti as $recept)
                    <option value="{{ $recept->id }}" {{ old('po_receptu', $log->po_receptu) == $recept->id ? 'selected' : '' }}>{{ $recept->naziv }}</option>
                @endforeach
            </select>
            @error('po_receptu')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="opis" class="form-label">Opis</label>
            <textarea name="opis" id="opis" class="form-control @error('opis') is-invalid @enderror">{{ old('opis', $log->opis) }}</textarea>
            @error('opis')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Sačuvaj izmene</button>
    </form>
@endsection
