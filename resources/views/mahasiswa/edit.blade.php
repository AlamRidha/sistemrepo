<x-admin>
    @section('title', 'Edit Mahasiswa')

    <div class="container">
        <h2>Edit Mahasiswa</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.mahasiswa.update', $mahasiswa->nim) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" name="nim" class="form-control" value="{{ $mahasiswa->nim }}" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $mahasiswa->nama }}" required>
            </div>
            <div class="form-group">
                <label for="prodi">Prodi</label>
                <input type="text" name="prodi" class="form-control" value="{{ $mahasiswa->prodi }}" required>
            </div>
            <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                <select name="jk" class="form-control" required>
                    <option value="L" {{ $mahasiswa->jk == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $mahasiswa->jk == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="no_hp">No. HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ $mahasiswa->no_hp }}" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" value="{{ $mahasiswa->username }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</x-admin>
