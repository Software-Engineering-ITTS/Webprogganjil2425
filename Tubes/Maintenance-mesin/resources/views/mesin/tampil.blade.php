@extends('layout')

@section('konten')

<div class="d-flex">
    <h4 class="text-center">List Sparepart Mesin Mobil</h4>
    {{-- <div class="ms-auto">
        <a class="btn btn-success" href="{{ route('mesin.tambah') }}">Tambah Mesin</a>
    </div> --}}
</div>

<table class="table">
    <tr>
        <th>No</th>
        <th>Nomor Mesin</th>
        <th>Nama Mesin</th>
        <th>Spare Part </th>
        <th>Fungsi Mesin</th>
        <th>Deskripsi/Keterangan</th>
        <th>Aksi</th>
    </tr>

    @foreach ($mesin as $no=> $data)
    <tr>
        <td>{{ $no+1 }}</td>
        <td>{{ $data->no_mesin }}</td>
        <td>{{ $data->nama_mesin }}</td>
        <td>{{ $data->sparepart_mesin }}</td>
        <td>{{ $data->fungsi_mesin }}</td>
        <td>{{ $data->deskripsi }}</td>
        <td>
            <a href="{{ route('mesin.edit', $data->mesin_id)}}" class="btn btn-warning">Edit</a>
            <form action="{{ route('mesin.delete', $data->mesin_id)}}" method="POST" style="display:inline;">
                @csrf
                <button class="btn btn-sm btn-danger">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection
