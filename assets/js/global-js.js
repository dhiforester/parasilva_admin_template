$(document).ready(function() {
    // Event listener untuk tombol dengan ID #back_home
    $('#back_home').on('click', function(event) {
        event.preventDefault(); // Mencegah aksi default jika tombol adalah tautan
        window.location.href = 'index.html'; // Mengarahkan ke halaman index.php
    });
});
