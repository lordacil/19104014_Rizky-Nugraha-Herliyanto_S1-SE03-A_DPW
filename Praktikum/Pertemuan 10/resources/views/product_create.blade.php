@extends('base')
@section('content')

<div class="row">
    <div class="col-lg-6">
        <h1>Tambah data mahasiswa</h1>
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nim">nama</label>
                <input type="text" name="nama" class="form-control" placeholder="judul" value="{{ old('nama') }}">
                @error('nama')
                    <div class="text-danger">
                        {{ $message }}
                    </div>                    
                @enderror
            </div>
            <div class="form-group">
                <label for="nama">Ukuran</label>
                <input type="text" name="ukuran" class="form-control" placeholder="ukuran" value="{{ old('ukuran') }}">
                @error('ukuran')                    
                    <div class="text-danger">
                        {{ $message }}
                    </div>                                
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Gambar</label>
                <div class="col-md-6">
                    <input type="file" name="gambar" accept=".jpg, .png, .jpeg">
                </div>
                @error('gambar')                    
                    <div class="text-danger">
                        {{ $message }}
                    </div>                                
                @enderror
            </div>  
            <button class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>

@endsection