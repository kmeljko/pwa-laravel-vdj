@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $proizvod->naziv }}</h1>
        <p>Grupa: {{ $proizvod->grupa }}</p>
        <a href="{{ route('proizvodi.index') }}">← Nazad na listu</a>
    </div>
@endsection
