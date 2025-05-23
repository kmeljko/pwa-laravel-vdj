@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Svi proizvodi</h1>

        <ul>
            @foreach ($proizvodi as $proizvod)
                <li>
                    <a href="{{ route('proizvodi.show', $proizvod->id) }}">
                        {{ $proizvod->naziv }} ({{ $proizvod->grupa }})
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
