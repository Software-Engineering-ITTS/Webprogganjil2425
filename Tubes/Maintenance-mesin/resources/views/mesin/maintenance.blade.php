@extends('layout')

@section('konten')
<div class="container mt-5">

    <!-- Menampilkan pesan sukses jika ada -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Daftar Jadwal Maintenance -->
    <h2 class="text-center mt-5 mb-4">Daftar Jadwal Maintenance</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mesin</th>
                <th>Tanggal Maintenance</th>
                <th>Status</th>
                <th>Teknisi</th>
                <th>Deskripsi Perawatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($maintenanceRecords as $no => $data)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $data->mesin->nama_mesin }}</td>
                    <td>{{ $data->maintenance_date }}</td>
                    <td>
                        <!-- Form Update Status -->
                        <form action="{{ route('maintenance.updateStatus', $data->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                <option value="Pending" {{ $data->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="In Progress" {{ $data->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="Completed" {{ $data->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <!-- Form Update Teknisi -->
                        <form action="{{ route('maintenance.updateTeknisi', $data->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="teknisi_id" class="form-select form-select-sm" onchange="this.form.submit()">
                                <option value="">-- Pilih Teknisi --</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $data->teknisi_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </td>
                    <td>
                        <!-- Form Update Deskripsi -->
                        <form action="{{ route('maintenance.updateDeskripsi', $data->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" name="deskripsi_perawatan" value="{{ $data->deskripsi_perawatan }}"
                                   class="form-control form-control-sm" placeholder="Tambahkan deskripsi"
                                   onblur="this.form.submit()">
                        </form>
                    </td>
                    <td>
                        <!-- Form Hapus Data -->
                        <form action="{{ route('maintenance.delete', $data->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data maintenance</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
