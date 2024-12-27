<!-- Modal -->
<div class="modal fade" id="ModalUbahFotoProfil" tabindex="-1" aria-labelledby="uploadFotoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="javascript::void(0);" id="ProsesUploadFoto">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadFotoModalLabel">Upload Foto Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="foto_akses" class="form-label">Pilih Foto</label>
                        <input class="form-control" type="file" id="foto_akses" name="foto_akses" accept="image/*" required>
                        <small>
                            Maksimum 5 mb (JPG, JPEG, GIF, PNG)
                        </small>
                    </div>
                    <div class="mb-3" id="NotifikasiUploadFoto">
                        <!-- Apabila Ada Masalah Upload Akan Ditampilkan Disini -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" id="ButtonUploadFoto" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Buat Album -->
<div class="modal fade" id="ModalBuatAlbum" tabindex="-1" aria-labelledby="ModalBuatAlbumLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="javascript::void(0);" id="ProsesBuatAlbum">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalBuatAlbumLabel">
                        <i class="bi bi-folder-plus"></i> Buat Album Baru
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_album" class="form-label">Nama Album</label>
                        <input class="form-control" type="text" id="nama_album" name="nama_album" placeholder="Contoh : Galeri Narsis" required>
                    </div>
                    <div class="mb-3" id="NotifikasiBuatAlbum">
                        <!-- Apabila Ada Masalah Upload Akan Ditampilkan Disini -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x"></i> Batal
                    </button>
                    <button type="submit" id="ButtonBuatAlbum" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Upload Galeri -->
<div class="modal fade" id="ModalUploadGaleri" tabindex="-1" aria-labelledby="ModalUploadGaleri:Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="javascript::void(0);" id="ProsesUploadGaleri">
                <input type="hidden" name="id_akses_album" id="PutIdAksesAlbum">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalUploadGaleriLabel">
                        <i class="bi bi-upload"></i> Upload Galeri
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="file_galeri" class="form-label">File Galeri</label>
                        <input type="file" name="file_galeri[]" id="file_galeri" class="form-control" multiple>
                        <small id="ValidasiFileGaleri">
                            <code class="text text-dark">
                                Foto yang digunakan maksimal 5 MB (JPG, JPEG, PNG Atau GIF)
                            </code>
                        </small>
                    </div>
                    <div class="mb-3" id="NotifikasiUploadGaleri">
                        <!-- Apabila Ada Masalah Upload Akan Ditampilkan Disini -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x"></i> Batal
                    </button>
                    <button type="submit" id="ButtonUploadGaleri" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
