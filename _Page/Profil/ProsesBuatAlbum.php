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

    // Periksa apakah `nama_album` ada dalam request dan tidak kosong
    if (empty($_POST['nama_album'])) {
        $response = [
            "status" => "Error",
            "message" => "Nama Album Tidak Boleh Kosong"
        ];
    } else {
        // Ambil dan sanitasi input
        $nama_album = validateAndSanitizeInput($_POST['nama_album']);
        // Validasi panjang nama_album
        if (strlen($nama_album) > 50) {
            $response = [
                "status" => "Error",
                "message" => "Nama Album Tidak Boleh Lebih Dari 50 Karakter"
            ];
        } else {
            // Gunakan prepared statement untuk keamanan
            $stmt = $Conn->prepare("INSERT INTO akses_album (id_akses, nama_album) VALUES (?, ?)");
            if ($stmt) {
                $stmt->bind_param("is", $SessionIdAkses, $nama_album); // Bind parameter
                if ($stmt->execute()) {
                    $response["status"] = "Success";
                    $response["message"] = "Album berhasil ditambahkan.";
                } else {
                    $response["message"] = "Gagal menyimpan data ke dalam database.";
                }
                $stmt->close(); // Tutup statement
            } else {
                $response["message"] = "Gagal menyiapkan pernyataan database.";
            }
        }
    }

    // Tutup koneksi database jika diperlukan (opsional)
    // $Conn->close();

    // Output response sebagai JSON
    header('Content-Type: application/json');
    echo json_encode($response);
?>
