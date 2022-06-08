<?php
    

    include 'ConexionDB.php';

    $con = new conexion();
    $estadocon = $con->getCon();
    session_start();
    $Menu= $_POST['ddlMenu'];
    $Vent_Id = $_POST['ddlVent_Id'];
    $VeDe_Cantidad = $_POST['txtVeDe_Cantidad'];
    $UsuarioCrea = $_SESSION['Usua_Id'];

    

    $queryInsert = "EXEC Vent.UDP_tblVentaDetalles_Insert '$Vent_Id', '$Menu', '$VeDe_Cantidad', '{$_SESSION['Usua_Id']}'";
    PRINT $queryInsert;
    $result = sqlsrv_prepare($estadocon, $queryInsert);

    PRINT $result;
    if(sqlsrv_execute($result))
    {
        PRINT '<script>';
        PRINT 'alert("Se agrego con exito al usuario")';
        PRINT '</script>';
        header('location: ../pages-ventadetalles.php');
    }
    else
    {
        PRINT '<script>';
        PRINT 'alert("Error")';
        PRINT '</script>';
    }

?>