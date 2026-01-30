<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Index;
use App\Models\Siswa;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function dataSiswa(Request $request)
    {
        $cari = $request->cari;
        if (! empty($cari)) {
        $data = Siswa::latest()
        ->where(function ($query) use ($cari){
            if ($cari) {
                $query->where('nama', 'like', "%".$cari."%")
                      ->orWhere('kelas', 'like', "%".$cari."%")
                      ->orWhere('jurusan', 'like', "%".$cari."%");
            }
        })
        ->paginate(5);
        } else {
            $data = Siswa::latest()->paginate(5);
        }
        return view('siswa.data-siswa', ['data' => $data, 'cari' => $cari]);
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
            'foto' => 'required|image|max:2048',
        ],[
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
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:500',
            'foto' => 'nullable|image|max:2048',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'kelas.required' => 'Kelas wajib diisi.',
            'jurusan.required' => 'Jurusan wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.max' => 'Ukuran file foto maksimal 2MB.',
        ]);
        // Hanya update foto jika ada file baru di-upload
        $siswa = Siswa::findOrFail($id);
        if ($request->hasFile('foto')) {
            $data['foto'] = $this->prosessFoto($request->file('foto'), $siswa->foto);
        } else {
            unset($data['foto']); // Jangan ubah field foto jika tidak ada file baru
        }
        $siswa->update($data);
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
        // Hapus file foto jika ada
        if ($siswa->foto && file_exists(public_path('foto_siswa/'.$siswa->foto))) {
            unlink(public_path('foto_siswa/'.$siswa->foto));
        }
        $siswa->delete();
        sweetalert()->success('Data siswa berhasil dihapus.');
        return redirect('/data-siswa');
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
