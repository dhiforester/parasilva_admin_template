<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";

    // Mendapatkan tahun sekarang
    $currentYear = date("Y");

    // Array untuk menyimpan nama-nama bulan
    $months = array(
        1 => "January", 2 => "February", 3 => "March", 4 => "April",
        5 => "May", 6 => "June", 7 => "July", 8 => "August",
        9 => "September", 10 => "October", 11 => "November", 12 => "December"
    );

    // Inisialisasi array untuk menyimpan jumlah data per bulan
    $data = array_fill(1, 12, 0);

    // Query untuk mendapatkan data log bulanan pada tahun sekarang
    $query = "SELECT MONTH(datetime_log) AS bulan, COUNT(*) AS jumlah
            FROM log
            WHERE YEAR(datetime_log) = ? AND id_akses = ?
            GROUP BY MONTH(datetime_log)
            ORDER BY bulan";

    $stmt = $Conn->prepare($query);
    $stmt->bind_param("ii", $currentYear, $SessionIdAkses);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $data[$row["bulan"]] = $row["jumlah"];
    }

    $stmt->close();
    $Conn->close();

    // Mengubah data menjadi format yang sesuai untuk grafik
    $chartData = array();
    foreach ($data as $bulan => $jumlah) {
        $chartData[] = array(
            "x" => $months[$bulan],
            "y" => $jumlah
        );
    }

    // Mengembalikan data dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($chartData);
?>
