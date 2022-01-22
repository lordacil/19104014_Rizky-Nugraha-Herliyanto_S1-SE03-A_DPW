@extends('base')
@section('content')

<div class="row">
    <div class="col-lg-6">
        <h1>Tambah data mahasiswa</h1>
        <form action="{{ route('about.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nim">Judul</label>
                <input type="text" name="judul" class="form-control" placeholder="judul" value="{{ old('judul') }}">
                @error('nim')
                    <div class="text-danger">
                        {{ $message }}
                    </div>                    
                @enderror
            </div>
            <div class="form-group">
                <label for="nama">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" placeholder="deskrip" value="{{ old('deskripsi') }}">
                @error('nama')                    
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