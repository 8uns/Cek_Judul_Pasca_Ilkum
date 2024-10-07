<div class="container dashboard">
    <div class="row justify-content-end mb-3">
        <div class="col-9">
            <h3 class="border-bottom"><strong> Dashboard</strong></h3>
        </div>
    </div>
    <?php
    if ($_SESSION['level'] > 1) :
        if (isset($data['antrian'][0]['number_que']) && ($data['antrian'][0]['status'] == 0 || $data['antrian'][0]['status'] == 5)) :

    ?>
            <div class="row justify-content-end">
                <div class="col-9">
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-danger" role="alert">
                                <i class="fas fa-exclamation-triangle"></i>
                                Harap laporakan kehadiran anda kepada petugas, jika anda sudah berada di klinik.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        endif;
    endif;
    ?>
    <div class="row justify-content-end">
        <div class="col-9">
            <div class="row mt-3">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="card border-secondary mb-3" style="max-width:100%;">
                                <div class="card-header">Jumlah antrian</div>
                                <div class="card-body text-secondary text-center">
                                    <!-- <h5 class="card-title">Secondary card title</h5> -->
                                    <h1 class="card-text display-1"><?= count($data['allAntrian']) ?></h1>
                                </div>
                            </div>
                        </div>

                        <?php
                        if ($_SESSION['level'] > 1) :


                            if (isset($data['antrian'][0]['number_que'])) :
                        ?>

                                <div class="col">
                                    <div class="card border-secondary mb-3" style="max-width:100%;">
                                        <div class="card-header">Nomor antrian</div>
                                        <div class="card-body text-secondary text-center">
                                            <!-- <h5 class="card-title">Secondary card title</h5> -->

                                            <h1 class="card-text display-1"><?php echo $data['antrian'][0]['number_que']; // $data['antrian']['number_que'] 
                                                                            ?></h1>
                                        </div>
                                    </div>
                                </div>


                        <?php
                            endif;
                        endif;
                        ?>
                    </div>
                </div>



                <div class="col-10">
                    <!-- <h3>Daftar Antrian </h3> -->

                    <div class="card border-secondary mb-3" style="max-width:100%;">
                        <div class="card-header">Daftar Antrian</div>

                        <div class="card" style="width: 100%;">
                            <div class="card-body ">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Nomor Antrian</th>
                                            <th scope="col">Waktu membuat antrian</th>
                                            <th scope="col">Kehadiran</th>
                                            <th scope="col">Status</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $i = 1;
                                        foreach ($data['allAntrian'] as $key => $val) {
                                        ?>
                                            <tr <?php if ($_SESSION['level'] != 0 && isset($_SESSION['member_id'])) {
                                                    if ($val['member_id'] == $_SESSION['member_id']) {
                                                        echo "style='color:red; font-weight:bold;'";
                                                    }
                                                } ?>>
                                                <th scope="row"><?= $i ?></th>
                                                <td><?= $val['dates'] ?></td>
                                                <td><?= $val['number_que'] ?></td>
                                                <td><?= $val['times'] ?></td>
                                                <td>
                                                    <?php
                                                    if ($val['status'] == 1 || $val['status'] == 5) {
                                                        echo "Hadir";
                                                    } else {
                                                        echo "Belum Ada";
                                                    }
                                                    ?>
                                                </td>

                                                <td><?php
                                                    if ($_SESSION['level'] > 1) {
                                                        if ($val['member_id'] == $_SESSION['member_id'] && $i == 5) {
                                                            echo "Konfirmasi Antrian";
                                                        } elseif ($val['status'] == 1) {
                                                            echo "Pemeriksaan";
                                                        } elseif ($val['status'] == 0 || $val['status'] == 5) {
                                                            echo "Menunggu";
                                                        }
                                                    } else {
                                                        if ($val['status'] == 1) {
                                                            echo "Pemeriksaan";
                                                        } elseif ($val['status'] == 0 || $val['status'] == 5) {
                                                            echo "Menunggu";
                                                        }
                                                    }

                                                    ?></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }

                                        ?>


                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
</div>
</div>