<?php
    if($Page=="Profil"){
        include "_Page/Profil/ModalProfil.php";
    }elseif($Page=="Akses"){
        include "_Page/Akses/ModalAkses.php";
    }else{
        
    }
    //Modal Global
    include "_Page/Logout/ModalLogout.php";
?>