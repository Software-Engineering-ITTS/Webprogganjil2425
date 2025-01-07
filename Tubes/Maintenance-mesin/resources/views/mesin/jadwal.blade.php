@extends('layout')

@section('konten')

<div class="container mt-5">

    <!-- Menampilkan pesan sukses jika ada -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Schedule Maintenance Form -->
    <h1 class="text-center mb-4">Form Penjadwalan Maintenance</h1>
    <form action="{{ route('jadwal.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="mesin_id" class="form-label">Pilih Mesin</label>
            <select class="form-select" id="mesin_id" name="mesin_id" required>
                <option value="">-- Pilih Mesin --</option>
                @foreach ($mesins as $mesin)
                    <option value="{{ $mesin->mesin_id }}">{{ $mesin->nama_mesin }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="maintenance_date" class="form-label">Jadwal Maintenance</label>
            <input type="date" class="form-control" id="maintenance_date" name="maintenance_date" required>
        </div>

        <!-- Status Maintenance -->
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="Pending">Pending</option>
                <option value="In Progress">In Progress</option>
                <option value="Completed">Completed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Jadwalkan Maintenance</button>
    </form>

    <!-- Tabel Daftar Jadwal Maintenance -->
    <h2 class="text-center mt-5 mb-4">Daftar Jadwal Maintenance</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mesin</th>
                <th>Tanggal Maintenance</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($jadwal as $no => $item)
                <tr>
                    <td>{{ $no+1 }}</td>
                    <td>{{ $item->mesin->nama_mesin }}</td>
                    <td>{{ $item->maintenance_date }}</td>
                    <td>{{ $item->status }}</td>

                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada jadwal maintenance</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection


