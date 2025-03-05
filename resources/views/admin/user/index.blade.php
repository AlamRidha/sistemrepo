<x-admin>
    @section('title', 'Users')

    <div class="container">
        <h2>Daftar Pengguna</h2>
        <div class="mb-3">
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary" aria-label="Tambah Pengguna">Tambah
                Pengguna</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="userTable">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Level</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Dibuat</th>
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
            $('#userTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.user.index') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'level',
                        name: 'level'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function(data) {
                            var date = new Date(data);
                            var day = date.getDate().toString().padStart(2, '0');
                            var month = (date.getMonth() + 1).toString().padStart(2, '0');
                            var year = date.getFullYear();
                            var hours = date.getHours().toString().padStart(2, '0');
                            var minutes = date.getMinutes().toString().padStart(2, '0');
                            return day + '-' + month + '-' + year + ' ' + hours + ':' + minutes;
                        }
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
