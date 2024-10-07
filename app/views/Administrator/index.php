<div class="col-12">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php Flasher::flash() ?>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-12">
                <!-- Button trigger modal -->
                <button type="button" class="tombolTambahDataAnggota btn btn-primary" data-toggle="modal" data-target="#formModal">
                    Tambah Data Administrator
                </button>
                <!-- Modal -->
                <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="formModalLabel">Tambah Data Anggota</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <!-- form input -->
                            <form id="form" class="form" action="<?= BASEURL ?>administrator/tambah" method="post" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Nama Anggota</label>
                                        <input id="name" required name="name" type="text" class="form-control" id="formGroupExampleInput" placeholder="name . . .">
                                        <small class="text-danger form-text">* wajib di input</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Username</label>
                                        <input id="username" required name="username" type="text" class="form-control" id="formGroupExampleInput" placeholder="username . . .">
                                        <small class="text-danger form-text">* wajib di input</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Level</label>
                                        <select id="level" name="level" class="custom-select" id="inputGroupSelect01">
                                            <option selected>level...</option>
                                            <option value="0">Superadmin</option>
                                            
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Password</label>
                                        <input id="password" required name="password" type="password" class="form-control" id="formGroupExampleInput" placeholder=". . .">
                                        <small id="smallpassword" class="text-danger form-text">* wajib di input</small>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="main-content col-12">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th class="text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['members'] as $members) : ?>



                            <tr>
                                <td scope="row">
                                    <?= $members['name'] ?>
                                </td>
                                <td scope="row">
                                    <?= $members['username'] ?>
                                </td>
                                <td scope="row">
                                    <?= $members['levels'] ?>
                                </td>


                                <td class="text-right">

                                    <a href="#" data-id="<?= $members['administrator_id'] ?>" data-toggle="modal" data-target="#formModal" class="tampilUbahAdministrator badge badge-warning ml-2">Update</a>

                                    <a class="badge badge-danger ml-2" href="<?= BASEURL . 'administrator/hapus/' . $members['administrator_id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini!');">Hapus</a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>





            </div>
        </div>
    </div>
</div>