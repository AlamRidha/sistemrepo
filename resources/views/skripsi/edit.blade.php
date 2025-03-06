<x-admin>
    @section('title', 'Edit Skripsi')

    <div class="container">
        <h2>Edit Skripsi</h2>
        <form action="{{ route('admin.skripsi.update', $skripsi->id_skripsi) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="Judul">Judul</label>
                <input type="text" name="Judul" id="Judul" class="form-control" value="{{ $skripsi->Judul }}"
                    required>
            </div>
            <div class="form-group">
                <label for="Penulis">Penulis</label>
                <input type="text" name="Penulis" id="Penulis" class="form-control" value="{{ $skripsi->Penulis }}"
                    required>
            </div>
            <div class="form-group">
                <label for="Prodi">Prodi</label>
                <input type="text" name="Prodi" id="Prodi" class="form-control" value="{{ $skripsi->Prodi }}"
                    required>
            </div>
            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input type="text" name="tahun_terbit" id="tahun_terbit" class="form-control"
                    value="{{ $skripsi->tahun_terbit }}" required>
            </div>
            <div class="form-group">
                <label for="Abstrak">Abstrak</label>
                <textarea name="Abstrak" id="Abstrak" class="form-control" required>{{ $skripsi->Abstrak }}</textarea>
            </div>
            <div class="form-group">
                <label for="File">File (PDF)</label>
                <input type="file" name="File" id="File" class="form-control-file">
                @if ($skripsi->File)
                    <p><a href="{{ asset($skripsi->File) }}" target="_blank">Lihat File Saat Ini</a></p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</x-admin>
