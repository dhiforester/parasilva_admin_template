<?php
    session_start();
    include "../../_Config/Connection.php";

    // Set header agar selalu mengembalikan JSON
    header('Content-Type: application/json'); 
    date_default_timezone_set('Asia/Jakarta');
    $date_creat = date('Y-m-d H:i:s');
    $expired_seconds = 60 * 60; // 1 hour
    $date_expired = date('Y-m-d H:i:s', strtotime($date_creat) + $expired_seconds);

    function generateToken($length = 32) {
        return bin2hex(random_bytes($length / 2));
    }

    function validateAndSanitizeInput($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    $response = [];
    if (empty($_POST["email"])) {
        $response['status'] = 'error';
        $response['message'] = 'Email tidak boleh kosong';
    } elseif (empty($_POST["password"])) {
        $response['status'] = 'error';
        $response['message'] = 'Password tidak boleh kosong';
    } elseif (empty($_POST["captcha"])) {
        $response['status'] = 'error';
        $response['message'] = 'Captcha tidak boleh kosong';
    }else{
        //Bersihkan Variabel Dari Ilegal Karakter
        $email = validateAndSanitizeInput($_POST["email"]);
        $password = validateAndSanitizeInput($_POST["password"]);
        $captcha = validateAndSanitizeInput($_POST["captcha"]);

        //Validasi Captcha
        if ($captcha!==$_SESSION['captcha']){
            $response['status'] = 'error';
            $response['message'] = 'Captcha tidak valid';
        }else{
            // Memeriksa apakah pengguna dengan email tersebut ada di database
            $stmt = $Conn->prepare("SELECT * FROM akses WHERE email_akses = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $DataAkses = $result->fetch_assoc();

            if ($DataAkses && password_verify($password, $DataAkses['password'])) {
                $id_akses = $DataAkses["id_akses"];
                // Hapus token lama
                $deleteTokenStmt = $Conn->prepare("DELETE FROM akses_login WHERE id_akses = ?");
                $deleteTokenStmt->bind_param("s", $id_akses);
                $deleteTokenStmt->execute();

                // Buat token baru
                $token = generateToken();
                $insertTokenStmt = $Conn->prepare("INSERT INTO akses_login (id_akses, token, date_creat, date_expired) VALUES (?, ?, ?, ?)");
                $insertTokenStmt->bind_param("isss", $id_akses, $token, $date_creat, $date_expired);
                $InputAksesLogin = $insertTokenStmt->execute();

                if ($InputAksesLogin) {
                    $_SESSION["id_akses"] = $id_akses;
                    $_SESSION["login_token"] = $token;
                    $_SESSION["NotifikasiSwal"] = "Login Berhasil";

                    $response['status'] = 'success';
                } else {
                    $response['status'] = 'error';
                    $response['message'] = 'Terjadi kesalahan pada saat membuat sesi login';
                }
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Kombinasi password dan email yang Anda gunakan tidak valid';
            }
        }
        echo json_encode($response);
    }
?>
