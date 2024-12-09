@extends('layouts.app')

@section('title', 'Daftar Jadwal')

@section('content')
    <h1>Tambah Jadwal</h1>
    <form action="{{ route('jadwal.store') }}" method="POST">
        @csrf
        <label>Team</label><br>
        <input type="text" name="team" class="input" required><br>
        <label>Tanggal</label><br>
        <input type="date" name="tanggal" class="input" required><br>
        <label>Status</label><br>
        <input type="text" name="status" class="input" required><br>
        <button type="submit" class="btn btn-simpan">Simpan</button>
    </form>

    @endsection