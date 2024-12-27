<?php
    // Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Function.php";
    include "../../_Config/Session.php";

    date_default_timezone_set('Asia/Jakarta');
    $now = date('Y-m-d H:i:s');
    $date = date('Y-m-d');
    $time = date('H:i:s');

    // Inisialisasi pesan error pertama kali
    $response = ['success' => false, 'message' => ''];
    $errors = [];

    if (empty($SessionIdAkses)) {
        $errors[] = 'Sesi Akses Sudah Berakhir, Silahkan Login Ulang!';
    } else {
        // Validasi id_akses_album tidak boleh kosong
        if (empty($_POST['id_akses_album'])) {
            $errors[] = 'ID Album tidak boleh kosong!';
        } else {
            // Validasi file
            if (empty($_FILES['file_galeri']['name'][0])) {
                $errors[] = 'File foto tidak boleh kosong!';
            } else {
                // Buat Variabel
                $id_akses_album = $_POST['id_akses_album'];
                // Bersihkan Variabel
                $id_akses_album = validateAndSanitizeInput($id_akses_album);

                // Validasi dan proses file satu per satu
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
                $uploadedFiles = $_FILES['file_galeri'];
                $uploadedCount = count($uploadedFiles['name']);

                // Iterasi melalui semua file
                for ($i = 0; $i < $uploadedCount; $i++) {
                    $fileName = $uploadedFiles['name'][$i];
                    $fileTmp = $uploadedFiles['tmp_name'][$i];
                    $fileSize = $uploadedFiles['size'][$i];
                    $fileError = $uploadedFiles['error'][$i];
                    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                    $fileType = mime_content_type($fileTmp);

                    if (!in_array($fileExtension, $allowedExtensions) || !in_array($fileType, $allowedTypes)) {
                        $errors[] = "File \"$fileName\" tidak valid (format file tidak diizinkan).";
                        continue;
                    }
                    if ($fileSize > (5 * 1024 * 1024)) {
                        $errors[] = "File \"$fileName\" terlalu besar. Maksimal 5 MB.";
                        continue;
                    }

                    // Generate nama file unik
                    $file_galeri = bin2hex(random_bytes(16)) . '.' . $fileExtension;
                    $file_galeri_path = '../../assets/img/user_galeri/' . $file_galeri;

                    if (!move_uploaded_file($fileTmp, $file_galeri_path)) {
                        $errors[] = "Gagal mengunggah file \"$fileName\".";
                        continue;
                    }

                    $cover = 0; // Set nilai default
                    $caption = ''; // Set nilai default

                    // Insert data ke database
                    $query_galeri = "INSERT INTO akses_galeri (id_akses, id_akses_album, foto, caption, cover, created_at) 
                                    VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt_galeri = $Conn->prepare($query_galeri);
                    if ($stmt_galeri) {
                        $stmt_galeri->bind_param("isssis", $SessionIdAkses, $id_akses_album, $file_galeri, $caption, $cover, $now);

                        if (!$stmt_galeri->execute()) {
                            $errors[] = "Terjadi kesalahan saat menambahkan file \"$fileName\" ke database.";
                        }

                        $stmt_galeri->close();
                    } else {
                        $errors[] = "Gagal menyiapkan kueri untuk file \"$fileName\".";
                    }
                }

                if (empty($errors)) {
                    $response['success'] = true;
                    $response['message'] = 'Upload File Galeri Berhasil';
                }
            }
        }
    }

    if (!empty($errors)) {
        $response['message'] = implode('<br>', $errors);
    }

    echo json_encode($response);
?>
