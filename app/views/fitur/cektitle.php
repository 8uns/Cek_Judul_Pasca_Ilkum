  <main class="main">

      <!-- Page Title -->
      <div class="page-title light-background">
          <div class="container d-lg-flex justify-content-between align-items-center">
              <h1 class="mb-2 mb-lg-0">Check Research Title</h1>
              <nav class="breadcrumbs">
                  <ol>
                      <li><a href="index.html">Home</a></li>
                      <li class="current">Check Research Title</li>
                  </ol>
              </nav>
          </div>
      </div><!-- End Page Title -->

      <!-- Check Title Section -->
      <section id="checktitle" class="checktitle section">

          <div class="container" data-aos="fade-up" data-aos-delay="100">

              <div class="row gy-4 justify-content-center">


                  <div class="col-lg-12">
                      <form action="<?= BASEURL ?>home/searchtitle" method="post">
                          <div class="row gy-4 justify-content-center text-center">

                              <div class="col-md-6 justify-content-center">
                                  <input type="text" name="title" class="form-control" placeholder="Enter your title" required="">
                              </div>


                              <div class="col-md-12">
                                  <!-- <div class="loading">Loading</div> -->
                                  <!-- <div class="error-message"></div> -->
                                  <!-- <div class="sent-message">Your submision has been sent. Thank you!</div> -->

                                  <input class="input-group-text btn btn-danger" type="submit" value="Check">
                              </div>

                          </div>
                      </form>
                  </div><!-- End Contact Form -->

              </div>

          </div>

      </section><!-- /Contact Section -->

      <section>
          <div class="container">
              <div class="row justify-content-end">
                  <div class="col">
                      <?php Flasher::flashAll() ?>
                  </div>
              </div>
          </div>
      </section>

      <?php if (isset($data['judulmirip'])) : ?>
          <!-- Result Check Section -->
          <section id="resultcheck" class="resultcheck section">

              <div class="container" data-aos="fade-up" data-aos-delay="100">
                  <div class="row justify-content-center">
                      <div class="col text-center">
                          <h3>Daftar Judul</h3>
                      </div>
                  </div>

                  <div class="row gy-4 justify-content-center">


                      <div class="col-lg-12">

                          <div class="row gy-4 justify-content-center text-center">

                              <div class="col-md- 10 justify-content-center">

                                  <table id="" class="table table-hover">
                                      <thead>
                                          <tr class="table-dark">
                                              <th scope="col">No</th>
                                              <th scope="col">Judul</th>

                                          </tr>
                                      </thead>
                                      <tbody>

                                          <?php
                                            $i = 1;
                                            foreach ($data['judulmirip'] as $vals) :
                                            ?>
                                              <tr>
                                                  <th scope="row"><?= $i ?></th>
                                                  <td class="text-start"><?= $vals['title'] ?></td>

                                              </tr>





                                          <?php
                                                $i++;
                                            endforeach;
                                            ?>


                                      </tbody>
                                  </table>
                              </div>




                          </div>

                      </div><!-- End Contact Form -->

                  </div>

              </div>

          </section><!-- /Contact Section -->

      <?php endif; ?>

  </main>