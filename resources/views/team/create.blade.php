@extends('layouts.app')

@section('content')
    <h1>Tambah Tim</h1>
    <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Nama</label>
            <input type="text" class="input" name="nama" required>
        </div>
        <div>
            <label>Tanggal Dibuat</label>
            <input type="date" class="input" name="tanggal_dibuat" required>
        </div>
        <div>
            <label>Foto</label>
            <input type="file" class="input" name="foto">
        </div>
        <button type="submit" class="btn btn-simpan">Simpan</button>
    </form>
@endsection
