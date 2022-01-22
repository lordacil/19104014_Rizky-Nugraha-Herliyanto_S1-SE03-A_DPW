@extends('base')
@section('content')
<h1>Product</h1>
<div class="row">
    <div class="col-lg-12">
        @if (session()->has('pesan'))
            <div class="alert alert-success">
                {{ session()->get('pesan') }}
            </div>
        @endif

        <a href="{{ route('product.create') }}" class="btn btn-primary mb-2">tambah</a>            
        <div class="table-responsive">
            <table class="table table-hover" id="myTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Ukuran</th>
                        <th>Gambar</th>                            
                    </tr>
                </thead>
                @forelse ($product as $pr)
                <tbody>
                    <tr>
                        <td>{{ $loop->iteration }}</td>                            
                        <td>{{ $pr->nama }}</td>
                        <td>{{ $pr->ukuran }}</td>
                        <td>
                            <img src="{{ url('img/product' . '/' . $pr->gambar) }}" alt="" height="75">
                        </td>
                        <td>
                        <form action="{{ route('product.destroy', ['id' => $pr->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <a href="{{ route('about.edit', ['id' => $pr->id]) }}" class="btn btn-info btn-sm">Edit</a>                            
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