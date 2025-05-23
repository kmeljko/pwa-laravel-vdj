@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dobrodošli u našu pekaru!</h1>

        <h2>Istaknuti proizvodi</h2>
        <div>
            @foreach ($istaknutiProizvodi as $proizvod)
                <div style="margin-bottom: 1rem;">
                    <strong>{{ $proizvod->naziv }}</strong> ({{ $proizvod->grupa }})
                </div>
            @endforeach
        </div>
    </div>
@endsection
