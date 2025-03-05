<x-admin>
    @section('title', 'Profile Campus')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Profil Perpustakaan YPP Prabumulih</h2>
                @role('admin')
                    <a href="{{ route('admin.profilcampus.edit', $profilecampus->id) }}" class="mb-3 btn btn-primary">Ubah</a>
                @endrole
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3>Visi & Misi</h3>
                        <hr>
                        <p>
                            {{ $profilecampus->visi_misi ?? 'Belum ada data.' }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3>Sejarah</h3>
                        <hr>
                        <p>
                            {{ $profilecampus->sejarah ?? 'Belum ada data.' }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Kontak</h3>
                        <hr>
                        <p>
                            {{ $profilecampus->kontak ?? 'Belum ada data.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
