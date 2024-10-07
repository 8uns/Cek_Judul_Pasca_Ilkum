<div class="container sidebar">
  <div class="row">
    <div class="col-3">

      <ul class="nav flex-column">
        <li class="nav-item pb-2">
          <a class="nav-link <?php if ($data['judul'] == 'dashboard') : echo 'active';
                              endif; ?>" aria-current="page" href="<?= BASEURL ?>dashboard">
            <i class="fas fa-search"></i>
            Cek Kemiripan</a>
        </li>

        <li class="nav-item pb-2">
          <a class="nav-link <?php if ($data['judul'] == 'papers') : echo 'active';
                              endif; ?>" href="<?= BASEURL ?>papers">
            <i class="fas fa-file-alt"></i>
            Karya Ilmiah</a>
        </li>


        <li class="nav-item pb-2">
          <a class="nav-link <?php if ($data['judul'] == 'profil') : echo 'active';
                              endif; ?>" href="<?= BASEURL ?>profil">
            <i class="fas fa-user-circle"></i>
            Akun</a>
        </li>

        <li class="nav-item pb-2">
          <a class="nav-link" href="<?= BASEURL ?>logout/logout">
            <i class="fas fa-sign-out-alt"></i>
            Logout</a>
        </li>

        <li class="nav-item pb-2">
          <img src="<?= BASEURL ?>img/back.png" alt="" width="90%">
        </li>

      </ul>
    </div>
  </div>
</div>