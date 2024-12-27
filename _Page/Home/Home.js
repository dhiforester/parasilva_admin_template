//Show example_apexchart
$(document).ready(function () {
    // Data dan konfigurasi chart
    var options = {
    chart: {
        type: 'line',
        height: 350,
        toolbar: {
        show: true, // Menampilkan toolbar pada chart
        },
    },
    series: [
        {
        name: 'Sales',
        data: [10, 41, 35, 51, 49, 62, 69, 91, 148], // Contoh data
        },
    ],
    xaxis: {
        categories: [
        'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep',
        ], // Kategori untuk sumbu X
    },
    title: {
        text: 'Sales Trends', // Judul chart
        align: 'center',
    },
    stroke: {
        curve: 'smooth', // Garis lembut
    },
    markers: {
        size: 4, // Ukuran titik data
    },
    colors: ['#7532f9'], // Warna garis
    };

    // Render chart ke dalam div dengan ID example_apexchart
    var chart = new ApexCharts(document.querySelector('#example_apexchart'), options);
    chart.render();
});
$(document).ready(function () {
    // Konfigurasi dan data chart
    var options = {
    chart: {
        type: 'donut',
        height: 350,
    },
    series: [44, 55, 41, 17, 15], // Data untuk chart
    labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'], // Label kategori
    colors: ['#7532f9', '#5a20b5', '#4a17a2', '#cce1ff', '#7430f9'], // Warna custom
    title: {
        text: 'Team Performance', // Judul chart
        align: 'center',
    },
    legend: {
        position: 'bottom', // Posisi legenda
    },
    responsive: [
        {
        breakpoint: 480,
        options: {
            chart: {
            width: 300, // Lebar chart untuk layar kecil
            },
            legend: {
            position: 'bottom', // Posisi legenda untuk layar kecil
            },
        },
        },
    ],
    };

    // Render chart ke dalam div dengan ID example_apexchart_donut
    var chart = new ApexCharts(document.querySelector('#example_apexchart_donut'), options);
    chart.render();
});

// Fungsi untuk memuat data dari file JSON
function loadData() {
    // URL file JSON
    var jsonFile = 'json_data/akses.json';

    // Membersihkan tabel sebelum menambahkan data baru
    $('#tabel_data_akses').empty();

    // Mengambil data JSON menggunakan AJAX
    $.getJSON(jsonFile, function(data) {
        var no = 1; // Inisialisasi nomor urut
        $.each(data, function(index, item) {
            // Menentukan warna badge berdasarkan status
            var badgeClass = item.status === 'Active' ? 'badge-success' : 'badge-danger';

            // Menambahkan baris data ke tabel
            $('#tabel_data_akses').append(`
                <tr>
                    <td class="text-center">${no++}</td>
                    <td>${item.nama}</td>
                    <td>${item.alamat || '-'}</td>
                    <td>${item.kontak}</td>
                    <td>${item.email}</td>
                    <td class="text-center">
                        <span class="badge ${badgeClass}">${item.status}</span>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-outline-dark btn-floating">
                            <i class="bi bi-three-dots"></i>
                        </button>
                    </td>
                </tr>
            `);
        });
    }).fail(function() {
        // Menampilkan pesan error jika file tidak ditemukan atau gagal dimuat
        $('#tabel_data_akses').html('<tr><td colspan="7" class="text-center text-danger">Gagal memuat data</td></tr>');
    });
}

// Memuat data saat halaman selesai dimuat
loadData();