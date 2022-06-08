<?php
    

    include '../../../assets/conexion/ConexionDB.php';

    $con = new conexion();
    $estadocon = $con->getCon();
    session_start();
    $Comp_Fecha= $_POST['txtComp_Fecha'];
    $Comp_NoOrden = $_POST['txtComp_NoOrden'];
    $Comp_IVA = $_POST['txtComp_IVA'];
    $UsuarioCrea = $_SESSION['Usua_Id'];


    

    $queryInsert = "EXEC Inv.UDP_tblCompras_Insert '$Comp_Fecha', '$Comp_NoOrden', '$Comp_IVA', '{$_SESSION['Usua_Id']}'";
    PRINT $queryInsert;
    $result = sqlsrv_prepare($estadocon, $queryInsert);

    PRINT $result;
    if(sqlsrv_execute($result))
    {
        PRINT '<script>';
        PRINT 'alert("Se agrego con exito al usuario")';
        PRINT '</script>';
        header('location: ../pages-comprasindex.php');
    }
    else
    {
        PRINT '<script>';
        PRINT 'alert("Error")';
        PRINT '</script>';
    }

?>