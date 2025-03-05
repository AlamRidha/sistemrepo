<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MahasiswaController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $mahasiswas = Mahasiswa::select('*');

            return DataTables::of($mahasiswas)
                ->addColumn('action', function ($mahasiswa) {
                    return view('mahasiswa.partials.action-buttons', compact('mahasiswa'));
                })
                ->make(true);
        }

        return view('mahasiswa.index');
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswa,nim',
            'nama' => 'required',
            'prodi' => 'required',
            'jk' => 'required',
            'no_hp' => 'required',
            'username' => 'required|unique:mahasiswa,username',
            'password' => 'required',
        ]);

        Mahasiswa::create($request->all());
        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswa,nim,' . $mahasiswa->nim . ',nim',
            'nama' => 'required',
            'prodi' => 'required',
            'jk' => 'required',
            'no_hp' => 'required',
            'username' => 'required|unique:mahasiswa,username,' . $mahasiswa->nim . ',nim',
        ]);

        $mahasiswa->update($request->all());
        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil diupdate.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
