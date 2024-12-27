<?php
    // Include file untuk koneksi dan session
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    include "../../_Config/Function.php";
    // Query SQL
    $sql = "
    SELECT 
        aa.id_akses_album,
        aa.nama_album,
        (SELECT ag.foto 
        FROM akses_galeri ag 
        WHERE ag.id_akses_album = aa.id_akses_album 
        AND (ag.cover = 1 OR ag.created_at = (
            SELECT MAX(ag2.created_at) 
            FROM akses_galeri ag2 
            WHERE ag2.id_akses_album = aa.id_akses_album
        ))
        LIMIT 1
        ) AS cover,
        (SELECT COUNT(*) 
        FROM akses_galeri ag 
        WHERE ag.id_akses_album = aa.id_akses_album
        ) AS jumlah_galeri
    FROM 
        akses_album aa;
    ";

    $result = $Conn->query($sql);

    // Periksa hasil query
    if ($result->num_rows > 0) {
        echo '<div class="row mb-3">';
        while ($row = $result->fetch_assoc()) {
            $id_akses_album=$row['id_akses_album'];
            $nama_album=$row['nama_album'];
            $jumlah_galeri=$row['jumlah_galeri'];
            if(empty($jumlah_galeri)){
                $cover="no_image.png";
                $path_cover="assets/img/user_galeri/$cover";
            }else{
                $cover=$row['cover'];
                $path_cover="assets/img/user_galeri/$cover";
            }
            echo '<div class="col-6 col-md-3 mb-3">';
            echo '  <div class="bg-image hover-overlay ripple rounded">';
            echo '      <img src="'.$path_cover.'" class="img-fluid image_album" alt="Sample" />';
            echo '      <a href="index.php?Page=Profil&Sub=Galeri&id='.$id_akses_album.'">';
            echo '          <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">';
            echo '              <div class="d-flex justify-content-center align-items-center h-100">';
            echo '                  <small class="text-white mb-0">'.$nama_album.'<br>'.$jumlah_galeri.' Foto</small>';
            echo '              </div>';
            echo '          </div>';
            echo '      </a>';
            echo '  </div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo "Tidak ada data album.";
    }

    // Tutup koneksi
    $Conn->close();
?>