<?php 
session_start();
include_once 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login&register.php");
}

$id_bulan_pembayaran = $_GET['id_bulan_pembayaran'];

$queryDetail = mysqli_query($koneksi, "SELECT * FROM bulan_pembayaran WHERE id_bulan_pembayaran = '$id_bulan_pembayaran'");

$info = mysqli_fetch_assoc($queryDetail);

$siswa = mysqli_query($koneksi, "SELECT * FROM siswa");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Detail bulan pembayaran</title>
  <?php include_once 'view/css.php'; ?>
</head>

<body>
  <!-- Header -->
  <?php include_once 'view/header.php'; ?>

  <!--Main layout-->
  <main style="margin-top: 58px">
    <div class="container pt-4">

      <!--Section: Minimal statistics cards-->
      <section class="mb-4">

        <!-- Search -->
        <div class="card mb-3">
          <div class="card-body">
            <form action="" method="get" class="d-flex col-md-12">
                <input type="hidden" name="id_bulan_pembayaran" value="<?= $id_bulan_pembayaran; ?>">
                <input type="search" class="form-control mx-1" name="keyword" placeholder="Cari berdasarkan nama dan status">
                <button class="btn btn-primary mx-1" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <?php 
              if (isset($_GET['keyword']) AND !empty($_GET['keyword'])) :
                $keyword = $_GET['keyword'];
                $id = $_GET['id_bulan_pembayaran'];
                
                $where = "WHERE bulan_pembayaran.id_bulan_pembayaran = '$id' AND siswa.nama LIKE '%$keyword%' OR uang_kas.status = '$keyword'";
            ?>
            <div class="my-2">
              <p class="ms-3">Hasil pencarian kata kunci : <b class="text-info"><?php echo $keyword; ?></b></p>
            </div>
            <?php else:
                $where = "WHERE bulan_pembayaran.id_bulan_pembayaran = '$id_bulan_pembayaran'";
              endif; 
            ?>
          </div>
        </div>

        <div class="card">
          <div class="card-header text-center py-3">
            <h5 class="mb-0 text-center">
              <strong>Detail bulan pembayaran : <?= $info['nama_bulan']; ?> <?= $info['tahun']; ?></strong>
            </h5>
          </div>
          <div class="card-body">
            <!-- Button -->
            <a href="cetak_pembayaran.php?id_bulan_pembayaran=<?= $id_bulan_pembayaran; ?>" class="btn btn-secondary mx-1" target="_blank"><i class="fa-solid fa-print me-2"></i>Cetak</a>

            </div>
            <div class="table-responsive">
              <table class="table text-nowrap">
                <thead>
                  <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Minggu ke 1</th>
                    <th scope="col">Minggu ke 2</th>
                    <th scope="col">Minggu ke 3</th>
                    <th scope="col">Minggu ke 4</th>
                    <th scope="col">Status</th>
                    <th scope="col" style="min-width: 150px;" class="text-center">Aksi</th>
                  </tr>
                </thead>

                <?php 
                  include_once 'koneksi.php';
                 
                  $query = mysqli_query($koneksi, "SELECT * FROM uang_kas INNER JOIN siswa ON 
                                uang_kas.id_siswa = siswa.id_siswa
                                INNER JOIN bulan_pembayaran ON 
                                uang_kas.id_bulan_pembayaran = bulan_pembayaran.id_bulan_pembayaran
                                $where");
                  while($data = mysqli_fetch_assoc($query)) :
                ?>
                <tbody>
                  <tr>
                    <td><?= $data['nama']; ?></td>
                    <td>Rp. <?= number_format($data['minggu_ke_1']); ?></td>
                    <td>Rp. <?= number_format($data['minggu_ke_2']); ?></td>
                    <td>Rp. <?= number_format($data['minggu_ke_3']); ?></td>
                    <td>Rp. <?= number_format($data['minggu_ke_4']); ?></td>
                    <td>
                        <?php if($data['minggu_ke_1'] || $data['minggu_ke_2'] || $data['minggu_ke_3'] || $data['minggu_ke_4'] == $data['pembayaran_perminggu']) : ?>
                            <p class="fw-bold text-success">Lunas</b></p>
                        <?php elseif($data['status'] == 'Belum lunas'): ?>
                            <p class="fw-bold text-danger"><b><?= $data['status']; ?></b></p>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                      <a href="edit_pembayaran.php?id_uang_kas=<?php echo $data['id_uang_kas']; ?>&id_bulan_pembayaran=<?= $data['id_bulan_pembayaran'] ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                      <a href="hapus_pembayaran.php?id_uang_kas=<?php echo $data['id_uang_kas']; ?>&id_bulan_pembayaran=<?= $data['id_bulan_pembayaran'] ?>" class="btn btn-danger btn-sm rounded" onclick="return confirm(
                      'Apakah kamu yakin akan menghapusnya?')"><i class="fa-solid fa-trash"></i></a>
                    </td>
                  </tr>
                </tbody>
              <?php endwhile; ?>
              </table>
            </div>
          </div>
        </div>
      </section>
      <!--Section: Minimal statistics cards-->
      
    </div>
  </main>
 <?php include_once 'view/js.php'; ?>