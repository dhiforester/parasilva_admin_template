<?php
    // Include file untuk koneksi dan session
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    include "../../_Config/Function.php";

    // Inisialisasi respons default
    $response = [
        "status" => "Error",
        "message" => "Terjadi kesalahan. Silakan coba lagi."
    ];

    // Periksa apakah file diunggah
    if (isset($_FILES['foto_akses']) && $_FILES['foto_akses']['error'] === UPLOAD_ERR_OK) {
        // Ambil informasi file
        $fileTmpPath = $_FILES['foto_akses']['tmp_name'];
        $fileName = $_FILES['foto_akses']['name'];
        $fileSize = $_FILES['foto_akses']['size'];
        $fileType = $_FILES['foto_akses']['type'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Validasi ukuran file (maksimum 5MB)
        if ($fileSize > 5242880) { // 5 MB = 5 * 1024 * 1024 bytes
            $response["message"] = "Ukuran file terlalu besar. Maksimum ukuran adalah 5 MB.";
            echo json_encode($response);
            exit;
        }

        // Validasi tipe file
        $allowedExtensions = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($fileExtension, $allowedExtensions)) {
            $response["message"] = "Tipe file tidak valid. Hanya diperbolehkan JPG, JPEG, PNG, dan GIF.";
            echo json_encode($response);
            exit;
        }

        // Tentukan nama file unik untuk penyimpanan
        $nama_file_baru=GenerateToken(36);
        $newFileName ="$nama_file_baru.$fileExtension";
        $uploadPath = "../../assets/img/user/" . $newFileName;

        // Pindahkan file ke directory tujuan
        if (move_uploaded_file($fileTmpPath, $uploadPath)) {
            // Update nama file ke database
            $sqlUpdate = "UPDATE akses SET image_akses = ? WHERE id_akses = ?";
            $stmt = $Conn->prepare($sqlUpdate);
            $stmt->bind_param("si", $newFileName, $SessionIdAkses);

            if ($stmt->execute()) {
                $response["status"] = "Success";
                $response["message"] = "Foto profil berhasil diunggah.";
            } else {
                $response["message"] = "Gagal memperbarui database. Silakan coba lagi.";
                // Hapus file jika update gagal
                unlink($uploadPath);
            }
            $stmt->close();
        } else {
            $response["message"] = "Gagal mengunggah file. Silakan coba lagi.";
        }
    } else {
        $response["message"] = "Tidak ada file yang diunggah atau terjadi kesalahan.";
    }

    // Output response sebagai JSON
    echo json_encode($response);
?>
