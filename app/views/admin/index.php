<div class="background-login p-4 pb-5 mt-5 w-100 h-100">
    <div id="login admin" class="container mt-5 pt-5 pb-5 pr-5 pl-5">

        <!-- <div class="row border-bottom">
        <div class="col text-center">
            <h2><strong> Masuk</strong></h2>
        </div>
    </div> -->

        <div class="row">
            <div class="col">
                <?php Flasher::flashAll() ?>
            </div>
        </div>


        <div class="row justify-content-center mt-5 align-items-center">
            <!-- <div class="col"> -->
            <!-- <img src="<?= BASEURL ?>img/admin.png" alt="" width="90%"> -->
            <!-- </div> -->
            <div class="col-5">
                <h3 class="border-bottom mb-4"><strong> <i class="fab fa-keycdn"></i> Sistem Deteksi Plagiarisme</strong></h3>
                <form action="login/loggedin" method="post">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input required name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input required name="password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>

                    <button type="submit" class="btn btn-primary">Masuk</button>
                </form>

            </div>

        </div>
    </div>






    <!-- <div class="container mt-5">
    <div class="row justify-content-around align-items-center pb-5 border-top border-secondary">
        <div class="col">
            <a class="navbar-brand" href="#">
                <strong> <i class="fab fa-accessible-icon"></i> Klinik
                </strong>.kesehatan
            </a>
        </div>
        <div class="col text-end">
            Copyright @2021 klinik.kesehatan
        </div>
    </div>
</div> -->
</div>