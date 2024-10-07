<div class="container">
    <div class="row justify-content-end mb-3">
        <div class="col-9">
            <h3 class="border-bottom"><strong>Karya Ilmiah</strong></h3>
        </div>
    </div>

    <div class="row justify-content-end">
        <div class="col-9">
            <?php Flasher::flashAll() ?>
        </div>
    </div>

    <div class="row justify-content-end">
        <div class="col-9">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahdata">
                <i class="fas fa-user-plus"></i>
                Tambah Paper baru
            </button>

        </div>
    </div>
    <div class="row justify-content-end mt-3">
        <div class="col-9">

            <div class="card" style="width: 100%;">
                <div class="card-body">

                    <table id="tableSearch" class="table  table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Naskah</th>

                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $i = 1;
                            foreach ($data['papers'] as $vals) :
                            ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $vals['title'] ?></td>
                                    <td><?= $vals['years'] ?></td>
                                    <td>
                                        <a target="_blank" href="<?= BASEURL . 'papers/file/' . $vals['document'] ?>">
                                            <?= $vals['document'] ?>
                                        </a>
                                    </td>
                                    <td>


                                        <button title="Perbarui data Paper" type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-target="#update<?= $vals['paper_id'] ?>"><i class="fas fa-pen-square"></i></button>
                                        <button title="Hapus data Paper" type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-toggle="tooltip" data-bs-target="#hapus<?= $vals['paper_id'] ?>"><i class="fas fa-trash-alt"></i></button>

                                        <!-- Modal Hapus-->
                                        <div class="modal fade" id="hapus<?= $vals['paper_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Paper</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Yakin ingin menghapus Paper <?= $vals['title'] ?>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a href="<?= BASEURL ?>Papers/delete/<?= $vals['paper_id'] ?>" type="button" class="btn btn-primary">Ya</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>




                                <!-- Modal Update Paper-->
                                <div class="modal fade" id="update<?= $vals['paper_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <form action="<?= BASEURL ?>Papers/update/<?= $vals['paper_id'] ?>" method="post" enctype="multipart/form-data">

                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Memperbarui Karya Ilmiah</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Judul Penelitian</label>
                                                        <input required value="<?= $vals['title'] ?>" name="title" class="form-control" id="">
                                                        <div id="" class="form-text text-danger">Tidak boleh kosong</div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Tahun</label>
                                                        <select required name="years" class="form-select" id="">
                                                            <?php $tahun = 2020;
                                                            for ($tahun; $tahun <= date("Y"); $tahun++) : ?>
                                                                <option <?= $vals['years'] == $tahun ? 'selected=selected' : '' ?> value="<?= $tahun ?>"> <?= $tahun ?> </option>
                                                            <?php endfor; ?>
                                                        </select>
                                                        <div id="" class="form-text text-danger">Tidak boleh kosong</div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Dokumen Penelitian</label>
                                                        <input type="file" name="document" class="form-control" id="">
                                                        <input type="hidden" name="document_old" value="<?= $vals['document'] ?>" class="form-control" id="">

                                                        <div id="" class="form-text text-secondary">Biarkan kosong jika tidak ingin memperbarui file.</div>
                                                        <div id="" class="form-text text-secondary">File diharuskan bertipe pdf dengan maksimum ukuran 5MB.</div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Perbarui</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
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
</div>



<!-- Modal tambah Paper -->
<div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="<?= BASEURL ?>Papers/create" method="post" enctype="multipart/form-data">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Menambahkan Karya Ilmiah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="" class="form-label">Judul Penelitian</label>
                        <input required name="title" class="form-control" id="">
                        <div id="" class="form-text text-danger">Tidak boleh kosong</div>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Tahun</label>
                        <select required name="years" class="form-select" id="">
                            <?php $tahun = 2020;
                            for ($tahun; $tahun <= date("Y"); $tahun++) : ?>
                                <option value="<?= $tahun ?>"> <?= $tahun ?> </option>
                            <?php endfor; ?>
                        </select>
                        <div id="" class="form-text text-danger">Tidak boleh kosong</div>
                    </div>


                    <div class="mb-3">
                        <label for="" class="form-label">Dokumen Penelitian</label>
                        <input type="file" name="document" class="form-control" id="">
                        <div id="" class="form-text text-secondary">File diharuskan bertipe pdf dengan maksimum ukuran 5MB.</div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </div>
        </form>

    </div>
</div>

<br>
<br>
<br>