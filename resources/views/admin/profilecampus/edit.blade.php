<x-admin>
    @section('title', 'Edit Profile Campus')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>Edit Profil Perpustakaan</h2>

                <form action="{{ route('admin.profilcampus.update', $profilecampus->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="visi_misi">Visi & Misi</label>
                        <textarea name="visi_misi" class="form-control" required>{{ old('visi_misi', $profilecampus->visi_misi ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="sejarah">Sejarah</label>
                        <textarea name="sejarah" class="form-control" required>{{ old('sejarah', $profilecampus->sejarah ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="kontak">Kontak</label>
                        <input type="text" name="kontak" class="form-control" required
                            value="{{ old('kontak', $profilecampus->kontak ?? '') }}">
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('admin.profilcampus.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</x-admin>
