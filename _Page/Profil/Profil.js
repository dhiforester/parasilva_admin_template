//Fungsi Untuk Menampilkan Album
function ShowListAlbum() {
    $('#ListAlbum').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Load Data...');
    $.ajax({
        type: 'POST',
        url: '_Page/Profil/ListAlbum.php',
        success: function(data) {
            $('#ListAlbum').html(data);
        }
    });
}
$(document).ready(function () {
    //Menampilkan Data Album
    ShowListAlbum();
    // Menampilkan Grafik Log
    $.ajax({
        type: "GET",
        url: "_Page/Profil/GrafikLog.php",
        dataType: "json",
        success: function(data) {
            var options = {
                series: [{
                    name: "Log Aktivitas",
                    data: data
                }],
                chart: {
                    height: 350,
                    type: "area"
                },
                toolbar: {
                    show: false,
                },
                xaxis: {
                    type: "category"
                }
            };
            var chart = new ApexCharts(document.getElementById("GrafikAktifitas"), options);
            chart.render();
        },
        error: function(xhr, status, error) {
            console.log("Error: " + error);
        }
    });

    $("#ProsesUploadFoto").on("submit", function (e) {
        e.preventDefault(); // Mencegah reload halaman

        // Ubah tombol upload menjadi spinner dan disable
        let $buttonUpload = $("#ButtonUploadFoto");
        $buttonUpload.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Uploading...');
        $buttonUpload.prop("disabled", true);

        // Ambil data form
        let formData = new FormData(this);

        // Kirim data ke server menggunakan AJAX
        $.ajax({
            url: "_Page/Profil/ProsesUploadFoto.php",
            type: "POST",
            data: formData,
            contentType: false, // Untuk menghindari pengaturan header default
            processData: false, // Untuk menghindari pengolahan data
            dataType: "json", // Respons yang diharapkan dari server
            success: function (response) {
                if (response.status === "Success") {
                    // Reset tombol
                    $buttonUpload.html("Upload");
                    $buttonUpload.prop("disabled", false);

                    // Tutup modal
                    $("#ModalUbahFotoProfil").modal("hide");

                    // Tampilkan swal notifikasi
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil!",
                        text: response.message,
                        confirmButtonText: "OK",
                    }).then(() => {
                        // Reload halaman setelah swal ditutup
                        location.reload();
                    });
                } else {
                    // Tampilkan pesan error
                    $("#NotifikasiUploadFoto").html(
                        `<div class="alert alert-danger" role="alert">${response.message}</div>`
                    );

                    // Reset tombol
                    $buttonUpload.html("Upload");
                    $buttonUpload.prop("disabled", false);
                }
            },
            error: function () {
                // Tampilkan pesan error jika gagal
                $("#NotifikasiUploadFoto").html(
                    '<div class="alert alert-danger" role="alert">Terjadi kesalahan pada sistem. Silakan coba lagi.</div>'
                );

                // Reset tombol
                $buttonUpload.html("Upload");
                $buttonUpload.prop("disabled", false);
            },
        });
    });
    //Proses Buat Album
    $("#ProsesBuatAlbum").on("submit", function (e) {
        // Mencegah reload halaman
        e.preventDefault(); 
        // Ubah tombol upload menjadi spinner dan disable
        let $ButtonBuatAlbum = $("#ButtonBuatAlbum");
        $ButtonBuatAlbum.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...');
        $ButtonBuatAlbum.prop("disabled", true);

        // Ambil data form
        let formData = new FormData(this);

        // Kirim data ke server menggunakan AJAX
        $.ajax({
            url: "_Page/Profil/ProsesBuatAlbum.php",
            type: "POST",
            data: formData,
            contentType: false, // Untuk menghindari pengaturan header default
            processData: false, // Untuk menghindari pengolahan data
            dataType: "json", // Respons yang diharapkan dari server
            success: function (response) {
                //Jika Berhasil
                if (response.status === "Success") {
                    // Reset tombol
                    $ButtonBuatAlbum.html('<i class="bi bi-save"></i> Simpan');
                    $ButtonBuatAlbum.prop("disabled", false);
                    //Reset Form
                    $('#ProsesBuatAlbum').trigger('reset');
                    // Tutup modal
                    $("#ModalBuatAlbum").modal("hide");
                    // Tampilkan swal notifikasi
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil!",
                        text: response.message,
                        confirmButtonText: "OK",
                    })
                    ShowListAlbum();
                } else {
                    // Tampilkan pesan error
                    $("#NotifikasiBuatAlbum").html(
                        `<div class="alert alert-danger" role="alert">${response.message}</div>`
                    );

                    // Reset tombol
                    $ButtonBuatAlbum.html('<i class="bi bi-save"></i> Simpan');
                    $ButtonBuatAlbum.prop("disabled", false);
                }
            },
            error: function () {
                // Tampilkan pesan error jika gagal
                $("#NotifikasiBuatAlbum").html(
                    '<div class="alert alert-danger" role="alert">Terjadi kesalahan pada sistem. Silakan coba lagi.</div>'
                );

                // Reset tombol
                $ButtonBuatAlbum.html('<i class="bi bi-save"></i> Simpan');
                $ButtonBuatAlbum.prop("disabled", false);
            },
        });
    });
    //Ketika Modal Form Tambah Galeri Muncul
    $('#ModalUploadGaleri').on('show.bs.modal', function (e) {
        var id_akses_album = $(e.relatedTarget).data('id');
        $('#PutIdAksesAlbum').val(id_akses_album);
    });
    //Proses Upload Galeri
    $('#ProsesUploadGaleri').on('submit', function(e) {
        e.preventDefault();
        // Mengubah teks tombol menjadi 'Loading..' dan menonaktifkan tombol
        $('#ButtonUploadGaleri').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Uploading...').prop('disabled', true);
        // Membuat objek FormData
        var formData = new FormData(this);
        // Mengirim data melalui AJAX
        $.ajax({
            url             : '_Page/Profil/ProsesUploadGaleri.php',
            type            : 'POST',
            data            : formData,
            contentType     : false,
            processData     : false,
            dataType        : 'json',
            success: function(response) {
                if (response.success) {
                    // Jika sukses, tutup modal dan kembalikan tombol ke semula
                    $('#ProsesUploadGaleri')[0].reset();
                    $('#ModalUploadGaleri').modal('hide');
                    $('#ButtonUploadGaleri').html('<i class="bi bi-upload"></i> Upload').prop('disabled', false);
                    $('#NotifikasiUploadGaleri').html('');
                    // Tampilkan swal notifikasi
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil!",
                        text: response.message,
                        confirmButtonText: "OK",
                    }).then(() => {
                        // Reload halaman setelah swal ditutup
                        location.reload();
                    });
                } else {
                    // Jika gagal, tampilkan notifikasi error
                    $('#NotifikasiUploadGaleri').html('<div class="alert alert-danger"><small>' + response.message + '</small></div>');
                    $('#ButtonUploadGaleri').html('<i class="bi bi-upload"></i> Upload').prop('disabled', false);
                }
            },
            error: function() {
                // Jika terjadi error pada request
                $('#NotifikasiUploadGaleri').html('<div class="alert alert-danger">Terjadi kesalahan saat mengirim data.</div>');
                $('#ButtonUploadGaleri').html('<i class="bi bi-upload"></i> Upload').prop('disabled', false);
            }
        });
    });
});
