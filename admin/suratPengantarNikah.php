<?php
require('../function.php');
include('../template/admin/header.php');
include('../template/admin/sidebar.php');
?>
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <?php include('../template/admin/navbar.php') ?>
        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Data Surat Pengantar Nikah</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between align-items-center py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Surat Pengantar Nikah</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Nomor</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $loop = mysqli_query($koneksi, "select * from pelayanan_surat where jenis=2");

                                while ($a = mysqli_fetch_array($loop)) { ?>
                                    <tr>
                                        <td><?= $a['nama'] ?></td>
                                        <td><?= $a['nomor'] ?></td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#exampleModal<?= $a['id'] ?>" class="btn btn-primary btn-sm">Lihat Berkas</button>
                                            <a href="../function.php?hapusPengantarNikah=<?= $a['id'] ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')">Hapus</a>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nama</th>
                                    <th>Nomor</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Desa Tupa 2023</span>
            </div>
        </div>
    </footer>

    <!-- Modal -->
    <?php $loop = mysqli_query($koneksi, "select * from pelayanan_surat where jenis=2");

    while ($a = mysqli_fetch_array($loop)) { ?>
        <div class="modal fade" id="exampleModal<?= $a['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Berkas <?= $a['nama'] ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div>
                                    <label for="exampleFormControlTextarea1">Kartu Keluarga</label>
                                    <div>
                                        <img src="../assets/dokumen/<?= $a['kk'] ?>" class="w-50" alt="">
                                        <a href="../function.php?gambar=<?= $a['kk'] ?>" class="btn btn-primary">Download</a>
                                    </div>
                                </div>
                                <div>
                                    <label for="exampleFormControlTextarea1">Kartu Tanda Penduduk :</label>
                                    <div>
                                        <img src="../assets/dokumen/<?= $a['ktp'] ?>" class="w-50" alt="">
                                        <a href="../function.php?gambar=<?= $a['ktp'] ?>" class="btn btn-primary">Download</a>
                                    </div>
                                </div>
                                <div>
                                    <label for="exampleFormControlTextarea1">Buku Nikah :</label>
                                    <div>
                                        <img src="../assets/dokumen/<?= $a['buku_nikah'] ?>" class="w-50" alt="">
                                        <a href="../function.php?gambar=<?= $a['buku_nikah'] ?>" class="btn btn-primary">Download</a>
                                    </div>
                                </div>
                                <div>
                                    <label for="exampleFormControlTextarea1">Selfie Dengan KTP :</label>
                                    <div>
                                        <img src="../assets/dokumen/<?= $a['foto'] ?>" class="w-50" alt="">
                                        <a href="../function.php?gambar=<?= $a['foto'] ?>" class="btn btn-primary">Download</a>
                                    </div>
                                </div>
                                <div>
                                    <label for="exampleFormControlTextarea1">Ijasah :</label>
                                    <div>
                                        <img src="../assets/dokumen/<?= $a['ijasah'] ?>" class="w-50" alt="">
                                        <a href="../function.php?gambar=<?= $a['ijasah'] ?>" class="btn btn-primary">Download</a>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>



</div>



<?php include('../template/admin/footer.php') ?>