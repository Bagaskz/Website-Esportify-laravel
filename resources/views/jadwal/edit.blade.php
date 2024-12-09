@extends('layouts.app')

@section('title', 'Daftar Jadwal')

@section('content')
    <h1>Edit Jadwal</h1>
    <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Team</label><br>
        <input type="text" class="input" name="team" value="{{ $jadwal->team }}" required><br>
        <label>Tanggal</label><br>
        <input type="date" name="tanggal" class="input" value="{{ $jadwal->tanggal }}" required><br>
        <label>Status</label><br>
        <input type="text" name="status" class="input" value="{{ $jadwal->status }}" required><br>
        <button type="submit class="btn btn-simpan">Simpan</button>
    </form>

    @endsection