<?php
    session_start();
    include "_Config/Connection.php";
    include "_Config/Function.php";
    include "_Config/Setting.php";
    //Menghapus Session Captcha Sebelumnya
    session_destroy();   
    session_unset();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Login</title>
        <!-- MDB icon -->
        <link rel="icon" href="assets/img/favicon.png" type="image/x-icon" />
        <!-- Bootstrap Icon -->
        <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
        <!-- Google Fonts Roboto -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"/>
        <!--bootstrap css-->
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css" />
        <!-- MDB -->
        <link rel="stylesheet" href="assets/css/mdb.min.css" />
        <!-- Custom CSS -->
        <link rel="stylesheet" href="assets/css/custom.css?v=1.2" />
    </head>
    <body class="body_login">
        <form action="javascript:void(0);" id="ProsesLogin">
            <!-- Main Content -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <!-- <img src="assets/img/logo/logo-secondary.png" class="m-3" alt="" width="100px"><br> -->
                        <a href="" class="text-white nama_web">Hospital Ledger V.1.0.0</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 text-center">
                        <div class="card mt-4">
                            <div class="card-header text-lg-center">
                                <h3 class="card-title"><i class="bi bi-lock"></i> Login Form</h3>
                                <small>Silahkan Masukan Email dan Password Anda Disini</small>
                            </div>
                            <div class="card-body text-start">
                                <div class="mb-3 text-lg-start">
                                    <label for="email" class="form-label">Alamat Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-envelope"></i>
                                        </span>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="mb-3 text-lg-start">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-key"></i>
                                        </span>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                        <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                            <i class="bi bi-eye" id="eyeIcon"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-3 text-lg-start">
                                    <label for="captcha" class="form-label">Captcha</label>
                                    <img src="_Config/Captcha.php" class="mb-2" id="captchaImage" alt="No Image" width="100%" style="border: 1px solid #ddd; margin-right: 10px;"/>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <a href="javascript:void(0);" onclick="reloadCaptcha()">
                                                <i class="bi bi-arrow-clockwise"></i>
                                            </a>
                                        </span>
                                        <input type="text" class="form-control" id="captcha" name="captcha" required>
                                    </div>
                                    
                                </div>
                                <div class="mb-3 text-lg-start" id="NotifikasiLogin">
                                    <!-- Apabila Proses Login Gagal, Maka Notifikasi Akan Ditampilkan Disini -->
                                </div>
                            </div>
                            <div class="card-footer border-0">
                                <button type="submit" class="button_login">
                                    <i class="bi bi-check-circle"></i> Login
                                </button>
                                <button type="submit" class="button_google">
                                    <i class="bi bi-google"></i> Login Dengan Google
                                </button>
                                <a href="">
                                    <small>Lupa Password?</small>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </form>
        <!-- MDB -->
        <script type="text/javascript" src="assets/js/mdb.umd.min.js"></script>
        <!-- Jquery  -->
        <script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
        <!--Bootstrap js-->
        <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!--Sweet Alert 2-->
        <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
        <!-- JS Login -->
        <script src="_Page/Login/Login.js"></script>
        <script>
            //Untuk menampilkan password
            const togglePassword = document.querySelector("#togglePassword");
            const passwordField = document.querySelector("#password");
            const eyeIcon = document.querySelector("#eyeIcon");

            togglePassword.addEventListener("click", function () {
                // Toggle jenis input antara 'password' dan 'text'
                const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
                passwordField.setAttribute("type", type);

                // Toggle ikon mata
                eyeIcon.classList.toggle("bi-eye");
                eyeIcon.classList.toggle("bi-eye-slash");
            });
            function reloadCaptcha() {
                document.getElementById('captchaImage').src = '_Config/Captcha.php?' + new Date().getTime();
            }
        </script>
    </body>
</html>