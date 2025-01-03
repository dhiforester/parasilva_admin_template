$(document).ready(function() {
    $('#ProsesLogin').on('submit', function(e) {
        e.preventDefault(); // Mencegah form submit secara default
        // Ambil data dari form
        var email = $('#email').val();
        var password = $('#password').val();
        var captcha = $('#captcha').val();
        // Tombol diubah menjadi "Loading..." saat proses
        var $submitButton = $(this).find('button[class="button_login"]');
        $submitButton.html('Loading...').prop('disabled', true);
        // Lakukan AJAX request ke ProsesLogin.php
        $.ajax({
            url: '_Page/Login/ProsesLogin.php',
            method: 'POST',
            data: {
                email: email,
                password: password,
                captcha: captcha
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Redirect jika login berhasil
                    window.location.href = 'index.php';
                } else {
                    // Tampilkan notifikasi error jika gagal
                    $('#NotifikasiLogin').html('<div class="alert alert-danger">' + response.message + '</div>');
                    $submitButton.html('<i class="bi bi-check-circle"></i> Login').prop('disabled', false);
                }
            }
        });
    });
});
