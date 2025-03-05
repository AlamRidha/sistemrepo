<a href="{{ route('admin.mahasiswa.edit', $mahasiswa->nim) }}" class="text-white btn btn-sm btn-warning">Edit</a>
<form action="{{ route('admin.mahasiswa.destroy', $mahasiswa->nim) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
</form>
