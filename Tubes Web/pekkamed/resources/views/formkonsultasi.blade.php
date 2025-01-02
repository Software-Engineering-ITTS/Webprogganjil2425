<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Pasien</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <style>
        body {
            font-family: 'Trebuchet MS', Arial, sans-serif;
            background: url('https://th.bing.com/th/id/OIP.6Zg0f7hxOWIb98gXH_r7fAHaLG?pid=ImgDet&w=474&h=710&rs=1');
        }

        .card-custom {
            padding: 25px;
            background-color: rgb(239, 247, 255);
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header-custom {
            background-color: #d9e0e800;
            color: rgb(29, 27, 27);
            font-size: 1.25rem;
            text-align: center;
            border-radius: 15px 15px 0 0;
        }

        .form-group label {
            font-weight: bold;
        }

        .submit {
            background-color: transparent;
            color: black;
            border-radius: 5px;
            width: 100px;
            height: 35px;
            font-family: 'Trebuchet MS', Arial, sans-serif;
        }

        .submit:hover {
            background-color: rgba(66, 114, 177, 0.669);
            transition: 0.3s;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            {{-- Card 1 --}}
            <div class="col-md-6 mb-4">
                <div class="card card-custom">
                    <div class="card-header card-header-custom">
                        <h3>Patient's Personal Data</h3>
                        @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    </div>
                    <div class="card-body">
                        <br>

                        <form action="{{ route('formkonsultasi')}}" method="POST">
                            @csrf
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" id="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat / Domisili</label>
                                <textarea name="alamat" rows="3" class="form-control" id="alamat" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="tempat_kelahiran">Tempat Kelahiran</label>
                                <textarea name="tempat_kelahiran" rows="2" class="form-control" id="tempat_kelahiran"
                                    required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <div class="form-check">
                                    <input type="radio" name="gender" value="Laki-Laki" class="form-check-input" id="gender-l"
                                        required>
                                    <label class="form-check-label" for="gender-l">Laki Laki</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="gender" value="Perempuan" class="form-check-input" id="gender-p"
                                        required>
                                    <label class="form-check-label" for="gender-p">Perempuan</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="umur">Rentang Usia</label>
                                <select name="umur" class="form-control" id="umur"required>
                                    <option value="1-5 Tahun">1-5 Tahun</option>
                                    <option value="6-10 Tahun">6-10 Tahun</option>
                                    <option value="11-15 Tahun">11-15 Tahun</option>
                                    <option value="16-20 Tahun">16-20 Tahun</option>
                                    <option value="21-25 Tahun">21-25 Tahun</option>
                                    <option value="26-30 Tahun">26-30 Tahun</option>
                                    <option value="31-35 Tahun">31-35 Tahun</option>
                                    <option value="36-40 Tahun">36-40 Tahun</option>
                                    <option value="41-45 Tahun">41-45 Tahun</option>
                                    <option value="46-50 Tahun">46-50 Tahun</option>
                                    <option value="51-55 Tahun">51-55 Tahun</option>
                                    <option value="56-60 Tahun">56-60 Tahun</option>
                                    <option value="60++ Tahun">60++ Tahun</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id">Pilih Dokter</label>
                                <select name="id" class="form-control" id="id" required>
                                    <option value="">Pilih Dokter</option>
                                    @foreach ($doctors as $doctor )
                                        <option value="{{ $doctor->id}}">
                                            {{ $doctor->nama}} - {{ $doctor->spesialis}} ({{ $doctor->hari}} - {{ $doctor->waktu}})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        {{-- </form> --}}
                    </div>
                </div>
            </div>

            {{-- card 2 --}}
            <div class="col-md-6">
                <div class="card card-custom">
                    <div class="card-header card-header-custom">
                        <h3>Complaint and Consultation Data</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="keluhan">Keluhan</label>
                                <textarea name="keluhan" rows="6" class="form-control" id="keluhan" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Kondisi Saat Ini</label>
                                <div class="form-check">
                                    <input type="radio" name="kondisi" value="Rentang Normal" class="form-check-input"
                                        id="btncheck1">
                                    <label class="form-check-label" for="btncheck1">Rentang Normal</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="kondisi" value="Merasakan Sakit" class="form-check-input"
                                        id="btncheck2">
                                    <label class="form-check-label" for="btncheck2">Merasakan Sakit</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="kondisi" value="Sakit Berlebihan" class="form-check-input"
                                        id="btncheck3">
                                    <label class="form-check-label" for="btncheck3">Sakit Berlebihan</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Butuh Konsultasi Secara Langsung?</label>
                                <div class="form-check">
                                    <input type="radio" name="konsultasi" value="Ya" class="form-check-input" id="konsultasi-ya"
                                        required onclick="toggleAntrean(true)">
                                    <label class="form-check-label" for="konsultasi-ya">Ya</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="konsultasi" value="Tidak" class="form-check-input"
                                        id="konsultasi-tidak" required onclick="toggleAntrean(false)">
                                    <label class="form-check-label" for="konsultasi-tidak">Tidak</label>
                                </div>
                            </div>
                            <div class="form-group" id="antrean-group" style="display: none;">
                                <label>Ambil Antrean</label>
                                <div class="form-check">
                                    <input type="radio" name="antrean" value="Normal" class="form-check-input" id="antrean-normal">
                                    <label class="form-check-label" for="antrean-normal">Normal</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="antrean" value="Slight Emergency" class="form-check-input" id="antrean-slight">
                                    <label class="form-check-label" for="antrean-slight">Slight Emergency</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="antrean" value="Emergency" class="form-check-input" id="antrean-emergency">
                                    <label class="form-check-label" for="antrean-emergency">Emergency</label>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary submit">Submit</button>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleAntrean(show) {
            const antreanGroup = document.getElementById('antrean-group');
            if (show) {
                antreanGroup.style.display = 'block';
            } else {
                antreanGroup.style.display = 'none';
            }
        }

        // function hanyaSatu(checkbox) {
        //     let checkboxes = document.getElementsByName(checkbox.name);
        //     for (let i = 0; i < checkboxes.length; i++) {
        //         if (checkboxes[i] !== checkbox) {
        //             checkboxes[i].checked = false;
        //         }
        //     }
        // }
    </script>
</body>

</html>
