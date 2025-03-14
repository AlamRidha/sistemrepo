<?php

namespace App\Http\Controllers;

use App\Models\Skripsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class SkripsiController extends Controller
{
    //
    public function index(Request $request)
    {
        $roleAdmin = auth()->user()->hasRole('admin');

        if ($request->ajax()) {
            $data = Skripsi::select(['id_skripsi', 'Judul', 'Penulis', 'Prodi', 'tahun_terbit', 'Abstrak', 'File']);
            $dataTable = DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('File', function ($row) {
                    return '<a href="' . Storage::url($row->File)  . '" target="_blank" class="btn btn-sm btn-primary"><i class="fas fa-file-alt"></i> Open File</a>';
                });

            // IMPORTANT: Change the condition here - only add action column if user IS admin
            if ($roleAdmin) {
                $dataTable->addColumn('action', function ($row) {
                    $editUrl = route('admin.skripsi.edit', $row->id_skripsi);
                    $deleteUrl = route('admin.skripsi.destroy', $row->id_skripsi);
                    $csrf = csrf_field();
                    $method = method_field('DELETE');

                    return '<a href="' . $editUrl . '" class="btn btn-sm btn-warning">Edit</a>
                            <form action="' . $deleteUrl . '" method="POST" class="d-inline">
                                ' . $csrf . '
                                ' . $method . '
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Apakah Anda yakin?\')">Hapus</button>
                            </form>';
                });

                // IMPORTANT: Include both File and action in rawColumns
                $dataTable->rawColumns(['File', 'action']);
            } else {
                // If not admin, only include File in rawColumns
                $dataTable->rawColumns(['File']);
            }

            return $dataTable->make(true);
        }

        return view('skripsi.index', compact('roleAdmin'));
    }

    public function create()
    {
        return view('skripsi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Judul' => 'required',
            'Penulis' => 'required',
            'Prodi' => 'required',
            'tahun_terbit' => 'required',
            'Abstrak' => 'required',
            'File' => 'required|file|mimes:pdf',
        ]);

        $file = $request->file('File');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $fileName, 'public'); // Simpan di storage/app/public/uploads

        Skripsi::create([
            'Judul' => $request->Judul,
            'Penulis' => $request->Penulis,
            'Prodi' => $request->Prodi,
            'tahun_terbit' => $request->tahun_terbit,
            'Abstrak' => $request->Abstrak,
            'File' => 'uploads/' . $fileName, // Simpan path relatif
        ]);

        return redirect()->route('admin.skripsi.index')->with('success', 'Skripsi berhasil ditambahkan.');
    }

    public function edit(Skripsi $skripsi)
    {
        return view('skripsi.edit', compact('skripsi'));
    }

    public function update(Request $request, Skripsi $skripsi)
    {
        $request->validate([
            'Judul' => 'required',
            'Penulis' => 'required',
            'Prodi' => 'required',
            'tahun_terbit' => 'required',
            'Abstrak' => 'required',
            'File' => 'nullable|file|mimes:pdf',
        ]);

        if ($request->hasFile('File')) {
            // Hapus file lama jika ada
            if ($skripsi->File) {
                Storage::disk('public')->delete($skripsi->File);
            }

            $file = $request->file('File');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public'); // Simpan di storage/app/public/uploads
            $skripsi->File = 'uploads/' . $fileName; // Simpan path relatif
            $skripsi->save();
        }

        $skripsi->update($request->except('File'));

        return redirect()->route('admin.skripsi.index')->with('success', 'Skripsi berhasil diperbarui.');
    }

    public function destroy(Skripsi $skripsi)
    {
        // Hapus file terkait jika ada
        if ($skripsi->File) {
            Storage::disk('public')->delete($skripsi->File);
        }

        $skripsi->delete();
        return redirect()->route('admin.skripsi.index')->with('success', 'Skripsi berhasil dihapus.');
    }
}
