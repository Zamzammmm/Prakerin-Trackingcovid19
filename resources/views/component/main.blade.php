<main id="main">

    <!-- ======= Provinsi ======= -->
    <section id="provinsi" class="provinsi">
      <div class="container">
        <div class="section-title" data-aos="zoom-out">
          <h2>Data Kasus Indonesia</h2>
        </div>
        <div class="row content">
          <div class="col-sm">
            <div class="card">
              <div class="card-header">
                <h5>Data Kasus Coronavirus di Indonesia Berdasarkan Provinsi</h5>
              </div>
              <div class="card-body">
                <div style="height:600px;overflow:auto;margin-right:15px;">
                  <table class="table table-bordered" fixed-header>
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
                    
                        @foreach($data as $dt)
                      <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$dt->nama_provinsi}}</td>
                        <td>{{number_format($dt->jumlah_positif)}}</td>
                        <td>{{number_format($dt->jumlah_sembuh)}}</td>
                        <td>{{number_format($dt->jumlah_meninggal)}}</td>
                      </tr>
                    </tbody>
                      @endforeach
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End provinsi -->

    <!-- ======= Global ======= -->
    <section id="global" class="global">
      <div class="container">
        <div class="section-title" data-aos="zoom-out">
          <h2>Data Kasus Global</h2>
        </div>
        <div class="row">
          <div class="col-sm">
            <div class="card">
              <div class="card-header">
                <h5>Kasus Coronavirus Global</h5>
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
    </section>
    <!-- End Global -->

     <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title" data-aos="zoom-out">
          <h2>Pelayanan</h2>
          <h3>Berikut <span>Layanan</span></h3>
          <p>Beberapa lembaga mengenai tentang coronavirus</p>
        </div>

        <div class="row">
          <div class="col-lg-3  d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-out" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4><a href="https://www.unicef.org/indonesia/id/coronavirus">
                Novel Coronavirus (COVID-19)</a></h4>
              <p>Hal-hal yang perlu anda ketahui</p><br>
              <p>Unicef</p>
            </div>
          </div>

          <div class="col-lg-3  d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-out" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="https://www.kompas.com/tren/read/2020/03/03/183500265/infografik-daftar-100-rumah-sakit-rujukan-penanganan-virus-corona">
                Daftar Rumah Sakit</a></h4>
              <p>Daftar 100 rumah sakit di Indoneis rujukan penanganan virus corona</p><br>
              <p>Kompas</p>
            </div>
          </div>

          <div class="col-lg-3  d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-out" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="https://infeksiemerging.kemkes.go.id/">
                Media Informasi</a></h4>
              <p>Media informasi resmi penyakit Infeksi Emerging</p><br>
              <p>Kementrian Kesehatan</p>
            </div>
          </div>

          <div class="col-lg-3 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-out" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-first-aid"></i></div>
              <h4><a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public">
                Coronavirus Disease(COVID-19)</a></h4>
              <p>Coronavirus Disease advice for the public</p><br>
              <p>WHO</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title" data-aos="zoom-out">
          <h2>Kontak</h2>
          <p>Kontak Kami</p>
        </div>

        {{-- <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
        </div> --}}

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Alamat Kami:</h4>
                <p>Jl. Situ Tarate</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email Kami:</h4>
                <p>info@smkassalaambandung.sch.id</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Nomor Kami:</h4>
                <p>081 809 330 622</p>
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
                <div class="loading">Memuat</div>
                <div class="error-message"></div>
                <div class="sent-message">Pesan Anda telah dikirim. Terima kasih!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main>