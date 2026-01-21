<?php

namespace App\Http\Controllers;

use App\Models\Index;
use App\Models\Siswa;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function dataSiswa()
    {
        $dataSiswa = Siswa::latest()->get();
        return view('siswa.data-siswa', ['dataSiswa' => $dataSiswa]);
    }

    public function about()
    {
        return view('siswa.about');
    }

    public function create()
    {
        return view('siswa.tambah');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:100',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:500',
        ],[
            'nama.required' => 'Nama wajib diisi.',
            'kelas.required' => 'Kelas wajib diisi.',
            'jurusan.required' => 'Jurusan wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi.',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
        ]);

        Siswa::create($data);
        sweetalert()->success('Data siswa berhasil ditambahkan.');
        return redirect('/data-siswa');
        }
        public function edit($id)
        {
            $siswa = Siswa::findOrFail($id);
            return view('siswa.edit', ['siswa' => $siswa]);
            
        }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:100',
            'jenis_kelamin' => 'required|string|in:L,P',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:500',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'kelas.required' => 'Kelas wajib diisi.',
            'jurusan.required' => 'Jurusan wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
        ]);
        Siswa::findOrFail($id)->update($data);
        sweetalert()->success('Data siswa berhasil diperbarui.');
        return redirect('/data-siswa');
    }

    public function delete($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.hapus', ['siswa' => $siswa]);
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        sweetalert()->success('Data siswa berhasil dihapus.');
        return redirect('/data-siswa');
    }

}
