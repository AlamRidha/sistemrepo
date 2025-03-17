


<x-admin>
    @section('title', 'Create User')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create User</h3>
            <div class="card-tools"><a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-dark">Back</a></div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.user.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name" class="form-label">Name:*</label>
                            <input type="text" class="form-control" name="name" required
                                value="{{ old('name') }}">
                            <x-error field="name" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email" class="form-label">Email:*</label>
                            <input type="email" class="form-control" name="email" required
                                value="{{ old('email') }}">
                            <x-error field="email" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password" class="form-label">Password:*</label>
                            <input type="password" class="form-control" name="password" required>
                            <x-error field="password" />
                        </div>
                    </div>
                    {{-- levelnya dihidden kan saja --}}
                    <div class="col-lg-6" hidden>
                        <div class="form-group">
                            <label for="level" class="form-label">Level:*</label>
                            <input type="number" class="form-control" name="level" id="level" required
                                value="{{ old('level') }}">
                            <x-error field="level" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="username" class="form-label">Username:*</label>
                            <input type="text" class="form-control" name="username" required
                                value="{{ old('username') }}">
                            <x-error field="username" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="role" class="form-label">Role:*</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="" selected disabled>Pilih Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}"
                                        {{ $role->name == old('role') ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <x-error field="role" />
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="float-right">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @section('js')
        <script>
            $(document).ready(function() {
                $('#role').change(function() {
                    let role = $(this).val();
                    if (role === 'admin') {
                        $('#level').val(1);
                    } else if (role === 'mahasiswa') {
                        $('#level').val(2);
                    } else {
                        $('#level').val(''); // Kosongkan level jika role tidak sesuai
                    }
                });
            });
        </script>
    @endsection
</x-admin>
