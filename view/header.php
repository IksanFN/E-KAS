<header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
      <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
          <a href="index.php" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
          </a>
          <a href="siswa.php" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fa-solid fa-user-graduate fa-fw me-3"></i><span>Siswa</span>
          </a>
          <a href="uang_kas.php" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fa-solid fa-money-check-dollar fa-fw me-3"></i><span>Uang Kas</span></a>
          <a href="pengeluaran.php" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fa-solid fa-file-arrow-up fa-fw me-3"></i><span>Pengeluaran</span>
          </a>
        </div>
      </div>
    </nav>
    <!-- Sidebar -->

    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
          aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>

        <!-- Brand -->
        <a class="navbar-brand ms-3" href="#">
        <i class="fa-solid fa-money-bill-1-wave me-3 "></i>E-Cash
        </a>
      

        <!-- Right links -->
        <ul class="navbar-nav ms-auto d-flex flex-row">

          <!-- Avatar -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#"
              id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              <?php echo $_SESSION['username']; ?><i class="fa-solid fa-circle-user mx-3 fa-2x"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket me-2"></i>Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
  </header>