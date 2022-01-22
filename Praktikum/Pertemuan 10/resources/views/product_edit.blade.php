@extends('base')
@section('content')
<div class="row">
    <div class="col-lg-6">
        <h1>Tambah data mahasiswa</h1>
        <form action="{{ route('product.update', ['id' => $product->id]) }}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nim">nama</label>
                <input type="text" name="nama" class="form-control" placeholder="judul" value="{{ $product->judul }}">
                @error('nama')
                    <div class="text-danger">
                        {{ $message }}
                    </div>                    
                @enderror
            </div>
            <div class="form-group">
                <label for="nama">Deskripsi</label>
                <input type="text" name="ukuran" class="form-control" placeholder="deskripsi" value="{{ $product->ukuran }}">
                @error('ukuran')                    
                    <div class="text-danger">
                        {{ $message }}
                    </div>                                
                @enderror
            </div>

            <div class="form-group row">
                <label for="gambar" class="col-md-4 col-form-label text-md-right">Gambar</label>
                <div class="col-md-6">     
                    <input type="file" name="gambar" accept=".jpg, .png" id="">
                    <br>
                    <small>
                        Upload gambar baru jika ingin mengganti gambar lama, kosongi jika tidak ingin mengganti gambar lama.
                    </small>
                </div>
            </div>
            <button class="btn btn-primary">Tambah</button>            
</div>
@endsection