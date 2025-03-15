<x-admin>
    @section('title', 'Daftar Skripsi Mahasiswa')

    <div class="container">

        <a href="{{ route('admin.skripsi.create') }}" class="mb-3 btn btn-primary">Tambah Skripsi</a>


        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="skripsiTable">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Prodi</th>
                        <th>Tahun Terbit</th>
                        <th>Abstrak</th>
                        <th>File</th>
                        @if ($roleAdmin)
                            <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <!-- jQuery dan DataTables -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            var columns = [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'Judul',
                    name: 'Judul'
                },
                {
                    data: 'Penulis',
                    name: 'Penulis'
                },
                {
                    data: 'Prodi',
                    name: 'Prodi'
                },
                {
                    data: 'tahun_terbit',
                    name: 'tahun_terbit'
                },
                {
                    data: 'Abstrak',
                    name: 'Abstrak'
                },
                {
                    data: 'File',
                    name: 'File',
                    orderable: false,
                    searchable: false
                }
            ];

            // Only add action column to columns array if user is admin
            @if ($roleAdmin)
                columns.push({
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                });
            @endif

            $('#skripsiTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.skripsi.index') }}',
                columns: columns,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json"
                }
            });
        });
    </script>
</x-admin>
