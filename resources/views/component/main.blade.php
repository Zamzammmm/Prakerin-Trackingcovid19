<main id="main">

    <!-- ======= Provinsi ======= -->
    <section id="about" class="about">
      <div class="container">
        <div class="row content">
          <div class="col-sm">
            <div class="card">
              <div class="card-header">
                <h3>Data Kasus Coronavirus di Indonesia Berdasarkan Provinsi</h3>
              </div>
              <div class="card-body">
                <div style="height:600px;overflow:auto;margin-right:15px;">
                  <table class="table table-striped"  fixed-header>
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Provinsi</th>
                        <th scope="col">Positif</th>
                        <th scope="col">Sembuh</th>
                        <th scope="col">Meninggal</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $no = 1; 
                      @endphp
                      <?php
                        for ($i= 0; $i <= 33; $i++){
                      ?>
                      <tr>
                        <td> <?php echo $i+1 ?></td>
                        <td> <?php echo $idprovinsi[$i]['attributes']['Provinsi'] ?></td>
                        <td> <?php echo $idprovinsi[$i]['attributes']['Kasus_Posi'] ?></td>
                        <td> <?php echo $idprovinsi[$i]['attributes']['Kasus_Semb'] ?></td>
                        <td> <?php echo $idprovinsi[$i]['attributes']['Kasus_Meni'] ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End provinsi -->

    <!-- ======= Global ======= -->
    <div class="container">
      
      <div class="row">
        <div class="col-sm">
          <div class="card">
            <div class="card-header">
              <h3>Kasus Coronavirus Global</h3>
            </div>
            <div class="card-body">
              <div style="height:600px;overflow:auto;margin-right:15px;">
                <table class="table table-striped" fixed-header>
                  <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Negara</th>
                    <th scope="col">Positif</th>
                    <th scope="col">Sembuh</th>
                    <th scope="col">Meninggal</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1; 
                    @endphp
                    <?php
                      for ($i= 0; $i <= 191; $i++){
                    ?>
                    <tr>
                      <td> <?php echo $i+1 ?></td>
                      <td> <?php echo $dunia[$i]['attributes']['Country_Region'] ?></td>
                      <td> <?php echo number_format($dunia[$i]['attributes']['Confirmed']) ?></td>
                      <td><?php echo number_format($dunia[$i]['attributes']['Recovered'])?></td>
                      <td><?php echo number_format($dunia[$i]['attributes']['Deaths'])?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <br>
    <!-- End Global -->
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-xl-6">
          <a href="https://www.unicef.org/indonesia/id/coronavirus">
            <div class="card bg-success">
              <div class="card-body">
                <h4 class="card-title" style="text-decoration:none; color:white">Novel coronavirus (COVID-19): Hal-hal yang perlu Anda ketahui</h4>
                <p class="card-text"  style="text-decoration:none; color:white">Unicef Indonesia</p>
              </div>
            </div>
          </a>
        </div>

        <div class="form-group col-lg-6">
          <a href="https://www.kompas.com/tren/read/2020/03/03/183500265/infografik-daftar-100-rumah-sakit-rujukan-penanganan-virus-corona">
            <div class="card bg-secondary">
              <div class="card-body">
                <h4 class="card-title" style="text-decoration:none">Daftar 100 Rumah Sakit Rujukan Penanganan Virus Corona</h4>
                <p class="card-text" style="text-decoration:none">Kompas</p>
              </div>
            </a>
          </div>
      </div>
      <div class="form-group col-lg-6" style="margin-top:20px">
          <a href="https://infeksiemerging.kemkes.go.id/">
            <div class="card bg-danger">
              <div class="card-body">
                <h4 class="card-title"style="text-decoration:none">Media Informasi Resmi Penyakit Infeksi Emerging</h4>
                <p class="card-text" style="text-decoration:none">Kementrian Kesehatan</p>
              </div>
            </div>
          </a>
        </div>

        <div class="form-group col-lg-6" style="margin-top:20px">
          <a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public">
            <div class="card bg-warning">
              <div class="card-body">
                <h4 class="card-title" style="text-decoration:none">Coronavirus Disease (COVID-19) Advice for The Public</h4>
                <p class="card-text"style="text-decoration:none">WHO</p>
              </div>
            </div>
          </a>
        </div>
    </div>
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group mt-3">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>

                <div class="col-md-6 form-group mt-3 ">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>

              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>

              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main>