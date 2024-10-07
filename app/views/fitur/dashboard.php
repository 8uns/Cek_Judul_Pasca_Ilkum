<div class="container dashboard">
    <div class="row justify-content-end mb-3">
        <div class="col-9">
            <h3 class="border-bottom">
                <strong>
                    Cek Kemiripan
                </strong>
            </h3>
        </div>
    </div>


    <div class="row justify-content-end">
        <div class="col-9">

            <div class="row mb-5">
                <div class="col">
                    <div class="card" style="width: 100%;">
                        <div class="card-body text-center">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Cek Karya Ilmiyah
                            </button>


                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cek Karya Ilmiah</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Judul Penelitian</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="masukan judul">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">File Karya Ilmiah / Paper / Tugas Akhir / Skripsi / Tesis</label>
                                            <input type="file" class="form-control" id="exampleFormControlTextarea1" rows="3"></input>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Cek</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- <div class="row mb-5">
                <div class="col-4 text-center">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Paper Tersimpan</h5>
                            <hr>
                            <div class="row justify-content-md-center">
                                <div class="col-8">


                                    <br>
                                    <h1>
                                        <strong>
                                            <i class="fas fa-stream"></i>
                                        </strong>
                                    </h1>
                                    <h2 class="fw-bold" id="totalkrit">

                                    </h2>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div> -->



            <div class="row mb-2">
                <div class="col text-center">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Cek Judul Penelitian</h5>
                            <hr>
                            <div class="row justify-content-md-center">
                                <div class="col">
                                    <form action="<?= BASEURL ?>Dashboard/cekjudul" method="post">
                                        <div class="input-group mb-3">
                                            <input name="title" type="title" class="form-control" placeholder="Masukan judul penelitian">
                                            <input type="submit" value="Cek Judul" class="input-group-text btn-primary" id="basic-addon2">
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-2 justify-content-end">
                <div class="col">
                    <?php Flasher::flashAll() ?>
                </div>
            </div>

            <?php if (isset($data['judulmirip'])) : ?>
                <!-- <div class="row justify-content-end mt-3">
                    <div class="col">
                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                                <h5>Judul yang dicari:</h5>
                                <p>
                                    <u>
                                        <?= $data['judul_dicari'] ?>
                                    </u>
                                </p>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="row justify-content-end mt-1">
                    <div class="col">

                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                                <h5>
                                    Hasil pengecekan:
                                </h5>

                                <table id="" class="table  table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Judul</th>
                                            <th scope="col">Tahun</th>
                                            <th scope="col">Naskah</th>


                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $i = 1;
                                        foreach ($data['papersresult'] as $vals) :
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $i ?></th>
                                                <td><?= $vals['title'] ?></td>
                                                <td><?= $vals['years'] ?></td>
                                                <td>
                                                    <a target="_blank" href="<?= BASEURL . 'papers/file/' . $vals['document'] ?>">
                                                        Lihat
                                                    </a>
                                                </td>
                                                <td>

                                            </tr>





                                        <?php
                                            $i++;
                                        endforeach;
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            <?php endif; ?>

            <br>
            <br>
            <br>
        </div>
    </div>
</div>
</div>