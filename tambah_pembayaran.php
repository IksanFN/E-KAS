<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login&register.php");
}

$id_bulan_pembayaran = $_GET['id_bulan_pembayaran'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Edit siswa yang membayar</title>
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
              <strong>Tambah siswa yang membayar</strong>
            </h5>
          </div>
          <div class="card-body">
            
            <form action="proses_tambah_pembayaran.php" method="post">
              <input type="hidden" name="id_bulan_pembayaran" value="<?= $id_bulan_pembayaran; ?>">
              <select name="id_siswa" class="form-select mb-3" aria-label="Default select example">
                <option selected>Pilih siswa</option>
                <?php
                    include_once 'koneksi.php';
                    $query = mysqli_query($koneksi, "SELECT * FROM siswa");
                    while($data = mysqli_fetch_assoc($query)) : 
                ?>
                <option value="<?= $data['id_siswa'] ?>"><?= $data['nama']; ?></option>
                <?php endwhile; ?>
              </select>
              <div class="form-outline mb-3">
                <input type="number" name="minggu_ke_1" id="form12" class="form-control" />
                <label class="form-label" for="form12">Minggu Ke 1</label>
              </div>
              <div class="form-outline mb-3">
                <input type="number" name="minggu_ke_2" id="form12" class="form-control" />
                <label class="form-label" for="form12">Minggu ke 2</label>
              </div>
              <div class="form-outline mb-3">
                <input type="number" name="minggu_ke_3" id="form12" class="form-control" />
                <label class="form-label" for="form12">Minggu ke 3</label>
              </div>
              <div class="form-outline mb-3">
                <input type="number" name="minggu_ke_4" id="form12" class="form-control" />
                <label class="form-label" for="form12">Minggu ke 4</label>
              </div>
              <select name="status" class="form-select mb-3">
                  <option selected>Pilih status</option>
                  <option value="Lunas">Lunas</option>
                  <option value="Belum lunas">Belum lunas</option>
              </select>
              <div class="form-outline text-center">
                <button class="btn btn-primary px-5"><i class="fa-solid fa-plus"></i> Tambah</button>
              </div>
            </form>
           
          </div>
        </div>
      </section>
      <!--Section: Minimal statistics cards-->
      
    </div>
  </main>
 <?php include_once 'view/js.php'; ?>