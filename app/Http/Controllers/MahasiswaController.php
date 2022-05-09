<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.tampil', ['mahasiswas' => $mahasiswas]);
    }

    public function create()
    {
        return view('mahasiswa.tambah');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nim' => 'required|size:8|unique:mahasiswas',
            'nama' => 'required|min:3|max:50',
            'nama_kampus' => 'required|min:3|max:250',
            'email' => 'required|email',
            'tgl_lahir' => 'required|date',
            'notelp' => 'required|min:6|max:13',
            'alamat' => '',
        ]);

        // $mahasiswa = new Mahasiswa();
        // $mahasiswa->nim = $validateData['nim'];
        // $mahasiswa->nama = $validateData['nama'];
        // $mahasiswa->nama_kampus = $validateData['nama_kampus'];
        // $mahasiswa->email = $validateData['email'];
        // $mahasiswa->tgl_lahir = $validateData['tgl_lahir'];
        // $mahasiswa->notelp = $validateData['notelp'];
        // $mahasiswa->alamat = $validateData['alamat'];
        // $mahasiswa->save();

        Mahasiswa::create($validateData);

        $request->session()->flash('pesan', "Data {$validateData['nama']} berhasil di tambahkan");

        return redirect()->route('mahasiswas.index');
    }

    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', ['mahasiswa' => $mahasiswa]);
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', ['mahasiswa' => $mahasiswa]);
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validateData = $request->validate([
            'nim' => 'required|size:8|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama' => 'required|min:3|max:50',
            'nama_kampus' => 'required|min:3|max:250',
            'email' => 'required|email',
            'tgl_lahir' => 'required|date',
            'notelp' => 'required|min:6|max:13',
            'alamat' => '',
        ]);

        Mahasiswa::where('id', $mahasiswa->id)->update($validateData);
        $request->session()->flash('pesan', "Data {$validateData['nama']} berhasil di Update");

        return redirect()->route('mahasiswas.index');
    }

    public function destroy(Request $request, Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        $request->session()->flash('pesan', "Data {$mahasiswa->nama} berhasil di Delete");
        return redirect()->route('mahasiswas.index');
    }
}
