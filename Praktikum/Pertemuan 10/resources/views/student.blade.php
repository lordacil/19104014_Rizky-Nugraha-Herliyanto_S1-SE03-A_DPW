@extends('base')
@section('content')

<h1>Data Mahasiswa</h1>
<div class="row">
    <div class="col-lg-12">
        @if (session()->has('pesan'))
            <div class="alert alert-success">
                {{ session()->get('pesan') }}
            </div>
        @endif

        <a href="{{ route('student.create') }}" class="btn btn-primary mb-2">tambah</a>
        <a href="{{ route('index.api') }}" class="btn btn-primary mb-2">Show data API</a>
        <div class="table-responsive">
            <table class="table table-hover" id="myTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nim</th>
                        <th>Nama</th>
                        <th>Gender</th>
                        <th>Jurusan</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                @forelse ($student as $mahasiswa)
                <tbody>
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mahasiswa->nim }}</td>
                        <td>{{ $mahasiswa->nama }}</td>
                        <td>{{ $mahasiswa->gender }}</td>
                        <td>{{ $mahasiswa->departement }}</td>
                        <td>{{ $mahasiswa->address }}</td>
                        <td>
                            <form action="{{ route('student.destroy', ['id' => $mahasiswa->id]) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <a href="{{ route('student.edit', ['id' => $mahasiswa->id]) }}" class="btn btn-info btn-sm">Edit</a>                            
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>                    
                    @empty
                    <tr>
                        <td class="text-center" colspan="7">Tidak ada data</td>
                    </tr>
                    @endforelse                                         
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection