<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Siswa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homepage()
    {
        return view('umum.homepage');
    }

    public function pendaftaran()
    {
        return view('umum.pendaftaran');
    }

    public function SimpanPendaftaran(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:100',
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:500',
            'foto' => 'required|image|max:2048',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'kelas.required' => 'Kelas wajib diisi.',
            'jurusan.required' => 'Jurusan wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi.',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'foto.required' => 'Foto wajib diisi.',
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.max' => 'Ukuran file foto maksimal 2MB.',
        ]);

        $data['foto'] = $this->prosessFoto($request->file('foto'));

        Siswa::create($data);
        sweetalert()->success('Data siswa berhasil ditambahkan.');
        return redirect('/homepage');
        
    }

    private function prosessFoto($file, $oldFile = null)
    {
        if (! $file) {
            return $oldFile;
        }

        try {
            // Hapus file lama jika ada
            if ($oldFile && file_exists(public_path('foto_siswa/'.$oldFile))) {
                unlink(public_path('foto_siswa/'.$oldFile));
            }

            // Buat nama file unik
            $filename = time().'_'.$file->getClientOriginalName();

            // Pindah file ke folder tujuan
            $file->move(public_path('foto_siswa'), $filename);

            return $filename;
        } catch (Exception $e) {
            // kembalikan file lama jika ada error saat upload
            return $oldFile;
        }
    }
}