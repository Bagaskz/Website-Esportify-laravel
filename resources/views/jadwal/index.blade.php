@extends('layouts.app')

@section('title', 'Daftar Jadwal')

@section('content')
    <h1 style="margin-bottom: 20px;">Daftar Jadwal</h1>
    <a href="{{ route('jadwal.create') }}" class="btn btn-tambah" >Tambah Jadwal</a>
    <a href="{{ route('jadwal.cetak') }}" class="btn btn-tambah" >Cetak Jadwal</a>
    @if(session('success'))
        <p style="margin-top: 20px;">{{ session('success') }}</p>
    @endif
    <table border="1" class="table-data" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Team</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwals as $jadwal)
                <tr>
                    <td>{{ $jadwal->id }}</td>
                    <td>{{ $jadwal->team }}</td>
                    <td>{{ $jadwal->tanggal }}</td>
                    <td>{{ $jadwal->status }}</td>
                    <td>
                        <a href="{{ route('jadwal.edit', $jadwal->id) }}">Edit</a>
                        <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
