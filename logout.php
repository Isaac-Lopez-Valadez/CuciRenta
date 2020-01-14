<?php
    include_once 'app/init.php';
    include_once 'app/clases/google_auth.php';

    $auth=new GoogleAuth();
    $auth->logout();
    header('Location: Inicio.php');

?>