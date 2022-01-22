<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller{
    public function index(){
        $data['product'] = Product::all();
        return view('product', $data);
    }

    public function create(){
        return view('product_create');
    }

    public function store(Request $request){
        // $request->validate([
        //     'judul' => 'required',
        //     'nama' => 'required',
        //     'gambar' => 'required',                        
        // ]);

        $product = new Product();
        $product->nama = $request->nama;
        $product->ukuran = $request->ukuran;
        $product->gambar = $request->gambar;

        if ($request->hasFile('gambar')) {
            // Mengambil file
            $file = $request->file('gambar');
            $path = public_path("img/product/");

            // Buat direktori jika belum ada
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            // Membuat nama file random
            $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();

            // Pindahkan file ke folder img/prestasi
            $file->move($path, $filename);

            // Simpan nama file ke database
            $product->gambar = $filename;
        }

        $product->save();
        return redirect(route('product.index'))->with('pesan', 'data berhasil di tambah');
    }

    public function destroy($id){
        $product = Product::find($id);
        $product->delete();

        return redirect(route('product.index'))->with('pesan', 'data berhasil dihapus');
    }

    public function edit($id){
        $data['product'] = product::find($id);
        return view('product_edit', $data);
    }

    public function update(Request $request, $id){
        
        $product = new product();
        $product = product::find($id);
        $product->nama = $request->nama;
        $product->ukuran = $request->ukuran;
        $product->gambar = $request->gambar;

        if ($request->hasFile('gambar')) {
            // Mengambil file
            $file = $request->file('gambar');
            $path = public_path("img/product/");

            // Buat direktori jika belum ada
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }

            // Membuat nama file random
            $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();

            // Pindahkan file ke folder img/prestasi
            $file->move($path, $filename);

            // Simpan nama file ke database
            $product->gambar = $filename;
        } else {
            $product->gambar = $product->gambar;
        }

        $product->save();
        return redirect(route('product.index'))->with('pesan', 'data berhasil ubah');
    }
}
