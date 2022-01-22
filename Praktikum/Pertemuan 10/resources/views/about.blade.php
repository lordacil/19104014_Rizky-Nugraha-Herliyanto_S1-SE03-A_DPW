{{-- memanggil template base --}}
@extends('base')
{{-- mengisi yield content --}}
@section('content')
    <h1>About CV Karya Alam Abadi</h1>
    <div class="row">
        <div class="col-lg-12">
            @if (session()->has('pesan'))
                <div class="alert alert-success">
                    {{ session()->get('pesan') }}
                </div>
            @endif
    
            <a href="{{ route('about.create') }}" class="btn btn-primary mb-2">tambah</a>            
            <div class="table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>                            
                        </tr>
                    </thead>
                    @forelse ($about as $tentang)
                    <tbody>
                        <tr>
                            <td>{{ $loop->iteration }}</td>                            
                            <td>{{ $tentang->judul }}</td>
                            <td>{{ $tentang->deskripsi }}</td>
                            <td>
                                <img src="{{ url('img/about' . '/' . $tentang->gambar) }}" alt="" height="75">
                            </td>
                            <td>
                            <form action="{{ route('about.destroy', ['id' => $tentang->id]) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <a href="{{ route('about.edit', ['id' => $tentang->id]) }}" class="btn btn-info btn-sm">Edit</a>                            
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                        </tr>
                    @empty               
                        <tr>
                            <td class="text-center" colspan="7">Tidak ada data</td>
                        </tr>                        
                    </tbody>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@endsection