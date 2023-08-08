<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login&register.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Tambah Bulan</title>
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
        <div class="card">
          <div class="card-header text-center py-3">
            <h5 class="mb-0 text-center">
              <strong>Tambah Bulan</strong>
            </h5>
          </div>
          <div class="card-body">
            
            <form action="proses_tambah_bulan.php" method="post">
              <select name="nama_bulan" class="form-select mb-3" aria-label="Default select example">
                <option selected>Pilih bulan</option>
                <option value="Januari">Januari</option>
                <option value="Februari">Februari</option>
                <option value="Maret">Maret</option>
                <option value="April">April</option>
                <option value="Mei">Mei</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="Agustus">Agustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Desember">Desember</option>
              </select>
              <div class="form-outline mb-3">
                <input type="number" name="tahun" id="form12" class="form-control" />
                <label class="form-label" for="form12">Tahun</label>
              </div>
              <div class="form-outline mb-3">
                <input type="text" name="pembayaran_perminggu" id="form12" class="form-control" />
                <label class="form-label" for="form12">Pembayaran perminggu</label>
              </div>
              <div class="form-outline text-center">
                <button class="btn btn-primary px-4"><i class="fa-solid fa-plus me-2"></i> Tambah</button>
              </div>
            </form>
           
          </div>
        </div>
      </section>
      <!--Section: Minimal statistics cards-->
      
    </div>
  </main>
 <?php include_once 'view/js.php'; ?>