<x-admin>
    @section('title', 'Daftar Mahasiswa')

    <div class="container">
        <h2>Daftar Mahasiswa</h2>
        <div class="mb-3">
            <a href="{{ route('admin.mahasiswa.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="mahasiswaTable">
                <thead class="thead-light">
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Jenis Kelamin</th>
                        <th>No. HP</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script>
        $(function() {
            $('#mahasiswaTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.mahasiswa.index') }}',
                columns: [{
                        data: 'nim',
                        name: 'nim'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'prodi',
                        name: 'prodi'
                    },
                    {
                        data: 'jk',
                        name: 'jk'
                    },
                    {
                        data: 'no_hp',
                        name: 'no_hp'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json"
                }
            });
        });
    </script>
</x-admin>
