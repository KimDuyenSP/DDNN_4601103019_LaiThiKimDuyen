<?php

    require('admin/inc/essentials.php');
    require('admin/inc/db_config.php');
    require('admin/inc/mpdf/vendor/autoload.php');

    session_start();

    if(!(isset($_SESSION['login']) && $_SESSION['login']==true))
        {
            redirect('index.php');
        }
    
        

?>