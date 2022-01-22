@extends('base')
@section('content')

<div class="row">
    <div class="col-lg-6">
        <h1>Tambah data mahasiswa</h1>
        <form action="{{ route('student.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nim">Nim</label>
                <input type="text" name="nim" class="form-control" placeholder="nim" value="{{ old('nim') }}">
                @error('nim')
                    <div class="text-danger">
                        {{ $message }}
                    </div>                    
                @enderror
            </div>
            <div class="form-group">
                <label for="nama">nama</label>
                <input type="text" name="nama" class="form-control" placeholder="nama" value="{{ old('nama') }}">
                @error('nama')                    
                    <div class="text-danger">
                        {{ $message }}
                    </div>                                
                @enderror
            </div>

            <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <select name="gender" class="form-control">
                    <option value=""></option>
                    @foreach ($gender as $gd)
                        <option value="{{ $gd }}" {{ old('gender') == $gd ? 'selected' : '' }}>{{ $gd }}</option>
                    @endforeach
                </select>
                @error('gender')                    
                    <div class="text-danger">
                        {{ $message }}
                    </div>                                
                @enderror
            </div>

            <div class="form-group">
                <label for="departement">Departement</label>
                <select name="departement" class="form-control">
                    <option value=""></option>
                    @foreach ($departement as $dp)
                        <option value="{{ $dp }}" {{ old('departement') == $dp ? 'selected' : '' }}>{{ $dp }}</option>
                    @endforeach
                </select>
                @error('departement')                    
                    <div class="text-danger">
                        {{ $message }}
                    </div>                                
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Alamat</label>
                <textarea name="address" class="form-control" placeholder="alamat">{{ old('address') }}</textarea>
            </div>  
            <button class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>

@endsection