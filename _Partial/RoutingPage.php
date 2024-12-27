<?php
    //Index Halaman
    $page_arry=[
        "Profil"=>"_Page/Profil/Profil.php",
        "Fitur"=>"_Page/Fitur/Fitur.php",
        "Entitas"=>"_Page/Entitas/Entitas.php",
        "Akses"=>"_Page/Akses/Akses.php",
        "LogAkses"=>"_Page/LogAkses/LogAkses.php",
    ];
    if (array_key_exists($Page, $page_arry)) { 
        include $page_arry[$Page]; 
    } else { 
        include "_Page/Home/Home.php"; 
    }
?>