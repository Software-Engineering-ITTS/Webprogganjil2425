@extends('index')

@section('content')

<h1>Daftar Buku</h1>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Judul Buku</th>
            <th>Penulis Buku</th>
            <th>Tanggal Terbit</th>
            <th>Cover Buku</th>
            <th>Harga Buku</th>
            <th>Stok Buku</th>
            <th>Aksi</th>
        </tr>
    </thead>
    
    <tbody>
        @forelse ($stokbuku as $buku)
            <tr>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ $buku->tanggal }}</td>
                <td>
                    <img src="{{ asset('storage/' . $buku->cover) }}" alt="Cover Buku" width="100">
                </td>
                <td>{{ number_format($buku->harga, 2) }}</td>
                <td>{{ $buku->stock }}</td>
                <td>
                    
                    <button class="btn btn-warning" data-toggle="modal" data-target="#editModal-{{ $buku->id }}">Edit</button>
                    
                   
                    <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                    </form>
                    
                    
                    <div class="modal fade" id="editModal-{{ $buku->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="{{ route('buku.update', $buku->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label>Judul Buku</label>
                                            <input type="text" name="judul" value="{{ $buku->judul }}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>Penulis Buku</label>
                                            <input type="text" name="penulis" value="{{ $buku->penulis }}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>Tanggal Terbit</label>
                                            <input type="date" name="tanggal" value="{{ $buku->tanggal }}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>Harga Buku</label>
                                            <input type="text" name="harga" value="{{ $buku->harga }}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>Stok Buku</label>
                                            <input type="text" name="stock" value="{{ $buku->stock }}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>Cover Buku</label>
                                            <input type="file" name="cover" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Update</button>
                                        <button type="submit" class="btn btn-primary">Buku</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Tidak ada data buku.</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
