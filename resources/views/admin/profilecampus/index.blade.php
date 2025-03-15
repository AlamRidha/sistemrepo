<x-admin>
    @section('title', 'Profile E-Skripsi ITBM')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @role('admin')
                    <a href="{{ route('admin.profilcampus.edit', $profilecampus->id) }}" class="mb-3 btn btn-primary">Ubah</a>
                @endrole
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Sejarah</h3>
                        <hr>
                        <p class="text-justify">
                            {{ $profilecampus->sejarah ?? 'Belum ada data.' }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3>Visi </h3>
                        <hr>
                        <p class="text-justify">
                            {{ $profilecampus->visi ?? 'Belum ada data.' }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3>Misi</h3>
                        <hr>
                        <p class="text-justify">
                            {{-- {!! nl2br(preg_replace('/(\d+)\./', "<br><b>$1.</b>", e($profilecampus->misi ?? 'Belum ada data.'))) !!} --}}
                            {{-- {!! preg_replace('/\d+\.\s*/', '<br><b>$0</b>', nl2br(e($profilecampus->misi ?? 'Belum ada data.'))) !!} --}}
                            {!! preg_replace('/(\d+\.\s)/', '<br><strong>$1</strong> ', $profilecampus->misi) !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Kontak</h3>
                        <hr>
                        <p class="text-justify">
                            {{ $profilecampus->kontak ?? 'Belum ada data.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
