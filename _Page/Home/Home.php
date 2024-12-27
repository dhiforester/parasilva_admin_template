<h1 class="mb-3">
    <a href="" class="title_page">
        <i class="bi bi-pie-chart"></i> Dashboard
    </a>
</h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Page Title</li>
    </ol>
</nav>
<p class="text-muted text_description">This is the description of the page. Add relevant details about the content here.</p>
<div class="content mt-3">
    <div class="row mb-3">
        <div class="col-md-12 mb-3">
            <div class="card card-transparant-outline">
                <div class="card-body">
                    <div class="swiper-container">
                        <!-- Slider main container -->
                        <div class="swiper-wrapper">
                            <!-- Slide 1 -->
                            <div class="swiper-slide">
                                <a href="" class="custome_item_icon text-center">
                                    <i class="bi bi-house"></i><br> Menu 1
                                </a>
                            </div>
                            <!-- Slide 2 -->
                            <div class="swiper-slide">
                                <a href="" class="custome_item_icon text-center">
                                    <i class="bi bi-house"></i><br> Menu 2
                                </a>
                            </div>
                            <!-- Slide 3 -->
                            <div class="swiper-slide">
                                <a href="" class="custome_item_icon text-center">
                                    <i class="bi bi-house"></i><br> Menu 3
                                </a>
                            </div>
                            <!-- Slide 4 -->
                            <div class="swiper-slide">
                                <a href="" class="custome_item_icon text-center">
                                    <i class="bi bi-house"></i><br> Menu 4
                                </a>
                            </div>
                            <!-- Slide 5 -->
                            <div class="swiper-slide">
                                <a href="" class="custome_item_icon text-center">
                                    <i class="bi bi-house"></i><br> Menu 5
                                </a>
                            </div>
                            <!-- Slide 6 -->
                            <div class="swiper-slide">
                                <a href="" class="custome_item_icon text-center">
                                    <i class="bi bi-house"></i><br> Menu 5
                                </a>
                            </div>
                            <!-- Slide 7 -->
                            <div class="swiper-slide">
                                <a href="" class="custome_item_icon text-center">
                                    <i class="bi bi-house"></i><br> Menu 6
                                </a>
                            </div>
                            <!-- Slide 8-->
                            <div class="swiper-slide">
                                <a href="" class="custome_item_icon text-center">
                                    <i class="bi bi-house"></i><br> Menu 7
                                </a>
                            </div>
                        </div>
                        <!-- Pagination and Navigation -->
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-lg-3 col-md-3 col-sm-6 col-6 mb-3">
        <div class="card dashboard card_dashboard_pelanggan">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-person"></i> Pelanggan</h5>
                <span class="count_pelanggan">540.000</span>
            </div>
        </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-6 mb-3">
        <div class="card dashboard card_dashboard_transaksi">
            <div class="card-body">
            <h5 class="card-title"><i class="bi bi-cart-check"></i> Transaksi</h5>
            <span class="count_transaksi">Rp 2.000.000</span>
            </div>
        </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-6 mb-3">
        <div class="card dashboard card_dashboard_kas">
            <div class="card-body">
            <h5 class="card-title"><i class="bi bi-coin"></i> Kas</h5>
            <span class="count_kas">Rp 120.000.000</span>
            </div>
        </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-6 mb-3">
        <div class="card dashboard card_dashboard_pengiriman">
            <div class="card-body">
            <h5 class="card-title"><i class="bi bi-truck"></i> Pengiriman</h5>
            <span class="count_pengiriman">Rp 36.000.000</span>
            </div>
        </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-9 mb-3">
        <div class="card">
            <div class="card-body" id="example_apexchart">
            <!-- Menampilkan Apex Chart Disini -->
            </div>
        </div>
        </div>
        <div class="col-md-3 text-center mb-3">
        <div class="card">
            <div class="card-body text-center" id="example_apexchart_donut">
            <!-- Example Apexchart Donut -->
            </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h4 class="card-hedaer">Contoh Tabel</h4>
            </div>
            <div class="card-body">
            <div class="table table-responsive ">
                <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Telepon</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody id="tabel_data_akses">
                    <tr>
                    <td class="text-center">1</td>
                    <td>Solihul Hadi</td>
                    <td>Jalan Anggrek 4</td>
                    <td>08123456789</td>
                    <td>dhiforester@gmail.com</td>
                    <td class="text-center">
                        <span class="badge badge-success">Active</label>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-outline-dark btn-floating">
                        <i class="bi bi-three-dots"></i>
                        </button>
                    </td>
                    </tr>
                    <!-- Data List Tabel Lainnya -->
                </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer text-center">
            <button type="button" class="btn btn-primary btn-floating">
                <i class="bi bi-chevron-left"></i>
            </button>
            <button type="button" class="btn btn-info btn-floating">
                1
            </button>
            <button type="button" class="btn btn-outline-primary btn-floating">
                2
            </button>
            <button type="button" class="btn btn-outline-primary btn-floating">
                3
            </button>
            <button type="button" class="btn btn-primary btn-floating">
                <i class="bi bi-chevron-right"></i>
            </button>
            </div>
        </div>
        </div>
    </div>
</div>