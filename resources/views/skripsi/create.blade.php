<x-admin>
    @section('title', 'Tambah Skripsi')

    <div class="container">
        <h2>Tambah Skripsi</h2>
        <form action="{{ route('admin.skripsi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="Judul">Judul</label>
                <input type="text" name="Judul" id="Judul" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Penulis">Penulis</label>
                <input type="text" name="Penulis" id="Penulis" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Prodi">Prodi</label>
                <input type="text" name="Prodi" id="Prodi" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input type="text" name="tahun_terbit" id="tahun_terbit" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Abstrak">Abstrak</label>
                <textarea name="Abstrak" id="Abstrak" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="File">File (PDF)</label>
                <input type="file" name="File" id="File" class="form-control-file" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Skripsi</button>
        </form>
    </div>
</x-admin>
