@extends('layouts.admin')

@section('content')
    <!-- U <head> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

    <!-- Pre zatvaranja </body> -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

    <h1>Logovi</h1>

    <a href="{{ route('admin.logovi.create') }}" class="btn btn-success mb-3">Dodaj novi log</a>

    <table id="logoviTable" class="table table-bordered table-striped">
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
    <script>
        $(document).ready(function () {
            $('#logoviTable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/Serbian.json'
                }
            });
        });
    </script>

    {{ $logs->links() }}
@endsection