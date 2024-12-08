@extends('layouts.app') {{-- Panggil layout utama --}}

@section('title', 'index Buku') {{-- Judul halaman --}}

@section('content') {{-- Konten khusus untuk halaman ini --}}

    
    <div>
        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach($bukuses as $buku)
                <tr>
                    <td>{{$buku->judul}}</td>
                    <td>{{$buku->deskripsi}}</td>
                    <td>
                      @if ($buku -> foto)
                      <img src="{{Storage::url($buku->foto)}}" alt="judl"></td>
                      @endif
                    <td>{{$buku->stok}}</td>
                    <td>{{$buku->harga}}</td>
                    <td>
                        <!-- Tombol Edit -->
                        <a href="{{ route('ListBuku.edit', $buku->id) }}">
                            <button>Edit</button>
                        </a>
                        
                        <!-- Tombol Hapus -->
                        <form action="{{ route('ListBuku.destroy', $buku->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{route('ListBuku.create')}}">Tambah Buku</a>
@endsection