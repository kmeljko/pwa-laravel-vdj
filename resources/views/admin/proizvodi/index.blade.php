@extends('layouts.admin')

@section('content')
<h1>Proizvodi</h1>

<a href="{{ route('admin.proizvodi.create') }}" class="btn btn-primary mb-3">Dodaj novi proizvod</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Naziv</th>
            <th>Grupa</th>
            <th>Istaknuto</th>
            <th>Akcije</th>
        </tr>
    </thead>
    <tbody>
        @foreach($proizvodi as $proizvod)
            <tr>
                <td>{{ $proizvod->id }}</td>
                <td>{{ $proizvod->naziv }}</td>
                <td>{{ $proizvod->grupa }}</td>
                <td>{{ $proizvod->istaknuto ? 'Da' : 'Ne' }}</td>
                <td>
                    <a href="{{ route('admin.proizvodi.edit', $proizvod) }}" class="btn btn-sm btn-warning">Izmeni</a>
                    <form action="{{ route('admin.proizvodi.destroy', $proizvod) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Da li ste sigurni?')">Obriši</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
