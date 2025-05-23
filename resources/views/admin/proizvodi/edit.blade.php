@extends('layouts.admin')

@section('content')
<h1>Izmeni proizvod</h1>

<form method="POST" action="{{ route('admin.proizvodi.update', $proizvod) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="naziv" class="form-label">Naziv</label>
        <input type="text" class="form-control @error('naziv') is-invalid @enderror" id="naziv" name="naziv" value="{{ old('naziv', $proizvod->naziv) }}" required>
        @error('naziv')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="grupa" class="form-label">Grupa</label>
        <input type="text" class="form-control @error('grupa') is-invalid @enderror" id="grupa" name="grupa" value="{{ old('grupa', $proizvod->grupa) }}" required>
        @error('grupa')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="istaknuto" class="form-label">Istaknuto</label>
        <select name="istaknuto" id="istaknuto" class="form-select @error('istaknuto') is-invalid @enderror" required>
            <option value="1" {{ old('istaknuto', $proizvod->istaknuto) == 1 ? 'selected' : '' }}>Da</option>
            <option value="0" {{ old('istaknuto', $proizvod->istaknuto) == 0 ? 'selected' : '' }}>Ne</option>
        </select>
        @error('istaknuto')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Sačuvaj izmene</button>
</form>
@endsection
