<?php
// date time untuk jakarta indonesia
date_default_timezone_set('Asia/Jakarta');
// list pajak untuk bandara asal
$list_pajak_bandara_asal = [
  'Soekarno Hatta' => 65000,
  'Husein Sastranegara' => 50000,
  'Abdul Rachman Saleh' => 40000,
  'Juanda' => 30000
];
// list pajak untuk bandara tujuan
$list_pajak_bandara_tujuan = [
  'Ngurah Rai' => 85000,
  'Hasanuddin' => 70000,
  'Inanwatan' => 90000,
  'Sultan Iskandar Muda' => 60000
];
// apabila ada post yang dikirim
if ($_POST) {
  // deklarasi variabel untuk setiap input
  $waktu_submit     = time();
  $nama_maskapai    = $_POST['nama_maskapai'];
  $bandara_asal     = $_POST['bandara_asal'];
  $bandara_tujuan   = $_POST['bandara_tujuan'];
  // cek pajak untuk setiap bandara asal dan tujuan
  $pajak_bandara_asal     = $list_pajak_bandara_asal[$bandara_asal];
  $pajak_bandara_tujuan   = $list_pajak_bandara_tujuan[$bandara_tujuan];
  // total pajak, harga tiket dan total harga tiket
  $pajak_total  = $pajak_bandara_asal + $pajak_bandara_tujuan;
  $harga_tiket  = isset($_POST['harga_tiket']) ? ($_POST['harga_tiket'] != '' ? $_POST['harga_tiket'] : 0) : 0;
  $total_harga_tiket  = $harga_tiket + $pajak_total;
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <!--font link-->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;500;700&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Pemesanan Tiket Pesawat</title>
</head>

<body>
  <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-primary text-light">
    <div class="container">
      <a class="navbar-brand text-white" href="#header">
        <img src="../assets/images/logo.png" width="50" height="auto" class="d-inline-block align-top" alt="">
        UASLINES REGISTRATION
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav ms-auto">
          <a class="nav-link active" href="#header">HOME</a>
          <a class="nav-link active" href="#tiket">BUY</a>
          <a class="nav-link active" href="#rute">PRICE</a>
          <a class="nav-link active" href="#contact">CONTACT</a>
        </ul>
      </div>
  </nav>

  <header id="header" class="jumbotron">
    <div class="container py-5">
      <h1 class="text-center" style="color: white;">Selamat datang di Penjualan Tiket Penerbangan UASLINES</h1>
      <p class="text-center"><i><b>Disini Anda Dapat Dengan Mudah Membeli Tiket Penerbangan Ke Tujuan Yang Anda Inginkan.</b></i></p>
      <h2 class="text-center" style="color: white;">Pemesanan Tiket Pesawat</h1>
        <section id="tiket" class="tiket">
          <div class="row">
            <div class="col-md-6 mt-3">
              <div class="card">
                <div class="card-body">
                  <form method="POST">
                    <div class="mb-3">
                      <h5 class="fw-dark text-center">Berikut Pengisian Data Untuk Pembelian Tiket :</h1><br>
                        <label for="input-nama-maskapai" class="form-label">Nama Maskapai</label>
                        <!-- <input name="nama_maskapai" type="text" class="form-control" id="input-nama-maskapai" placeholder="Nama Maskapai" required> -->
                        <select id="input-nama-maskapai" name="nama_maskapai" class="form-select" required>
                          <option value="" selected>Pilih Bandara</option>
                          <option value="Garuda Indonesia">Garuda Indonesia</option>
                          <option value="Lion Air">Lion Air</option>
                          <option value="Batik Air">Batik Air</option>
                          <option value="Air Asia">Air Asia</option>
                        </select>
                    </div>
                    <div class="mb-3">
                      <label for="input-bandara-asal" class="form-label">Bandara Asal</label>
                      <select id="input-bandara-asal" name="bandara_asal" class="form-select" required>
                        <option value="" selected>Pilih Bandara</option>
                        <?php foreach ($list_pajak_bandara_asal as $bandara => $harga) : ?>
                          <option value="<?= $bandara; ?>"><?= $bandara; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="input-bandara-tujuan" class="form-label">Bandara Tujuan</label>
                      <select id="input-bandara-tujuan" name="bandara_tujuan" class="form-select" required>
                        <option value="" selected>Pilih Bandara</option>
                        <?php foreach ($list_pajak_bandara_tujuan as $bandara => $harga) : ?>
                          <option value="<?= $bandara; ?>"><?= $bandara; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>

                    <div class="mb-3">
                      <label for="input-harga-tiket" class="form-label">Harga Tiket</label>
                      <input name="harga_tiket" type="number" class="form-control" id="input-harga-tiket" placeholder="Harga Tiket" required>
                    </div>
                    <button class="btn btn-primary w-100">Pesan</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6 mt-3">
              <div class="card h-100">
                <div class="card-body">
                  <table class="table table-borderless table-hover my-5">
                    <tbody>
                      <h5 class="fw-dark text-center">Hasil Pembelian Tiket :</h1>
                        <tr>
                          <th scope="row">Tanggal</th>
                          <td>:</td>
                          <td><?= isset($waktu_submit) ? date('d M Y - H:i', $waktu_submit) : 'Kosong'; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Nama Maskapai</th>
                          <td>:</td>
                          <td><?= isset($nama_maskapai) ? $nama_maskapai : 'Kosong'; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Asal Penerbangan</th>
                          <td>:</td>
                          <td><?= isset($bandara_asal) ? $bandara_asal : 'Kosong'; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Tujuan Penerbangan</th>
                          <td>:</td>
                          <td><?= isset($bandara_tujuan) ? $bandara_tujuan : 'Kosong'; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Harga Tiket</th>
                          <td>:</td>
                          <td><?= isset($harga_tiket) ? 'Rp ' . number_format($harga_tiket) . ',-' : 'Kosong'; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Pajak</th>
                          <td>:</td>
                          <td><?= isset($pajak_total) ? 'Rp ' . number_format($pajak_total) . ',-' : 'Kosong'; ?></td>
                        </tr>
                        <tr class="border-top">
                          <th scope="row">Total Harga Tiket</th>
                          <td>:</td>
                          <td><?= isset($total_harga_tiket) ? 'Rp ' . number_format($total_harga_tiket) . ',-' : 'Kosong'; ?></td>
                        </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
  </header>

  <section id="rute" class="rute">
    <div class="row justify-content-center">
      <div class="col-md-10 mt-3 pb-4">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered table-striped table-hover text-center">
              <h3 class="text-center text-white bg-primary py-2">Daftar Rute UASLINES</h3><br>
              <thead>
                <tr>
                  <!-- Header tabel data Penerbangan. -->
                  <th scope="col">No</th>
                  <th scope="col">Maskapai</th>
                  <th scope="col">Asal Penerbangan</th>
                  <th scope="col">Tujuan Penerbangan</th>
                  <th scope="col">Harga Tiket</th>
                  <th scope="col">Pajak</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Garuda Indonesia</td>
                  <td>Soekarno-Hatta</td>
                  <td>Ngurah Rai</td>
                  <td>Rp. 1.275.000,-</td>
                  <td>Rp. 150.000,-</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Garuda Indonesia</td>
                  <td>Husein Sastranegara</td>
                  <td>Inanwatan</td>
                  <td>Rp. 1.178.000,-</td>
                  <td>Rp. 145.000,-</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Garuda Indonesia</td>
                  <td>Juanda</td>
                  <td>Sultan Iskandar Muda</td>
                  <td>Rp. 1.085.000,-</td>
                  <td>Rp. 90.000,-</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Lion Air</td>
                  <td>Soekarno-Hatta</td>
                  <td>Hasanuddin</td>
                  <td>Rp. 1.175.000,-</td>
                  <td>Rp. 135.000,-</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Lion Air</td>
                  <td>Abdul Rachman Saleh</td>
                  <td>Sultan Iskandar Muda</td>
                  <td>Rp. 1.182.000,-</td>
                  <td>Rp. 100.000,-</td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Lion Air</td>
                  <td>Juanda</td>
                  <td>Inanwatan</td>
                  <td>Rp. 1.142.000,-</td>
                  <td>Rp. 120.000,-</td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>Batik Air</td>
                  <td>Soekarno-Hatta</td>
                  <td>Ngurah Rai</td>
                  <td>Rp. 1.123.000,-</td>
                  <td>Rp. 150.000,-</td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>Batik Air</td>
                  <td>Husein Sastranegara</td>
                  <td>Hasanuddin</td>
                  <td>Rp. 1.105.000,-</td>
                  <td>Rp. 120.000,-</td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>Batik Air</td>
                  <td>Juanda</td>
                  <td>Ngurah Rai</td>
                  <td>Rp. 1.021.000,-</td>
                  <td>Rp. 115.000,-</td>
                </tr>
                <tr>
                  <td>10</td>
                  <td>Air Asia</td>
                  <td>Soekarno-Hatta</td>
                  <td>Inanwatan</td>
                  <td>Rp. 1.108.000,-</td>
                  <td>Rp. 155.000,-</td>
                </tr>
                <tr>
                  <td>11</td>
                  <td>Air Asia</td>
                  <td>Abdul Rachman Saleh</td>
                  <td>Sultan Iskandar Muda</td>
                  <td>Rp. 1.050.000,-</td>
                  <td>Rp. 100.000,-</td>
                </tr>
                <tr>
                  <td>12</td>
                  <td>Air Asia</td>
                  <td>Husein Sastranegara</td>
                  <td>Ngurah Rai</td>
                  <td>Rp. 1.143.000,-</td>
                  <td>Rp. 135.000,-</td>
                </tr>
</body>
</table>

<a class="btn btn-primary smooth-scroll w-100" href="#tiket">Pesan</a>
</div>
</section>

<section id="contact" class="contact">
  <div class="row justify-content-center">
    <div class="col-md-10 mt-3 pb-4 pt-4">
      <div class="card">
        <div class="card-body">
          <h2 class="text-center text-white bg-primary py-2">Contact UASLINES</h2>
          <div class="row">
            <div class="col-md-7">

              <!-- maps -->
              &lt;<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1983.5084815916193!2d106.6715321!3d-6.1284192!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a02695aaccb09%3A0x61dee98159fa3fe5!2sBandar%20Udara%20Internasional%20Soekarno%E2%80%93Hatta!5e0!3m2!1sid!2sid!4v1649096823161!5m2!1sid!2sid" width="700" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              <!-- end maps -->
            </div>

            <div class="col-md-5">
              <div class="p-4">
                <h3>Contact Form</h3>
                <form action="contact.php" method="POST">
                  <div class="form-group">
                    <label>Name:</label>
                    <input class="form-control w-75" type="text" placeholder="Enter Your Name" name="nama">
                  </div>
                  <div class="form-group">
                    <label>Email:</label>
                    <input class="form-control w-75" type="email" placeholder="Enter Your Email" name="email">
                  </div>
                  <div class="form-group">
                    <label>Message:</label>
                    <textarea class="form-control w-75" type="text" placeholder="Your Massege" name="massege"></textarea><br>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <br>
                <h3>Contact Details</h3>
                <ul>
                  <li> <i class="bi bi-map-fill"></i> Karawang, Indonesia</li>
                  <li> <i class="bi bi-phone-vibrate-fill"></i> +62 8123456789</li>
                  <li> <i class="bi bi-envelope-paper-fill"></i> kelompok6@gmail.com</li>
                  <li> <i class="bi bi-globe"></i> http://www.kelompok6.com</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>

</html>