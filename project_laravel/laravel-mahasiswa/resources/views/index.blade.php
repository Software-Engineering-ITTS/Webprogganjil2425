<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Example-App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="max-width: 100wh">
    <div class="row">
        <div class="col-md-8">
            <h3>Form Mahasiswa</h3>
            <form id="mahasiswaForm" action="/index" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input type="hidden" name="id" id="id">
                <div class="mb-3 row">
                    <label for="image" class="col-1 col-form-image">Image</label>
                    <div class="col-md-6">
                        <input type="file" class="form-control" name="image" id="image" value=""
                            required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nim" class="col-1 col-form-nim">NIM</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="nim" id="nim" value=""
                            required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-1 col-form-nama">Nama</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="nama" id="nama" value=""
                            required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="prodi" class="col-1 col-form-prodi">Prodi</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="prodi" id="prodi" value=""
                            required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="fakultas" class="col-1 col-form-fakultas">Fakultas</label>
                    <div class="col-md-6">
                        <select class="form-select" name="id_fakultas" id="id_fakultas"
                            aria-label="Default select example" required>
                            <option value=""></option>
                            @foreach ($fakultas as $fak)
                                <option value="{{ $fak->id }}">{{ $fak->nama_fakultas }} | {{ $fak->deskripsi }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat" class="col-1 col-form-alamat">Alamat</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="alamat" id="alamat" value=""
                            required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        <div class="col-md-4">
            <h3>Form Fakultas</h3>
            <form id="fakultasForm" action="/fakultas" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input type="hidden" name="id" id="id">
                <div class="mb-3 row">
                    <label for="nama_fakultas" class="col-2 col-form-nama-fakultas">Nama Fakultas</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="nama_fakultas" id="nama_fakultas"
                            value="" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="deskripsi" class="col-2 col-form-deskripsi">Deskripsi</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="deskripsi" id="deskripsi" value=""
                            required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

    <table class="table">
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

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const editButtons = document.querySelectorAll('.edit-btn');
            const form = document.getElementById('mahasiswaForm');

            editButtons.forEach(button => {
                button.addEventListener('click', (event) => {
                    event.preventDefault(); // Hindari reload halaman

                    const id = button.dataset.id;

                    // Update action URL dan method untuk edit
                    form.action = `/index/${id}`;
                    form.querySelector('input[name="_method"]').value = 'PUT'; // Laravel PUT method

                    // Isi form dengan data
                    form.id.value = id;
                    form.nim.value = button.dataset.nim || ''; // Hindari "undefined"
                    form.nama.value = button.dataset.nama || '';
                    form.prodi.value = button.dataset.prodi || '';
                    const fakultasSelect = form.querySelector('select[name="id_fakultas"]');
                    const fakultasId = button.dataset
                        .id_fakultas; // Pastikan tombol edit memiliki data-id_fakultas
                    fakultasSelect.value = fakultasId;
                    form.alamat.value = button.dataset.alamat || '';
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', (event) => {
                    event.preventDefault();

                    const id = button.dataset.id;

                    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                        // Buat form untuk mengirimkan request DELETE
                        const form = document.createElement('form');
                        form.action = `/index/${id}`;
                        form.method = 'POST';

                        // Tambahkan CSRF token dan metode DELETE
                        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
                        const csrfInput = document.createElement('input');
                        csrfInput.type = 'hidden';
                        csrfInput.name = '_token';
                        csrfInput.value = csrfToken;

                        const methodInput = document.createElement('input');
                        methodInput.type = 'hidden';
                        methodInput.name = '_method';
                        methodInput.value = 'DELETE';

                        form.appendChild(csrfInput);
                        form.appendChild(methodInput);

                        // Tambahkan form ke body dan submit
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/js/all.min.js"
        integrity="sha512-1JkMy1LR9bTo3psH+H4SV5bO2dFylgOy+UJhMus1zF4VEFuZVu5lsi4I6iIndE4N9p01z1554ZDcvMSjMaqCBQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
