

<div id="register" class="container-fluid bg-light pt-5 pb-5">
    <div class="row border-bottom">
        <div class="col text-center">
            <h2><strong> Registrasi Akun </strong></h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php Flasher::flashLogin() ?>
        </div>
    </div>


    <div class="row justify-content-center mt-5">
        <div class="col-md-7 col-11">

            <form action="register/create" method="post">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="" class="form-label">Username</label>
                            <input required name="username" type="text" class="form-control" id="" aria-describedby="" value="">
                            <div id="" class="form-text">Tidak boleh kosong</div>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input required name="password" type="password" class="form-control" id="">
                            <div id="" class="form-text"> Tidak boleh kosong</div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">

                        <div class="mb-3">
                            <label for="" class="form-label">Nomor Induk Mahasiswa</label>
                            <input required name="nim" type="text" class="form-control" id="" aria-describedby="" value="">
                            <div id="" class="form-text">Tidak boleh kosong</div>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Nama Lengkap</label>
                            <input required name="name" type="text" class="form-control" id="" aria-describedby="" value="">
                            <div id="" class="form-text">Tidak boleh kosong</div>
                        </div>



                    </div>


                    <div class="col">

                        <div class="mb-3">
                            <label for="" class="form-label">Jenis Kelamin</label>
                            <select name="gender" class="form-control" id="" aria-describedby="">
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                       
                       
                        <div class="mb-3">
                            <label for="" class="form-label">Telepon</label>
                            <input required name="phone" type="text" class="form-control" id="" aria-describedby="" value="">
                            <div id="" class="form-text">Tidak boleh kosong.</div>
                        </div>



                        <div class="mb-3">
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registermodal">
                            Registrasi Akun Baru</button>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="registermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Yakin sudah mengisi data dengan benar?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Ya</button>
                            </div>
                        </div>
                    </div>
                </div>




            </form>
        </div>
    </div>
</div>

