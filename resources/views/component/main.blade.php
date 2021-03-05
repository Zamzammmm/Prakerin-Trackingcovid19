<main id="main">
      <!-- ======= Facts Section ======= -->
      <section id="facts" class="facts">
        <div class="container" data-aos="fade-up">
          <div class="row">
            <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
              <div class="count-box">
                <i class="bi bi-plus"></i>
                <span data-toggle="counter-up">{{ $jumlah_positif }}</span>
                <p>Jumlah Positif Indonesia</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
              <div class="count-box">
                <i class="bi bi-emoji-smile"></i>
                <span data-toggle="counter-up">{{ $jumlah_sembuh }}</span>
                <p>Jumlah Sembuh Indonesia</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
              <div class="count-box">
                <i class="bi bi-emoji-frown"></i>
                <span data-toggle="counter-up">{{ $jumlah_meninggal }}</span>
                <p>Jumlah Meninggal Indonesia</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
              <div class="count-box">
                <i class="bi bi-globe"></i>
                <span data-toggle="counter-up"><?php echo $posglobal['value']; ?></span>
                <p>Jumlah Total Positif di Dunia</p>
              </div>
            </div>
              <div class="col text-center">
                <h6><p>Update terakhir : {{ $tanggal }}</p></h6>
              </div> 
          </div>
        </div>
      </section>
      <!-- End Facts Section -->

      <!-- ======= Local Section ======= -->
      <section id="local" class="local">
        <div class="container" data-aos="fade-up">
          <div class="section-title" data-aos="zoom-in">
            <h2>Data Kasus Indonesia</h2>
          </div>
          <div class="row content">
            <div class="col-sm">
              <div class="card">
                <div class="card-header">
                  <h5>
                    Data Kasus Coronavirus di Indonesia Berdasarkan Provinsi
                  </h5>
                </div>
                <div class="card-body">
                  <div
                    style="height: 600px; overflow: auto; margin-right: 15px"
                  >
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
                        @php $no = 1; @endphp @foreach($data as $dt)
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
      </section>
      <!-- End Local Section -->

      <!-- ======= Global Section ======= -->
      <section id="global" class="global section-bg">
        <div class="container" data-aos="fade-up">
          <div class="section-title" data-aos="zoom-in">
            <h2>Data Kasus Global</h2>
          </div>
          <div class="row">
            <div class="col-sm">
              <div class="card">
                <div class="card-header">
                  <h5>Kasus Coronavirus Global</h5>
                </div>
                <div class="card-body">
                  <div
                    style="height: 600px; overflow: auto; margin-right: 15px">
                    <table class="table table-bordered" fixed-header>
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
                        @php $no = 1; @endphp
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
      <!-- End global Section -->

      <!-- ======= Services Section ======= -->
      <section id="services" class="services">
        <div class="container" data-aos="fade-up">
          <div class="section-title" data-aos="zoom-in">
            <h2>Layanan</h2>
            <p>Beberapa lembaga mengenai tentang coronavirus</p>
          </div>

          <div class="row">
            <div
              class="col-lg-3 col-md-6 d-flex align-items-stretch"
              data-aos="zoom-in"
              data-aos-delay="100"
            >
              <div class="icon-box iconbox-blue">
                <div class="icon">
                  <svg
                    width="100"
                    height="100"
                    viewBox="0 0 600 600"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      stroke="none"
                      stroke-width="0"
                      fill="#f5f5f5"
                      d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"
                    ></path>
                  </svg>
                  <i class="bx bxl-dribbble"></i>
                </div>
                  <h4><a href="https://www.unicef.org/indonesia/id/coronavirus">
                  Novel Coronavirus (COVID-19)</a></h4>
                  <p>Hal-hal yang perlu anda ketahui</p><br><br>
                  <p>Unicef</p>
              </div>
            </div>

            <div
              class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0"
              data-aos="zoom-in"
              data-aos-delay="200"
            >
              <div class="icon-box iconbox-orange">
                <div class="icon">
                  <svg
                    width="100"
                    height="100"
                    viewBox="0 0 600 600"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      stroke="none"
                      stroke-width="0"
                      fill="#f5f5f5"
                      d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"
                    ></path>
                  </svg>
                  <i class="bx bx-file"></i>
                </div>
                <h4><a href="https://www.kompas.com/tren/read/2020/03/03/183500265/infografik-daftar-100-rumah-sakit-rujukan-penanganan-virus-corona">
                  Daftar Rumah Sakit</a></h4>
                  <p>Daftar 100 rumah sakit di Indoneis rujukan penanganan virus corona</p><br>
                  <p>Kompas</p>
              </div>
            </div>

            <div
              class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0"
              data-aos="zoom-in"
              data-aos-delay="300"
            >
              <div class="icon-box iconbox-pink">
                <div class="icon">
                  <svg
                    width="100"
                    height="100"
                    viewBox="0 0 600 600"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke="none"
                      stroke-width="0"
                      fill="#f5f5f5"
                      d="M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781"
                    ></path>
                  </svg>
                  <i class="bx bx-tachometer"></i>
                </div>
                <h4><a href="https://infeksiemerging.kemkes.go.id/">
                  Media Informasi</a></h4>
                  <p>Media informasi resmi penyakit Infeksi Emerging</p><br><br>
                  <p>Kementrian Kesehatan</p>
              </div>
            </div>

            <div
              class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0"
              data-aos="zoom-in"
              data-aos-delay="400">
              <div class="icon-box iconbox-yellow">
                <div class="icon">
                  <svg
                    width="100"
                    height="100"
                    viewBox="0 0 600 600"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      stroke="none"
                      stroke-width="0"
                      fill="#f5f5f5"
                      d="M300,503.46388370962813C374.79870501325706,506.71871716319447,464.8034551963731,527.1746412648533,510.4981551193396,467.86667711651364C555.9287308511215,408.9015244558933,512.6030010748507,327.5744911775523,490.211057578863,256.5855673507754C471.097692560561,195.9906835881958,447.69079081568157,138.11976852964426,395.19560036434837,102.3242989838813C329.3053358748298,57.3949838291264,248.02791733380457,8.279543830951368,175.87071277845988,42.242879143198664C103.41431057327972,76.34704239035025,93.79494320519305,170.9812938413882,81.28167332365135,250.07896920659033C70.17666984294237,320.27484674793965,64.84698225790005,396.69656628748305,111.28512138212992,450.4950937839243C156.20124167950087,502.5303643271138,231.32542653798444,500.4755392045468,300,503.46388370962813"
                    ></path>
                  </svg>
                  <i class="bx bx-first-aid""></i>
                </div>
                <h4><a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public">
                  Coronavirus Disease(COVID-19)</a></h4>
                  <p>Coronavirus Disease advice for the public</p><br>
                  <p>WHO</p>
              </div>
            </div>
        </div>
      </section>
      <!-- End Services Section -->

      <!-- ======= Resume Section ======= -->
      <section id="resume" class="resume">
        <div class="container" data-aos="fade-up">
          <div class="section-title" data-aos="zoom-in">
            <h2>F.A.Q</h2>
            <h3>Pertanyaan yang Sering Ditanya</h3>
            <p>Berikut beberapa jawaban dari pertanyaan yang sering di tanya</p>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="resume-item pb-0">
                <h4>Apa itu Coronavirus atau Covid-19?</h4>
                <p>
                  <em>
                    Virus korona adalah sebutan untuk jenis virus yang dapat menyebabkan penyakit pada hewan dan manusia. 
                    Disebut korona karena bentuknya yang seperti mahkota (korona ~ crown = mahkota dalam bahasa Latin)..</em>
                </p>
              </div>

              <div class="resume-item">
                <h4>Bagaimana COVID-19 menular? </h4>
                <p>
                  - Penularan terjadi melalui droplet (butir-butir tetesan cairan) dari hidung atau mulut yang menyebar saat pembawa virus COVID-19 batuk, bersin atau meler. 
                  Tetesan cairan tersebut akan menempel pada benda atau permukaan di sekitarnya. Dan kemudian masuk ke mulut, hidung atau mata. 
                  Atau menyentuh permukaan bekas terkena butir cairannya dengan tangan lalu tangan mengusap mulut, hidung atau mata. 
                  Inilah alasan pentingnya sering-sering cuci tangan dan jangan menyentuh muka dengan tangan. <br>

                  - Orang sehat dapat tertular saat tangan mereka menyentuh permukaan yang terkena tetesan tersebut dan kemudian tanpa sadar menyentuh mata, 
                  mulut, ataupun hidung (selaput lendir). Virus juga bisa masuk saat orang sehat secara tidak sengaja menghirup tetesan cairan saat si pembawa virus batuk atau bersin.
                </p>
              </div>
              <div class="resume-item">
                <h4>Kita harus bagaimana?</h4>
                <p>
                  1. Ketika keluar rumah, pakailah masker. Jika bersin, tutup mulut dan hidung dengan tisu dan buang tisunya sesegera mungkin.  <br>
                  2. Rajinlah mencuci tangan dengan sabun atau pembersih tangan berbasis alkohol min. 60% <br>
                  3. Jaga jarak dengan orang yang tampak sakit sepanjang kurang lebih 1 meter <br>
                  4. Jika sakit, pastikan untuk tidak menyebarkan virus ke orang lain dengan mengurangi bepergian. 
                </p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="resume-item">
                <h4>Jika seseorang terinfeksi virus ini, berapa lama sampai muncul gejala?</h4>
                <ul>
                  <li>
                    Masa inkubasi (dari masuknya virus ke dalam tubuh sampai munculnya gejala awal) adalah 1 – 14 hari, dengan rata-rata timbulnya gejala selama 5 hari.
                  </li>
                </ul>
              </div>
              <div class="resume-item">
                <h4>Seberapa banyak pasien yang akan mengalami gejala serius?</h4>
                <p>
                  Dari data yang tersedia saat ini, kita belum bisa menyimpulkan secara persis seberapa parah wabah COVID-19 ini. 
                  Tingkat keparahan dan mortalitas suatu wabah juga akan sangat tergantung pada kapasitas sistem kesehatan publik setempat dalam menangani kasus yang ada. 
                  Namun, temuan awal mengindikasikan bahwa tingkat keparahan COVID-19 lebih rendah dibandingkan SARS. 
                  Berdasarkan data dari 44 ribu pasien yang dirilis oleh Centre of Disease Control di Tiongkok, 
                  proporsi pasien dengan gejala ringan/serius/kritis dan tingkat kematiannya adalah sebagai berikut: <br><br>
                  -Gejala ringan seperti flu biasa: 81% (tingkat kematian: 0) <br>
                  -Gejala lebih serius seperti sesak napas dan pneumonia (radang paru-paru): 14% (tingkat kematian: 0) <br>
                  -Perlu masuk ICU dengan kondisi kritis karena gagal pernapasan, syok septik, dan gagal multi-organ: 5% (tingkat kematian: 50%)
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Resume Section -->

      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
          <div class="section-title" data-aos=zoom-in>
            <h2>Kontak</h2>
          </div>

          <div class="row mt-1">
            <div class="col-lg-4">
              <div class="info">
                <div class="address">
                  <i class="bi bi-geo-alt"></i>
                    <h4>Alamat Kami:</h4>
                    <p>Jl. Situ Tarate</p>
                </div>

                <div class="email">
                <i class="bi bi-envelope"></i>
                  <h4>Email Kami:</h4>
                  <p>info@smkassalaambandung.sch.id</p>
                </div>

                <div class="phone">
                <i class="bi bi-phone"></i>
                  <h4>Nomor Kami:</h4>
                  <p>081 809 330 622</p>
                </div>
              </div>
            </div>

            <div class="col-lg-8 mt-5 mt-lg-0">
              <form
                action="forms/contact.php"
                method="post"
                role="form"
                class="php-email-form"
              >
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input
                      type="text"
                      name="name"
                      class="form-control"
                      id="name"
                      placeholder="Your Name"
                      required
                    />
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input
                      type="email"
                      class="form-control"
                      name="email"
                      id="email"
                      placeholder="Your Email"
                      required
                    />
                  </div>
                </div>
                <div class="form-group mt-3">
                  <input
                    type="text"
                    class="form-control"
                    name="subject"
                    id="subject"
                    placeholder="Subject"
                    required
                  />
                </div>
                <div class="form-group mt-3">
                  <textarea
                    class="form-control"
                    name="message"
                    rows="5"
                    placeholder="Message"
                    required
                  ></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">
                    Your message has been sent. Thank you!
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit">Send Message</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- End Contact Section -->
    </main>