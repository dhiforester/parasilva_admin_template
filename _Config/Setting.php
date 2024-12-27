<?php
    // Asumsikan $Conn adalah koneksi MySQLi yang valid
    $id_setting_general = 1;
    // Setting harus ditempatkan setelah koneksi
    $QrySetting = $Conn->prepare("SELECT * FROM setting_general WHERE id_setting_general = ?");
    if ($QrySetting) {
        $QrySetting->bind_param("s", $id_setting_general);
        $QrySetting->execute();
        $ResultSetting = $QrySetting->get_result();
        $DataSetting = $ResultSetting->fetch_assoc() ?? []; // Pastikan $DataSetting adalah array

        // Buka Data Setting dengan nilai default
        $id_setting_general = $DataSetting['id_setting_general'] ?? "";
        $title_page = $DataSetting['title_page'] ?? "";
        $kata_kunci = $DataSetting['kata_kunci'] ?? "";
        $deskripsi = $DataSetting['deskripsi'] ?? "";
        $alamat_bisnis = $DataSetting['alamat_bisnis'] ?? "";
        $email_bisnis = $DataSetting['email_bisnis'] ?? "";
        $telepon_bisnis = $DataSetting['telepon_bisnis'] ?? "";
        $favicon = $DataSetting['favicon'] ?? "";
        $logo = $DataSetting['logo'] ?? "";
        $base_url = $DataSetting['base_url'] ?? "";

        // Menutup statement
        $QrySetting->close();
    } else {
        // Tangani kesalahan jika statement tidak bisa dipersiapkan
        die("Query tidak dapat dipersiapkan: " . $Conn->error);
    }
?>
