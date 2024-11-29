<?php
$title = "Home";
include("template/user/header.php");
include("template/user/navbar.php");

require('function.php');
?>

<div class="">
    <img src="assets/img/Profil Desaa.jpg" alt="Banner Desa" class="w-100">
    <div style="background-color: #f8f9fc;">
        <div class="col p-4">
            <ul class="nav justify-content-center">
                <li class="nav-item mx-5">
                    <a class="nav-link text-center active" href="pelayananSurat.php">
                        <img src="assets/img/services.svg" width="80" alt="Pelayanan Masyarakat" class="img-fluid">
                        <p class="text-secondary mt-2">Pelayanan Masyarakat</p>
                    </a>
                </li>
                <li class="nav-item mx-5">
                    <a class="nav-link text-center" href="potensiDesa.php">
                        <img src="assets/img/potensiDesa.svg" width="80" alt="Potensi Desa" class="img-fluid">
                        <p class="text-secondary mt-2">Potensi Desa</p>
                    </a>
                </li>
                <li class="nav-item mx-5">
                    <a class="nav-link text-center" href="pengumuman.php">
                        <img src="assets/img/pembangunanDesa.svg" width="80" alt="Pengumuman Desa" class="img-fluid">
                        <p class="text-secondary mt-2">Pengumuman Desa</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="text-right text-primary mb-2">Berita Terkini</h2>
                <div class="border-bottom border-primary border-1 mb-3"></div>
                <?php 
                // Fetch latest news
                $loop = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal DESC LIMIT 2");
                if ($loop) {
                    while ($a = mysqli_fetch_array($loop)) { ?>
                        <div class="d-flex flex-column flex-md-row mb-4">
                            <img src="assets/gambar/<?= htmlspecialchars($a['gambar']) ?>" alt="Gambar" class="responsive-img">
                            <div class="m-left">
                                <h3 class="text-primary mb-2"><a href="detail.php?detail=<?= htmlspecialchars($a['id']) ?>" style="text-decoration: none;"><?= htmlspecialchars($a['judul']) ?></a></h3>
                                <p>
                                    <?= htmlspecialchars(substr($a['deskripsi'], 0, 200)); ?>
                                    <a href="detail.php?detail=<?= htmlspecialchars($a['id']) ?>" style="font-size: 11px; font-weight: 500; padding: 3px 8px;" class="btn btn-primary"> selengkapnya <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                </p>
                            </div>
                        </div>
                <?php 
                    }
                } else {
                    echo "<p>Terjadi kesalahan saat mengambil data berita.</p>";
                }
                ?>
            </div>
            <div class="col-md-4">
                <h2 class="text-left text-primary mb-2">Pengumuman</h2>
                <div class="border-bottom border-primary border-1 mb-3"></div>

                <?php 
                // Fetch latest announcements
                $loop = mysqli_query($koneksi, "SELECT * FROM pengumuman ORDER BY tanggal DESC LIMIT 2");
                if ($loop) {
                    while ($a = mysqli_fetch_array($loop)) { ?>
                        <div class="card mb-2" style="border-color: blue;">
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample<?= htmlspecialchars($a['id']) ?>" aria-expanded="false" aria-controls="collapseExample<?= htmlspecialchars($a['id']) ?>">
                                <div class="fw-bold text-start text-uppercase"><?= htmlspecialchars($a['judul']) ?></div>
                            </button>

                            <div class="collapse" id="collapseExample<?= htmlspecialchars($a['id']) ?>">
                                <div class="card-body">
                                    <i class="fa fa-calendar text-primary" aria-hidden="true" style="font-size: 14px;"></i>
                                    <i class="text-primary" style="font-size: 14px;"><?= htmlspecialchars($a['tanggal']) ?></i>
                                    <i class="fa fa-user text-primary ms-2" aria-hidden="true" style="font-size: 14px;"></i>
                                    <i class="text-primary" style="font-size: 14px;">Admin Desa Plasma Jaya</i> <br>
                                    <?= htmlspecialchars(substr($a['deskripsi'], 0, 200)); ?>
                                    <a href="detail.php?pengumuman=<?= htmlspecialchars($a['id']) ?>" style="font-size: 11px; font-weight: 500; padding: 3px 8px;" class="btn btn-primary"> selengkapnya <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                <?php 
                    }
                } else {
                    echo "<p>Terjadi kesalahan saat mengambil data pengumuman.</p>";
                }
                ?>

                <div class="mt-3">
                    <h2 class="text-left text-primary mb-2">Agenda Kegiatan</h2>
                    <div class="border-bottom border-primary border-1 mb-3"></div>

                    <div class="d-flex mb-4">
                        <div class="bg-primary w-25 text-white fw-bold d-flex justify-content-center align-items-center">
                            Oct 15 2021
                        </div>
                        <div style="margin-left: 1.25rem;">
                            <h6 class="text-primary">Grebek Vaksin Tahap 3</h6>
                            <p>Lokasi Kantor Desa</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid mb-3">
        <div class="row">
            <div class="col-md-8">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d104918.9605209243!2d121.61548358924038!3d-4.416678287131214!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2da2adca8bc6f401%3A0x494b274b77c49639!2sPlasma%20Jaya%2C%20Kec.%20Polinggona%2C%20Kabupaten%20Kolaka%2C%20Sulawesi%20Tenggara!5e1!3m2!1sid!2sid!4v1726214594098!5m2!1sid!2sid" class="w-100" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-4">
                <div style="overflow-x: auto;">
                    <div class="container">
                        <table>
                            <tr>
                                <td style="font-weight: bold; font-size: small;">Luas Wilayah</td>
                                <td>:</td>
                                <td style="font-size: small;">10.000 Ha</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold; font-size: small;">Batas Sebelah Utara</td>
                                <td>:</td>
                                <td style="font-size: small;">Desa Tondo Wolo</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold; font-size: small;">Batas Sebelah Selatan</td>
                                <td>:</td>
                                <td style="font-size: small;">Desa Tageau</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold; font-size: small;">Batas Sebelah Timur</td>
                                <td>:</td>
                                <td style="font-size: small;">Desa Labandia</td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold; font-size: small;">Batas Sebelah Barat</td>
                                <td>:</td>
                                <td style="font-size: small;">Kelurahan Polinggona </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("template/user/footer.php"); ?>
