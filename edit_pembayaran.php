<?php
session_start();
include_once 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login&register.php");
}

$id_bulan_pembayaran = $_GET['id_bulan_pembayaran'];
$id_uang_kas = $_GET['id_uang_kas'];

$query = mysqli_query($koneksi, "SELECT * FROM uang_kas INNER JOIN siswa
                     ON uang_kas.id_siswa = siswa.id_siswa INNER JOIN bulan_pembayaran ON bulan_pembayaran.id_bulan_pembayaran = uang_kas.id_bulan_pembayaran WHERE uang_kas.id_uang_kas = '$id_uang_kas'");
$result = mysqli_fetch_assoc($query);

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
              <strong>Edit siswa yang membayar</strong>
            </h5>
          </div>
          <div class="card-body">
            
            <form action="proses_edit_pembayaran.php" method="post">
              <input type="hidden" name="id_uang_kas" value="<?= $id_uang_kas; ?>">
              <input type="hidden" name="id_bulan_pembayaran" value="<?= $id_bulan_pembayaran; ?>">
              <select name="id_siswa" class="form-select mb-3" aria-label="Default select example">
                <option value="<?= $result['id_siswa'] ?>" selected><?= $result['nama']; ?></option>
                
              </select>
              <select name="minggu_ke_1" class="form-select mb-3" aria-label="Default select example">
                <option value="0" selected>0</option>
                <option value="<?php echo $result['pembayaran_perminggu'] ?>"><?php echo $result['pembayaran_perminggu'] ?></option>
              </select>

               <select name="minggu_ke_2" class="form-select mb-3" aria-label="Default select example">
                  <option value="0" selected>0</option>
                  <option value="<?php echo $result['pembayaran_perminggu'] ?>"><?php echo $result['pembayaran_perminggu'] ?></option>
                </select>

               <select name="minggu_ke_3" class="form-select mb-3" aria-label="Default select example">
                  <option value="0" selected>0</option>
                  <option value="<?php echo $result['pembayaran_perminggu'] ?>"><?php echo $result['pembayaran_perminggu'] ?></option>
                </select>

               <select name="minggu_ke_4" class="form-select mb-3" aria-label="Default select example">
                  <option value="0" selected>0</option>
                  <option value="<?php echo $result['pembayaran_perminggu'] ?>"><?php echo $result['pembayaran_perminggu'] ?></option>
                </select>

              <div class="form-outline text-center">
                <button class="btn btn-warning px-4"><i class="fa-solid fa-pen-to-square me-2"></i> Edit</button>
              </div>
            </form>
           
          </div>
        </div>
      </section>
      <!--Section: Minimal statistics cards-->
      
    </div>
  </main>
 <?php include_once 'view/js.php'; ?>