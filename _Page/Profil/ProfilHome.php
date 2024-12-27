<h1 class="mb-3">
    <a href="" class="title_page">
        <i class="bi bi-person-circle"></i> Profile
    </a>
</h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Profil</li>
    </ol>
</nav>
<div class="content mt-3">
    <div class="row mb-3">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col col-md-10">
                            <h4>Profil Anda</h4>
                        </div>
                        <div class="col col-md-2 text-end">
                            <button type="button" class="btn btn-md btn-outline-secondary btn-floating" id="MenuProfil" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu bg-light" aria-labelledby="MenuProfil">
                                <li>
                                    <a class="dropdown-item" href="javascript::void(0);" data-bs-toggle="modal" data-bs-target="#ModalUbahProfil">
                                        Ubah Profil
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javascript::void(0);" data-bs-toggle="modal" data-bs-target="#ModalUbahPassword">
                                        Ubah Password
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javascript::void(0);" data-bs-toggle="modal" data-bs-target="#ModalUbahFotoProfil">
                                        Ubah Foto
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider" /></li>
                                <li>
                                    <a class="dropdown-item" href="javascript::void(0);" data-bs-toggle="modal" data-bs-target="#ModalIjinAkses">
                                        Ijin Akses
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javascript::void(0);" data-bs-toggle="modal" data-bs-target="#ModalLogAktivitas">
                                        Log Aktivitas
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-3 mb-4 text-center">
                            <div class="position-relative text-center">
                                <a href="javascript:void(0);" class="upload_foto_profil" data-bs-toggle="modal" data-bs-target="#ModalUbahFotoProfil">
                                    <img src="<?php echo $url_image_akses; ?>" class="rounded-circle foto_profil" alt="Foto Profil" width="70%">
                                    <div class="overlay-profil text-center">
                                        <span class="text-upload">Upload <i class="bi bi-upload"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9 mb-4">
                            <div class="row mb-3">
                                <div class="col col-md-2">Nama Lengkap</div>
                                <div class="col col-md-10">
                                    <small class="text text-secondary"><?php echo $nama_akses; ?></small>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col col-md-2">Alamat Email</div>
                                <div class="col col-md-10">
                                    <small class="text text-secondary"><?php echo $email_akses; ?></small>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col col-md-2">Nomor Kontak</div>
                                <div class="col col-md-10">
                                    <small class="text text-secondary"><?php echo $kontak_akses; ?></small>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col col-md-2">Entitas/Akses</div>
                                <div class="col col-md-10">
                                    <small class="text text-secondary"><?php echo $akses; ?></small>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col col-md-2">Datetime</div>
                                <div class="col col-md-10">
                                    <small class="text text-secondary"><?php echo $datetime_daftar; ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <h4>Grafik Aktivitas Anda</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-12"  id="GrafikAktifitas">
                            <!-- Grafik Aktivitas Akan Muncul Disini -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col col-md-10 mb-3">
                            <h4>Album & Galeri</h4>
                        </div>
                        <div class="col col-md-2 mb-3">
                            <button type="button" class="btn btn-lg btn-outline-warning btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalBuatAlbum">
                                <i class="bi bi-folder-plus"></i> Buat Album
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="ListAlbum">
                    <!-- Grafik Aktivitas Akan Muncul Disini -->
                </div>
            </div>
        </div>
    </div>
</div>