<?php include('header.php')?>


<body>
    <div class="container">
        <form action="dataBase/simpanData.php" method="POST">
            <h1 class="text-center justify-content-center">Sistem Akademik</h1>
            <div class="rounded-5 p-5" style="background-color: rgb(29, 206, 219);">
                <div class="col-md-6">
                    <div>
                        <p>Masukkan Nama:</p>
                        <input type="text" name="txt_name" />
                         <br /> <br />
                    </div>
                    <div class="col-md-6">
                        <div>
                            <label>NISN Anda:</label>
                            <input type="password" name="txt_nisn" />
                        </div>
                        <div>
                            <p>Nilai semester Anda?</p>
                            <input type="radio" id="A" value="A" name="nilai_sem"/>
                            <label for="A">A</label><br />
                            <input type="radio" id="B" value="B" name="nilai_sem"/>
                            <label for="B">B</label><br />
                            <input type="radio" id="C" value="C" name="nilai_sem"/>
                            <label for="C">C</label>
                        </div>
                        <div>
                            <p>Kelas Berapakah Anda?</p>
                            <select name="kelas" >
                                <option value="smp_vii">SMP VII</option>
                                <option value="smp_viii">SMP VIII</option>
                                <option value="smp_ix">SMP IX</option>
                            </select>
                        </div>
                        <br />
                        <div>
                            <p>Jadwal Terfavorit Anda</p>
                            <select name="fav_hari" >
                                <option value="Senin" >senin</option>
                                <option value="Selasa" >selas</option>
                                <option value="Rabu" >Rabu</option>
                                <option value="Kamis" >kamis</option>
                                <option value="Jumat" >jumat</option>
                            </select>
                        </div>
                        <br />
                        <div>
                            <p>Pengalaman selama belajar dari awal</p>
                            <textarea name="txt_pengalaman"></textarea>
                        </div>
                        <br /> <br />
                        <div>
                            Pelajaran Favorit Anda:
                            <input type="text" name="fav_mapel"/>
                        </div>
                        <br />
                        <div>
                            <p>Waktu Kehadiran Anda Minggu Ini</p>
                            <input type="checkbox" id="Snn" value="Senin" name="snn" />
                            <label for="Snn"> Senin</label><br />
                            <input type="checkbox" id="sls" value="Selasa" name="sls"/>
                            <label for="sls"> Selasa</label><br />
                            <input type="checkbox" id="rb" value="Rabu" name="rb"/>
                            <label for="rb"> Rabu</label><br />
                            <input type="checkbox" id="kms" value="Kamis" name="kms"/>
                            <label for="kms"> Kamis</label><br />
                            <input type="checkbox" id="jmt" value="Jumat" name="jmt" />
                            <label for="jmt"> Jumat</label><br />
                            <input type="checkbox" id="SBT" value="Sabtu" name="sbt"/>
                            <label for="SBT"> Sabtu</label><br />
                            <input type="checkbox" id="Mngg" value="Minggu" name="mngg"/>
                            <label for="Mngg"> Minggu</label><br />
                        </div>
                        <br />
                        <div>
                            <p>Fasilitas Favorit</p>
                            <input type="textbox" name= "fasilitas"/> <br /> <br />
                        </div>
                        <div>
                            <select class="form-select mb-3" id="asal" name="asal">
                                <option value="">Asal</option>
                                <option value="indonesia">Indonesia</option>
                                <option value="internasional">Another Country</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit">Kirim </button>
                <button type="reset">reset </button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

