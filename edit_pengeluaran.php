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
  <title>Edit pengeluaran</title>
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
              <strong>Edit Pengeluaran</strong>
            </h5>
          </div>
          <div class="card-body">
            
            <?php 
              include_once 'koneksi.php';
              $id_pengeluaran = $_GET['id_pengeluaran'];
              $query = mysqli_query($koneksi, "SELECT * FROM pengeluaran WHERE id_pengeluaran = '$id_pengeluaran'");
              $data = mysqli_fetch_assoc($query);
            ?>

            <form action="proses_edit_pengeluaran.php" method="post">
              <input type="hidden" name="id_pengeluaran" value="<?php echo $id_pengeluaran; ?>">
              <div class="form-outline mb-3">
                <input type="text" name="jumlah_pengeluaran" id="form12" class="form-control" value="<?php  echo $data['jumlah_pengeluaran']; ?>" />
              </div>
              <div class="form-outline mb-3">
                <input type="text" name="keterangan" id="form12" class="form-control" value="<?php   echo $data['keterangan']; ?>" />
              </div>
              <div class="form-outline mb-3">
                <input type="date" name="tanggal_pengeluaran" id="form12" class="form-control" value="<?php  echo $data['tanggal_pengeluaran']; ?>" />
              </div>
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