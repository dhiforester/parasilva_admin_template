<h1 class="mb-3">
    <a href="" class="title_page">
        <i class="bi bi-image"></i> Galeri
    </a>
</h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="index.php?Page=Profil">Profil</a></li>
        <li class="breadcrumb-item active" aria-current="page">Galeri</li>
    </ol>
</nav>
<div class="content mt-3">
    <div class="row mb-3">
        <div class="col-md-12">
            <?php
                //Menangkap id album
                if(empty($_GET['id'])){
                    echo '<div class="card">';
                    echo '  <div class="card-body text-center text-danger">';
                    echo '      ID Album Tidak Boleh Kosong!';
                    echo '  </div>';
                    echo '</div>';
                }else{
                    $id_akses_album=validateAndSanitizeInput($_GET['id']);
                    //Buka Nama Album
                    $NamaAlbum=GetDetailData($Conn, 'akses_album', 'id_akses_album', $id_akses_album, 'nama_album');
                    if(empty($NamaAlbum)){
                        echo '<div class="card">';
                        echo '  <div class="card-body text-center text-danger">';
                        echo '      ID Album Tidak Valid!';
                        echo '  </div>';
                        echo '</div>';
                    }else{
                        // Gunakan prepared statement untuk query SQL
                        $sql = "SELECT * FROM akses_galeri WHERE id_akses_album = ? AND id_akses = ?";
                        $stmt = $Conn->prepare($sql);
                        $stmt->bind_param("ss", $id_akses_album, $SessionIdAkses);
                        $stmt->execute();
                        $result = $stmt->get_result();
            ?>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col col-md-10 mb-3">
                                <h4><?php echo $NamaAlbum;?></h4>
                            </div>
                            <div class="col col-md-2 mb-3">
                                <button type="button" class="btn btn-lg btn-outline-warning btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalUploadGaleri" data-id="<?php echo $id_akses_album; ?>">
                                    <i class="bi bi-upload"></i> Upload
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <?php
                                // Periksa hasil query
                                if ($result->num_rows == 0) {
                                    echo '  <div class="col-md-12 text-center text-danger">';
                                    echo '      Tidak Ada Galeri Pada Album Ini!';
                                    echo '  </div>';
                                } else {
                                    // Logika untuk menampilkan data jika hasil tidak kosong
                                    while ($row = $result->fetch_assoc()) {
                                        $id_akses_galeri=$row['id_akses_galeri'];
                                        $foto=$row['foto'];
                                        if(empty($row['caption'])){
                                            $caption="Belum Ada Kutipan";
                                        }else{
                                            $caption=$row['caption'];
                                        }
                                        
                                        $path_foto="assets/img/user_galeri/$foto";
                                        echo '<div class="col-6 col-md-3 mb-3">';
                                        echo '  <div class="bg-image hover-overlay ripple rounded">';
                                        echo '      <img src="'.$path_foto.'" class="img-fluid image_album" alt="Sample" />';
                                        echo '      <div class="mask" style="background: radial-gradient(circle, rgba(24, 23, 23, 0.6), rgba(0, 0, 0, 0.6));">';
                                        echo '          <div class="d-flex justify-content-center align-items-center h-100">';
                                        echo '              <a href="'.$path_foto.'" class="btn-md btn-floating btn-outline-light m-2" data-lightbox="gallery" data-title="'.$caption.'">';
                                        echo '                  <i class="bi bi-image text-light"></i>';
                                        echo '              </a>';
                                        echo '              <a href="javascript:void(0);" class="btn-md btn-floating btn-outline-light m-2" id="DeleteImage">';
                                        echo '                  <i class="bi bi-trash text-light"></i>';
                                        echo '              </a>';
                                        echo '          </div>';
                                        echo '      </div>';
                                        echo '  </div>';
                                        echo '</div>';
                                    }
                                }
                                // Tutup statement dan koneksi
                                $stmt->close();
                                $Conn->close();
                            ?>
                        </div>
                    </div>
                </div>
            <?php }} ?>
        </div>
    </div>
</div>