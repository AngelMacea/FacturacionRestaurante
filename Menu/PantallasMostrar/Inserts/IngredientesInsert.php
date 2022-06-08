<?php
    

    include '../../../assets/conexion/ConexionDB.php';

    $con = new conexion();
    $estadocon = $con->getCon();
    session_start();
    $Ingr_Descripcion= $_POST['txtIngr_Descripcion'];
    $Ingr_FechaCaducidad = $_POST['txtIngr_FechaCaducidad'];
    $Prov_Id = $_POST['ddlProveedores'];
    $Ingr_Stock = $_POST['txtIngr_Stock'];
    $Almc_Id = $_POST['ddlAlmc_Id'];
    $UsuarioCrea = $_SESSION['Usua_Id'];

    

    $queryInsert = "EXEC Inv.UDP_tblIngredientes_Insert '$Ingr_Descripcion', '$Ingr_Stock', '$Prov_Id', '$Ingr_FechaCaducidad', 'B', '$Almc_Id','{$_SESSION['Usua_Id']}'";
    PRINT $queryInsert;
    $result = sqlsrv_prepare($estadocon, $queryInsert);

    PRINT $result;
    if(sqlsrv_execute($result))
    {
        PRINT '<script>';
        PRINT 'alert("Se agrego con exito al usuario")';
        PRINT '</script>';
        header('location: ../pages-ingredientesindex.php');
    }
    else
    {
        PRINT '<script>';
        PRINT 'alert("Error")';
        PRINT '</script>';
    }

?>