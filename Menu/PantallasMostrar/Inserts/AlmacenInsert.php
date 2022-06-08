<?php
    

    include 'ConexionDB.php';

    $con = new conexion();
    $estadocon = $con->getCon();
    session_start();
    $Almc_Desc = $_POST['txtAlmc_Desc'];
    $Usua_UsuarioCrea = $_SESSION['Usua_Id'];


    $queryInsert = "EXEC Inv.UDP_tblAlmacenes_Insert '$Almc_Desc', '{$_SESSION['Usua_Id']}'";
    PRINT $queryInsert;
    $result = sqlsrv_prepare($estadocon, $queryInsert);

    if(sqlsrv_execute($result))
    {
        PRINT '<script>';
        PRINT 'alert("Se agrego con exito al usuario")';
        PRINT '</script>';
        header('location: ../pages-almacenesindex.php');
    }
    else
    {
        PRINT '<script>';
        PRINT 'alert("Error")';
        PRINT '</script>';
    }

?>