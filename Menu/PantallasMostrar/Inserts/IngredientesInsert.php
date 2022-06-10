<?php
   include '../../../assets/conexion/ConexionDB.php';

    $con = new conexion();
    $estadocon = $con->getCon();
    session_start();

    $ingredienteDescripcion= $_POST['txtIngr_Descripcion'];
    $ingredienteFechaCaducidad = $_POST['txtIngr_FechaCaducidad'];
    $ingredienteStock = $_POST['txtIngr_Stock'];
    $almacenIdentificacion = $_POST['ddlAlmc_Id'];

    
    if($ingredienteDescripcion== "" || $ingredienteFechaCaducidad =="" || $ingredienteStock ==""|| $almacenIdentificacion ==""){
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "Rellene un campo";
        $_SESSION['ValidacionError'] = true;
        header('location: ../pages-ingredientesindex.php');
    }
    else{
        $_SESSION['ValidacionError'] = false;
    $queryInsert = "EXEC Inv.UDP_tblIngredientes_Insert '$ingredienteDescripcion', '$ingredienteStock', '$ingredienteFechaCaducidad', 'B', '$almacenIdentificacion','{$_SESSION['Usua_Id']}'";
    $result = sqlsrv_prepare($estadocon, $queryInsert);
    
    if(sqlsrv_execute($result))
    {
        $_SESSION['ValidacionSuccess'] = true;
        header('location: ../pages-ingredientesindex.php');
    }
    else
    {
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "No se ha podido realizar la consulta";
        $_SESSION['ValidacionError'] = true;
        header('location: ../pages-ingredientesindex.php');
    }
}

?>