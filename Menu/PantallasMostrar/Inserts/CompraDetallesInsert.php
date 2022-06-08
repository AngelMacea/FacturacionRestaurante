<?php
    

    include '../../../assets/conexion/ConexionDB.php';

    $con = new conexion();
    $estadocon = $con->getCon();
    session_start();
    $Comp_Id= $_POST['ddlComp_NoOrden'];
    $Ingr_Id = $_POST['ddlIngr_Id'];
    $CompDe_PrecioCompra = $_POST['txtCompDe_PrecioCompra'];
    $CompDe_Cantidad = $_POST['txtCompDe_Cantidad'];
    $UsuarioCrea = $_SESSION['Usua_Id'];

    

    $queryInsert = "EXEC Inv.UDP_tblCompraDetalles_Insert '$Comp_Id', '$Ingr_Id', '$CompDe_PrecioCompra', '$CompDe_Cantidad','{$_SESSION['Usua_Id']}'";
    PRINT $queryInsert;
    $result = sqlsrv_prepare($estadocon, $queryInsert);

    PRINT $result;
    if(sqlsrv_execute($result))
    {
        PRINT '<script>';
        PRINT 'alert("Se agrego con exito al usuario")';
        PRINT '</script>';
        header('location: ../pages-comprasdetalles.php');
    }
    else
    {
        PRINT '<script>';
        PRINT 'alert("Error")';
        PRINT '</script>';
    }

?>