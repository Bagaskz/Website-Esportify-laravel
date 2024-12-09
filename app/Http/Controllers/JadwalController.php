<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    // Tampilkan semua data

    public function cetak(){
        $jadwals = Jadwal::all();
        $pdf = Pdf::loadView('jadwal.cetak', compact('jadwals'));
        return $pdf->download('jadwal.pdf'); 
    }
    public function index()
    {
        $jadwals = Jadwal::all();
        return view('jadwal.index', compact('jadwals'));
    }

    // Form untuk tambah data
    public function create()
    {
        return view('jadwal.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'team' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required',
        ]);

        Jadwal::create($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Data berhasil ditambahkan!');
    }

    // Form edit data
    public function edit(Jadwal $jadwal)
    {
        return view('jadwal.edit', compact('jadwal'));
    }

    // Update data
    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'team' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required',
        ]);

        $jadwal->update($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Data berhasil diupdate!');
    }

    // Hapus data
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Data berhasil dihapus!');
    }
}

