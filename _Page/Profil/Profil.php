<?php
    $Sub = $_GET['Sub'] ?? "";
    if(empty($Sub)){
        include "_Page/Profil/ProfilHome.php";
    }else{
        if($Sub=="Galeri"){
            include "_Page/Profil/ProfilGaleri.php";
        }
    }
?>