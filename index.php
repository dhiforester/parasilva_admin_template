<?php
  //Zona Waktu
  date_default_timezone_set('Asia/Jakarta');
  
  //Inisiasi Koneksi Database Dan Function
  include "_Config/Connection.php";
  include "_Config/Function.php";
  include "_Config/Session.php";
  
  //Buka Session Akses
  if(empty($SessionIdAkses)){
    header("Location:Login.php");
  }else{

    //Buka Setting Aplikasi
    include "_Config/Setting.php";

    //Inisiasi Parameter Page Dari URL
    $Page = $_GET['Page'] ?? "";

    //Buka Profil Pengguna Dengan prepare statment
    $QryProfil = $Conn->prepare("SELECT nama_akses, email_akses, kontak_akses, image_akses, akses, datetime_daftar FROM akses WHERE id_akses = ?");
    if ($QryProfil) {
        // Bind parameter
        $QryProfil->bind_param("i", $SessionIdAkses);
        
        // Eksekusi query
        $QryProfil->execute();
        
        // Bind hasil ke variabel
        $QryProfil->bind_result($nama_akses, $email_akses, $kontak_akses, $image_akses, $akses, $datetime_daftar);
        
        // Ambil hasil
        if ($QryProfil->fetch()) {
            // Variabel $nama_akses dan $image_akses sekarang berisi nilai dari query
            $nama_akses = $nama_akses ?? "";
            $email_akses = $email_akses ?? "";
            $kontak_akses = $kontak_akses ?? "";
            $image_akses = $image_akses ?? "No-Image.png";
            $akses = $akses ?? "";
            $datetime_daftar = date('d/m/Y H:i',strtotime($datetime_daftar)) ?? "";
            //Bangun URL Foto Profile
            $url_image_akses ="assets/img/user/$image_akses";
            if(file_exists($url_image_akses)){
              $url_image_akses ="assets/img/user/$image_akses";
            }else{
              $url_image_akses ="assets/img/user/No-Image.png";
            }
        } else {
            // Jika tidak ada hasil
            $nama_akses = "";
            $email_akses = "";
            $kontak_akses = "";
            $image_akses = "";
            $akses = "";
            $datetime_daftar = "";
            $url_image_akses ="assets/img/user/No-Image.png";
        }
        
        // Tutup statement
        $QryProfil->close();
    } else {
        // Tangani error jika prepared statement gagal
        die("Query tidak dapat dipersiapkan: " . $Conn->error);
    }
?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta http-equiv="x-ua-compatible" content="ie=edge" />
      <title><?php echo $title_page; ?></title>
      <!-- MDB icon -->
      <link rel="icon" href="assets/img/logo/logo-secondary.png" type="image/x-icon" />
      <!-- Bootstrap Icon -->
      <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
      <!-- Google Fonts Roboto -->
      <link rel="stylesheet" href="assets/css/font.css?family=Roboto:wght@300;400;500;700;900&display=swap"/>
      <!--bootstrap css-->
      <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css" />
      <!-- MDB -->
      <link rel="stylesheet" href="assets/css/mdb.min.css" />
      <!-- Lightbox -->
      <link href="node_modules/lightbox2/dist/css/lightbox.css" rel="stylesheet" />
      <!-- Swiper -->
      <link href="node_modules/swiper/swiper-bundle.min.css?v=1" rel="stylesheet" />
      <!-- Custom CSS -->
      <link rel="stylesheet" href="assets/css/custom.css?v=1" />
    </head>
    <body class="body_content">
      <!-- Preloader Akan Muncul Disini -->
      <div id="preloader">
        <div class="spinner"></div>
      </div>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="">
            <img src="assets/img/logo/logo-secondary.png" alt="Logo" height="40" /> <span class="nama_web"><?php echo $title_page; ?></span>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <i class="bi bi-three-dots"></i>
          </button>
          <div class="offcanvas offcanvas-end text-bg-dark" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a href="index.php" class="nav-link menu_atas">
                    <i class="bi bi-pie-chart menu-icon"></i> Dashboard
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle menu_atas" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-people menu-icon"></i> Akses
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#Fitur">Fitur</a></li>
                    <li><a class="dropdown-item" href="#Entitas">Entitas</a></li>
                    <li><a class="dropdown-item" href="#Akses">Akses</a></li>
                    <li><a class="dropdown-item" href="#Log">Log Akses</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle menu_atas" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-gear menu-icon"></i> Setting
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#GeneralSetting">General Setting</a></li>
                    <li><a class="dropdown-item" href="#ApiKey">API Key</a></li>
                    <li><a class="dropdown-item" href="#AutoJurnal">Auto Jurnal</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle menu_atas" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-table menu-icon"></i> Master
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#AkunPerkiraan">Akun Perkiraan</a></li>
                    <li><a class="dropdown-item" href="#Inventory">Inventory</a></li>
                    <li><a class="dropdown-item" href="#TarifTindakan">Tarif Tindakan</a></li>
                    <li><a class="dropdown-item" href="#Transaksi">Transaksi</a></li>
                    <li><a class="dropdown-item" href="#Jurnal">Jurnal</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle menu_atas" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-envelope-paper menu-icon"></i> Laporan
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#BukuBesar">Buku Besar</a></li>
                    <li><a class="dropdown-item" href="#Neraca">Neraca</a></li>
                    <li><a class="dropdown-item" href="#LabaRugi">Laba Rugi</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle d-flex align-items-center my_profile" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo $url_image_akses; ?>" alt="User Avatar" class="rounded-circle me-2" height="30" width="30">
                    <span><?php echo $nama_akses; ?></span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                    <li><a class="dropdown-item" href="index.php?Page=Profil">Profil Saya</a></li>
                    <li><a class="dropdown-item" href="index.php?Page=Setting">Setting</a></li>
                    <li>
                      <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        Logout
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>

      <!-- Main Content -->
      <div class="container my-4" id="isi_content">
        <div class="row">
          <div class="col">
            <?php
              include "_Partial/RoutingPage.php";
            ?>
          </div>
        </div>
        <!-- End of Content -->
      </div>

      <!-- Footer -->
      <footer class="footer fixed-bottom">
        <div class="container d-flex justify-content-between align-items-center">
          <div class="footer-group-menu w-100">
            <a href="javascript:void(0);" class="text-center active"><i class="bi bi-pie-chart"></i> Dashboard</a>
            <a href="javascript:void(0);" class="text-center"><i class="bi bi-question-circle"></i> Bantuan</a>
            <a href="javascript:void(0);" class="text-center">
              <i class="bi bi-bell"><span class="badge rounded-pill badge-notification bg-danger">1</span></i>  Notif 
            </a>
          </div>
        </div>
      </footer>
      <?php
          include "_Partial/RoutingModal.php";
          include "_Partial/FooterJs.php";
          include "_Partial/RoutingJs.php";
          echo '<script type="text/javascript" src="_Page/Login/Login.js"></script>';
      ?>
    </body>
  </html>
<?php } ?>