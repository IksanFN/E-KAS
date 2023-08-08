<?php
session_start();

include_once 'koneksi.php';

if (!isset($_SESSION['username'])) {
  header("Location: login&register.php");
}

$bulan_pembayaran = mysqli_query($koneksi, "SELECT * FROM bulan_pembayaran ORDER BY tahun ASC");



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Uang Kas</title>
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
          <div class="row mb-3 justify-content-between">
            <div class="col-sm-6 col-lg-6">
                <h3>Uang Kas</h3>
            </div>
            <div class="col-sm-6 col-lg-6 text-end">
              <a href="tambah_bulan.php" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>Tambah</a>
            </div>
          </div>
      		<div class="row">
            <?php foreach($bulan_pembayaran as $data) : ?>

              <?php 

                $id_bulan_pembayaran = $data['id_bulan_pembayaran'];
                $sum = mysqli_query($koneksi, "SELECT SUM(minggu_ke_1 + minggu_ke_2 + minggu_ke_3 + minggu_ke_4) 
                AS total_uang_kas FROM uang_kas WHERE id_bulan_pembayaran = '$id_bulan_pembayaran'");
                $result = mysqli_fetch_assoc($sum);
                $totalUangKas = $result['total_uang_kas'];

                $queryLunas = mysqli_query($koneksi, "SELECT COUNT(status) AS total_lunas FROM uang_kas WHERE id_bulan_pembayaran = '$id_bulan_pembayaran' AND status = 'Lunas'");
                $statusLunas = mysqli_fetch_assoc($queryLunas);

                $queryBelumLunas = mysqli_query($koneksi, "SELECT COUNT(status) AS total_belum_lunas FROM uang_kas WHERE id_bulan_pembayaran = '$id_bulan_pembayaran' AND status = 'Belum lunas'");
                $statusBelumLunas = mysqli_fetch_assoc($queryBelumLunas);

              ?>
              <div class="col-xl-4 col-sm-6 col-12 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                      <div class="text-start">
                        <p class="mb-0 fw-bold"><?= $data['nama_bulan']; ?> <?= $data['tahun']; ?></p>
                        <p class="mb-0">Rp. <?= number_format($data['pembayaran_perminggu']); ?> / minggu</p>
                        <p class="mb-0">
                          Lunas : <b class="text-success"><?php echo $statusLunas['total_lunas']; ?> Orang</b>
                        </p>
                        <p class="mb-0">
                          Belum Lunas : <b class="text-danger"><?php echo $statusBelumLunas['total_belum_lunas'] ?> Orang</b>
                        </p>
                        <p class="mb-2">Total uang kas : <b class="text-success"><?= number_format($totalUangKas); ?></b></p>
                        <a href="detail_bulan_pembayaran.php?id_bulan_pembayaran=<?= $data['id_bulan_pembayaran']; ?>" class="btn btn-info btn-sm"><i class="fa-solid fa-info"></i></a>
                        <a href="hapus_bulan.php?id_bulan_pembayaran=<?= $data['id_bulan_pembayaran']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapusnya?')">
                        <i class="fa-solid fa-trash"></i></a>
                      </div>
                      <div class="align-self-center">
                        <i class="fa-solid fa-money-bill-trend-up text-success fa-3x"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
      </section>
      <!--Section: Minimal statistics cards-->
      
    </div>
  </main>
 <?php include_once 'view/js.php'; ?>