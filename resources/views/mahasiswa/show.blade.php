@extends('layouts.main')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">

                <div class="pt-3 d-flex justify-content-end align-items-center">
                    <h1 class="h2 mr-auto">Biodata {{ $mahasiswa->nama }}</h1>
                    <a href="{{ route('mahasiswas.edit', ['mahasiswa' => $mahasiswa->id]) }}"
                        class="btn btn-primary">Edit</a>
                    <form action="{{ route('mahasiswas.destroy', ['mahasiswa' => $mahasiswa->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger ml-3"
                            onclick="return confirm('Are you sure?')">Hapus</button>
                    </form>
                </div>
                <hr>

                <ul>
                    <li>NIM: {{ $mahasiswa->nim }} </li>
                    <li>Nama: {{ $mahasiswa->nama }} </li>
                    <li>Nama Kampus: {{ $mahasiswa->nama_kampus }} </li>
                    <li>Email: {{ $mahasiswa->email }} </li>
                    <li>Nomor Telepon: {{ $mahasiswa->notelp }} </li>
                    <li>Alamat:
                        {{ $mahasiswa->alamat == '' ? 'N/A' : $mahasiswa->alamat }}
                    </li>
                </ul>

            </div>
        </div>
    </div>
@endsection
