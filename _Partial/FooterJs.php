
<!-- MDB -->
<script type="text/javascript" src="assets/js/mdb.umd.min.js"></script>
<!-- Jquery  -->
<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
<!--Bootstrap js-->
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!--Sweet Alert 2-->
<script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<!-- apexcharts -->
<?php
    //Hanya Muncul Pada Halaman Tertentu
    if($Page==""){
        echo '<script src="node_modules/apexcharts/dist/apexcharts.min.js"></script>';
    }
?>
<!-- Lightbox -->
<script src="node_modules/lightbox2/dist/js/lightbox.js"></script>

<!-- Swiper -->
<script src="node_modules/swiper/swiper-bundle.min.js"></script>
<!-- Global js -->
<script src="assets/js/global-js.js"></script>