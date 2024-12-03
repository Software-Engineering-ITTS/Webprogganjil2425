<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Image</th>
            <th scope="col">NIM</th>
            <th scope="col">Nama</th>
            <th scope="col">Prodi</th>
            <th scope="col">Alamat</th>
            <th scope="col">Fakultas</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <th><!-- Cek apakah gambar ada -->
                    @if ($item->image)
                        <!-- Menampilkan gambar -->
                        <img src="{{ asset('storage/' . $item->image) }}" alt="Gambar {{ $item->nama }}"
                            width="50">
                    @else
                        <span>Tidak Ada Gambar</span>
                    @endif
                </th>
                <td>{{ $item->nim }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->prodi }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->fakultas->nama_fakultas ?? 'Tidak Ada' }}</td>
                <td><a href="javascript:void(0)" class="edit-btn" data-id="{{ $item->id }}"
                        data-image="{{ $item->image }}" data-nim="{{ $item->nim }}"
                        data-nama="{{ $item->nama }}" data-prodi="{{ $item->prodi }}"
                        data-id_fakultas="{{ $item->fakultas->id ?? '' }}" data-alamat="{{ $item->alamat }}">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                    &nbsp;
                    <a href="javascript:void(0)" class="delete-btn" data-id="{{ $item->id }}">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


<!-- Menambahkan pagination -->
<div>
    {{ $data->links('pagination::bootstrap-5') }}
</div>

<!--'pagination::bootstrap-5' -->
