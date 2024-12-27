$(document).ready(function() {
    // Simpan preloader aktif selama 1 detik setelah halaman dimuat
    setTimeout(function () {
        $('#preloader').fadeOut('slow', function () {
        $(this).remove(); // Hapus elemen preloader dari DOM
        });
    }, 1000); // Delay 1 detik
    // Event listener untuk tombol dengan ID #back_home
    $('#back_home').on('click', function(event) {
        event.preventDefault(); // Mencegah aksi default jika tombol adalah tautan
        window.location.href = 'index.html'; // Mengarahkan ke halaman index.php
    });
});

const swiper = new Swiper('.swiper-container', {
    slidesPerView: 4, 
    spaceBetween: 10, 
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    breakpoints: {
        // Responsif: menampilkan 2 card per halaman pada layar kecil
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 4, // Kembali ke 4 card per halaman pada layar lebih besar
        },
    },
});