@extends('layouts.app')

@section('content')
    <h1>Edit Tim</h1>
    <form action="{{ route('team.update', $team->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label>Nama</label>
            <input type="text" class="input" name="nama" value="{{ $team->nama }}" required>
        </div>
        <div>
            <label>Tanggal Dibuat</label>
            <input type="date" class="input" name="tanggal_dibuat" value="{{ $team->tanggal_dibuat }}" required>
        </div>
        <div>
            <label>Foto</label>
            <input type="file" class="input" name="foto">
            @if ($team->foto)
                <img src="{{ asset('storage/' . $team->foto) }}" class="input" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-simpan">Simpan</button>
    </form>
@endsection
