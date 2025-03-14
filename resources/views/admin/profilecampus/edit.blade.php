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
                        <label for="visi">Visi</label>
                        <textarea name="visi" class="form-control" required>{{ old('visi', $profilecampus->visi ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="misi">Misi</label>
                        <textarea name="misi" class="form-control" required>{{ old('misi', $profilecampus->misi ?? '') }}</textarea>
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
