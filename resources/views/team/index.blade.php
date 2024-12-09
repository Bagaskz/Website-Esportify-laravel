@extends('layouts.app')

@section('content')
    <h1>Daftar Tim</h1>
    <a href="{{ route('team.create') }}" class="btn btn-tambah" >Tambah Tim</a>
    <table style="margin-top: 20px;" class="table-data">
        <thead >
            <tr>
                <th>Nama</th>
                <th>Tanggal Dibuat</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teams as $team)
                <tr>
                    <td>{{ $team->nama }}</td>
                    <td>{{ $team->tanggal_dibuat }}</td>
                    <td>
                        @if ($team->foto)
                            <img src="{{ asset('storage/' . $team->foto) }}" width="100">
                        @else
                            Tidak ada foto
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('team.edit', $team->id) }}">Edit</a>
                        <form action="{{ route('team.destroy', $team->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
