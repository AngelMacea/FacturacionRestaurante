<?php
    session_start();
    include 'ConexionDB.php';

    $con = new conexion();
    $estadocon = $con->getCon();

    $usuario = $_POST['txtUsuario'];
    $pass = $_POST['txtPass'];
    $_SESSION["Usuario"]=$usuario;
    $query = "EXEC Acce.UDP_tblUsuarios_Validacion '$usuario','$pass'";
    $result = sqlsrv_query($estadocon, $query);

    if(sqlsrv_has_rows($result) != 1){
        PRINT '<script>';
        PRINT 'alert("El usuarioo contraseña son incorrectos")';
        PRINT '</script>';

        PRINT '<script>';
        PRINT 'window.location= "pages-login.php" ';
        PRINT '</script>';
    }
    else{
        session_start();
        $row = sqlsrv_fetch_array($result);
        PRINT '<script>';
        PRINT 'window.location= "../Menu/PantallasMostrar/blank.php" ';
        PRINT '</script>';

    }

        PRINT '<script>';
        PRINT 'window.location= "pages-login.php" ';
        PRINT '</script>';
    
   


?>
