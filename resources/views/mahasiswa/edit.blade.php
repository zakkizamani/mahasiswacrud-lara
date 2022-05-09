@extends('layouts.main')

@section('content')
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-8 col-xl-6">
                <h1>Edit Mahasiswa</h1>
                <hr>

                <form action="{{ route('mahasiswas.update', ['mahasiswa' => $mahasiswa->id]) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim"
                            value="{{ old('nim') ?? $mahasiswa->nim }}">
                        @error('nim')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                            value="{{ old('nama') ?? $mahasiswa->nama }}">
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama_kampus">Nama Kampus</label>
                        <input type="text" class="form-control @error('nama_kampus') is-invalid @enderror" id="nama_kampus"
                            name="nama_kampus" value="{{ old('nama_kampus') ?? $mahasiswa->nama_kampus }}">
                        @error('nama_kampus')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="notelp">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email') ?? $mahasiswa->email }}">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir"
                            name="tgl_lahir" value="{{ old('tgl_lahir') ?? $mahasiswa->tgl_lahir }}">
                        @error('tgl_lahir')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="notelp">notelp</label>
                        <input type="notelp" class="form-control @error('notelp') is-invalid @enderror" id="notelp"
                            name="notelp" value="{{ old('notelp') ?? $mahasiswa->notelp }}">
                        @error('notelp')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" rows="3"
                            name="alamat">{{ old('alamat') ?? $mahasiswa->alamat }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mb-2">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection
