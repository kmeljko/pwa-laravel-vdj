@extends('layouts.admin')

@section('content')
    <h1>Logovi</h1>

    <a href="{{ route('admin.logovi.create') }}" class="btn btn-success mb-3">Dodaj novi log</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Naziv</th>
                <th>Recept</th>
                <th>Opis loga</th>
                <th>Kreirano</th>
                <th>Akcije</th> <!-- nova kolona -->
            </tr>
        </thead>
        <tbody>
            @forelse($logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->naziv }}</td>
                    <td>{{ $log->recept ? $log->recept->naziv : 'Nepoznato' }}</td>
                    <td>{{ $log->opis ?? 'Nema opisa' }}</td>
                    <td>{{ $log->created_at->format('d.m.Y H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.logovi.edit', $log) }}" class="btn btn-primary btn-sm">Izmeni</a>

                        <form action="{{ route('admin.logovi.destroy', $log) }}" method="POST" style="display:inline-block;"
                            onsubmit="return confirm('Da li ste sigurni da želite da obrišete ovaj log?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Obriši</button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Nema zapisa u logovima.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $logs->links() }}
@endsection