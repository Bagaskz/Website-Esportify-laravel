<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $teams = Team::all();
        return view('team.index', compact('teams'));
    }

    // Menampilkan form tambah data
    public function create()
    {
        return view('team.create');
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'tanggal_dibuat' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('team_photos', 'public');
        }

        Team::create([
            'nama' => $request->nama,
            'tanggal_dibuat' => $request->tanggal_dibuat,
            'foto' => $foto,
        ]);

        return redirect()->route('team.index')->with('success', 'Team berhasil ditambahkan.');
    }

    // Menampilkan data untuk diedit
    public function edit(Team $team)
    {
        return view('team.edit', compact('team'));
    }

    // Memperbarui data
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'tanggal_dibuat' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($team->foto) {
                Storage::disk('public')->delete($team->foto);
            }
            $team->foto = $request->file('foto')->store('team_photos', 'public');
        }

        $team->update([
            'nama' => $request->nama,
            'tanggal_dibuat' => $request->tanggal_dibuat,
            'foto' => $team->foto,
        ]);

        return redirect()->route('team.index')->with('success', 'Team berhasil diperbarui.');
    }

    // Menghapus data
    public function destroy(Team $team)
    {
        if ($team->foto) {
            Storage::disk('public')->delete($team->foto);
        }
        $team->delete();

        return redirect()->route('team.index')->with('success', 'Team berhasil dihapus.');
    }
}
