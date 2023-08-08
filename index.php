<?php
session_start(); 
include_once 'koneksi.php';

if (!isset($_SESSION['username'])) {
  header("Location: login&register.php");
}

$bulan_pembayaran = mysqli_query($koneksi, "SELECT SUM(minggu_ke_1 + minggu_ke_2 + minggu_ke_3 + minggu_ke_4)
                    AS total_uang_kas FROM uang_kas");
$sumTotalUangKas = mysqli_fetch_assoc($bulan_pembayaran);
$totalUangKas = $sumTotalUangKas['total_uang_kas'];

$pengeluaran = mysqli_query($koneksi, "SELECT SUM(jumlah_pengeluaran) AS pengeluaran FROM pengeluaran");
$sumPengeluaran = mysqli_fetch_assoc($pengeluaran);
$totalPengeluaran = $sumPengeluaran['pengeluaran'];

$siswa = mysqli_query($koneksi, "SELECT * FROM siswa");
$jumlahSiswa = mysqli_num_rows($siswa);

$totalUangKas = $totalUangKas - $totalPengeluaran;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Dashboard</title>
  <?php include_once 'view/css.php'; ?>
</head>

<body>
  <!-- Header -->
  <?php include_once 'view/header.php'; ?>

  <!--Main layout-->
  <main style="margin-top: 58px">
    <div class="container pt-4">

      <!--Section: Minimal statistics cards-->
      <section>
        <div class="row">
          <div class="col-xl-4 col-sm-6 col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between px-md-1">
                  <div class="align-self-center">
                    <i class="fa-solid fa-money-bill-trend-up text-info fa-3x"></i>
                  </div>
                  <div class="text-end">
                    <h3>Rp. <?= number_format($totalUangKas); ?></h3>
                    <p class="mb-0">Total Uang Kas</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-sm-6 col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between px-md-1">
                  <div class="align-self-center">
                    <i class="fa-solid fa-money-check text-danger fa-3x"></i>
                  </div>
                  <div class="text-end">
                    <h3>Rp. <?= number_format($totalPengeluaran); ?></h3>
                    <p class="mb-0">Total Pengeluaran</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-sm-6 col-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between px-md-1">
                  <div class="align-self-center">
                    <i class="fa-solid fa-user-graduate text-warning fa-3x"></i>
                  </div>
                  <div class="text-end">
                    <h3><?= $jumlahSiswa; ?></h3>
                    <p class="mb-0">Jumlah Siswa</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--Section: Minimal statistics cards-->
      
    </div>
  </main>
 <?php include_once 'view/js.php'; ?>