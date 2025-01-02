<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Doctor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            /* background-color: #4688ca; */
            background: url('https://th.bing.com/th/id/OIP.MA7RR_zGcNh7SZ0J25tl6wAAAA?rs=1&pid=ImgDetMain')
        }

        .container {
            margin-top: 50px;
        }

        .card-custom {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgb(22, 2, 103);
            margin-bottom: 20px;
        }

        .form-group label {
            color: #495057;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="row">
            {{-- card kiri untuk input data --}}
            <div class="col-md-4">
                <div class="card card-custom">
                    <h5 class="text-center">Schedule Doctor</h5>
                    <div id="error-messages">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif


                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                    <form action="{{ route('schedule') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Name</label>
                            <input type="text" name="nama" class="form-control" id="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="hari">Working Day</label>
                            <input type="date" name="hari" class="form-control" id="hari" required>
                        </div>
                        <div class="form-group">
                            <label for="waktu">Practice Hours</label>
                            <input type="time" name="waktu" class="form-control" id="waktu" required>
                        </div>
                        <div class="form-group">
                            <label for="spesialis">Specialist</label>
                            <input type="text" name="spesialis" class="form-control" id="spesialis" rows="3"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            {{-- card kanan untuk tampilan input --}}
            <div class="col-md-8">
                <div class="card card-custom">
                    <div class="card-header" style="background-color: transparent">
                        <h5 class="text-center">View Schedule Doctor</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID Doctor</th>
                                    <th>Name</th>
                                    <th>Working Day</th>
                                    <th>Practice Hours</th>
                                    <th>Specialist</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($schedules as $schedule)
                                    <tr>
                                        <td>{{ $schedule->id }}</td>
                                        <td>{{ $schedule->nama }}</td>
                                        <td>{{ $schedule->hari }}</td>
                                        <td>{{ $schedule->waktu }}</td>
                                        <td>{{ $schedule->spesialis }}</td>
                                        <td>

                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal-{{ $schedule->id}}"> Update</button>

                                            {{-- untuk update --}}

                                            <div class="modal fade" id="editModal-{{ $schedule->id}}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form action="{{ route('schedule.update', $schedule->id)}}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title">Update Schedule</h6>
                                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="nama">Name</label>
                                                                    <input type="text" name="nama" class="form-control" value="{{ $schedule->nama }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="hari">Working Day</label>
                                                                    <input type="date" name="hari" class="form-control" id="hari" value="{{ $schedule->hari }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="waktu">Practice Hours</label>
                                                                    <input type="time" name="waktu" class="form-control" id="waktu" value="{{ $schedule->waktu }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="spesialis">Specialist</label>
                                                                    <input type="text" name="spesialis" class="form-control" value="{{ $schedule->spesialis }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Save Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            {{-- untuk hapus --}}
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{ $schedule->id }}">Delete</button>
                                            <div class="modal fade" id="deleteModal-{{ $schedule->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form action="{{ route('schedule.destroy', $schedule->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title">Konfirmasi</h6>
                                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Yakin ingin menghapus <strong>{{ $schedule->nama }}</strong> dari daftar schedule dokter?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>


                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Data Tidak Ditemukan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        // $(document).ready(function() {
        //     $("form").on("submit", function(e) {
        //         e.preventDefault();

        //         $.ajax({
        //             url: "{{ route('schedule') }}",
        //             method: "POST",
        //             data: $(this).serialize(),
        //             success: function(response) {

        //                 alert(response.success);

        //                 $('tbody').html(response.schedules);
        //             },
        //             error: function(xhr) {

        //                 alert('Terjadi kesalahan saat mengirim data');
        //             }
        //         });
        //     });
        // });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
