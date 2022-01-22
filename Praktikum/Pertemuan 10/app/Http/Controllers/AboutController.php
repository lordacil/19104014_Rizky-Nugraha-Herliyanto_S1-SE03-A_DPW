<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use PDO;
use Illuminate\Support\Str;

class AboutController extends Controller{

    public function index(){
        $data['about'] = About::all();
        return view('about', $data);
    }

    public function create(){
        return view('about_create');
    }

    public function store(Request $request){
        // $request->validate([
        //     'judul' => 'required',
        //     'nama' => 'required',
        //     'gambar' => 'required',                        
        // ]);

        $about = new About();
        $about->judul = $request->judul;
        $about->deskripsi = $request->deskripsi;
        $about->gambar = $request->gambar;

        if ($request->hasFile('gambar')) {
            // Mengambil file
            $file = $request->file('gambar');
            $path = public_path("img/about/");

            // Buat direktori jika belum ada
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            // Membuat nama file random
            $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();

            // Pindahkan file ke folder img/prestasi
            $file->move($path, $filename);

            // Simpan nama file ke database
            $about->gambar = $filename;
        }

        $about->save();
        return redirect(route('about.index'))->with('pesan', 'data berhasil di tambah');
    }

    public function edit($id){
        $data['about'] = About::find($id);
        return view('about_edit', $data);
    }

    public function update(Request $request, $id){
        
        $about = new About();
        $about = About::find($id);
        $about->judul = $request->judul;
        $about->deskripsi = $request->deskripsi;
        $about->gambar = $request->gambar;

        if ($request->hasFile('gambar')) {
            // Mengambil file
            $file = $request->file('gambar');
            $path = public_path("img/about/");

            // Buat direktori jika belum ada
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            // Membuat nama file random
            $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();

            // Pindahkan file ke folder img/prestasi
            $file->move($path, $filename);

            // Simpan nama file ke database
            $about->gambar = $filename;
        } else {
            $about->gambar = $about->gambar;
        }

        $about->save();
        return redirect(route('about.index'))->with('pesan', 'data berhasil ubah');
    }

    public function destroy($id){
        $about = About::find($id);
        $about->delete();

        return redirect(route('about.index'))->with('pesan', 'data berhasil dihapus');
    }
}
