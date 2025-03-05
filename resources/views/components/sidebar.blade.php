<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>Home</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.profilcampus.index') }}"
                class="nav-link {{ Route::is('admin.profilcampus.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-graduation-cap"></i>
                <p>Profil</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.role.index') }}"
                class="nav-link {{ Route::is('admin.role.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-contract"></i>
                <p>Skripsi STMIK
                    <span class="badge badge-success right">{{ $RoleCount }}</span>
                </p>
            </a>
        </li>
        @role('admin')
            <li class="nav-item">
                <a href="{{ route('admin.mahasiswa.index') }}"
                    class="nav-link {{ Route::is('admin.mahasiswa.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Mahasiswa
                        <span class="badge badge-info right">{{ $MahasiswaCount }}</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.user.index') }}"
                    class="nav-link {{ Route::is('admin.user.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>Data Login</p>
                </a>
            </li>
        @endrole

        <li class="nav-item">
            <a href="#" class="nav-link"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>

    </ul>
</nav>
