<?php
    

    include '../../../assets/conexion/ConexionDB.php';

    $con = new conexion();
    $estadocon = $con->getCon();
    session_start();
    $Vent_Id = $_POST['ddlVent_Id'];
    $Repartidor = $_POST['ddlRepartidor'];
    $Comunidad = $_POST['ddlComunidad'];
    $UsuarioCrea = $_SESSION['Usua_Id'];

    

    $queryInsert = "EXEC Vent.UDP_tblDomicilioDetalles_Insert '$Vent_Id', '$Repartidor', '$Comunidad', '{$_SESSION['Usua_Id']}'";
    PRINT $queryInsert;
    $result = sqlsrv_prepare($estadocon, $queryInsert);

    PRINT $result;
    if(sqlsrv_execute($result))
    {
        PRINT '<script>';
        PRINT 'alert("Se agrego con exito al usuario")';
        PRINT '</script>';
        header('location: ../pages-detallesdomiciliosindex.php');
    }
    else
    {
        PRINT '<script>';
        PRINT 'alert("Error")';
        PRINT '</script>';
    }

?>