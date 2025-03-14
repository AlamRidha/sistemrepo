<?php

namespace App\Http\Controllers;

use App\Models\ProfileCampus;
use Illuminate\Http\Request;

class ProfileCampusController extends Controller
{
    //
    public function index()
    {
        $profilecampus = ProfileCampus::first();
        return view('admin.profilecampus.index', compact('profilecampus'));
    }

    public function edit($id = null)
    {
        $profilecampus = ProfileCampus::findOrFail($id);
        return view('admin.profilecampus.edit', compact('profilecampus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'visi' => 'required|string',
            'misi' => 'required|string',
            'sejarah' => 'required|string',
            'kontak' => 'required|string'
        ]);

        $profile = ProfileCampus::findOrFail($id);
        $profile->visi = $request->visi;
        $profile->misi = $request->misi;
        $profile->sejarah = $request->sejarah;
        $profile->kontak = $request->kontak;
        $profile->save();

        return redirect()->route('admin.profilcampus.index')->with('success', 'Profil berhasil diperbarui');
    }
}
