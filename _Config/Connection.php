<?php
    //Ini adalah halaman untuk melakukan konfigurasi database local
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "hospital_ledger";
    $Conn = new mysqli($servername, $username, $password, $db);
    if ($Conn->connect_error) {
        die("Connection failed: " . $Conn->connect_error);
    }
?>