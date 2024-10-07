


<div id="login" class="container mt-5">

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


    <div class="row justify-content-between mt-5 align-items-center">
        <div class="col">
            <img src="<?= BASEURL ?>img/login.png" alt="" width="90%">
        </div>
        <div class="col">
            <h2 class="border-bottom mb-4"><strong> Masuk ke DTS System</strong></h2>
            <form action="login/loggedin/member" method="post">
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
            <a href="register" class="stretched-link mt-5" style="position: relative;">Belum memiliki akun</a>
        </div>
    </div>
</div>

