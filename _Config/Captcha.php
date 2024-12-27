<?php
    session_start();

    // Fungsi untuk membuat kode Captcha
    function GenerateCaptcha($length = 5) {
        $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789'; // Menghindari karakter ambigu seperti O, 0, I, dan 1
        $captcha = '';
        for ($i = 0; $i < $length; $i++) {
            $captcha .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $captcha;
    }

    // Set Captcha di session
    $_SESSION['captcha'] = GenerateCaptcha(5);

    // Header untuk gambar
    header('Content-Type: image/png');

    // Ukuran gambar
    $width = 150;
    $height = 50;

    // Membuat gambar kosong
    $image = imagecreatetruecolor($width, $height);

    // Warna latar belakang
    $bgColor = imagecolorallocate($image, 255, 255, 255); // Putih
    imagefill($image, 0, 0, $bgColor);

    // Tambahkan noise berupa titik acak
    for ($i = 0; $i < 100; $i++) {
        $dotColor = imagecolorallocate($image, rand(200, 255), rand(200, 255), rand(200, 255));
        imagesetpixel($image, rand(0, $width), rand(0, $height), $dotColor);
    }

    // Tambahkan garis noise acak
    for ($i = 0; $i < 5; $i++) {
        $lineColor = imagecolorallocate($image, rand(150, 200), rand(150, 200), rand(150, 200));
        imageline($image, rand(0, $width), rand(0, $height), rand(0, $width), rand(0, $height), $lineColor);
    }

    // Warna teks Captcha
    $textColor = imagecolorallocate($image, 0, 0, 0); // Hitam

    // Path ke font
    $font = __DIR__ . '/../assets/font/ClassicalDiary.ttf';

    // Tambahkan teks Captcha ke gambar
    $fontSize = 20;
    $textX = 10; // Posisi X
    $textY = 35; // Posisi Y
    imagettftext($image, $fontSize, 0, $textX, $textY, $textColor, $font, $_SESSION['captcha']);

    // Output gambar
    imagepng($image);

    // Membersihkan memori
    imagedestroy($image);
?>
