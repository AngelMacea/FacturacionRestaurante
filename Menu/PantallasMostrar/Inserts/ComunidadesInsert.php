<?php
   include '../../../assets/conexion/ConexionDB.php';

    $con = new conexion();
    $estadocon = $con->getCon();
    session_start();
    $Comu_Descripcion = $_POST['txtComunidades'];
    $Comu_Tarifa = $_POST['txtTarifa'];
    $Ciud_Id = $_POST['ddlCiudades'];


    
    if($Comu_Descripcion== ""){
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "Rellene un campo";
        $_SESSION['ValidacionError'] = true;
        header('location: ../pages-comunidadesindex.php');
    }
    else{
        $_SESSION['ValidacionError'] = false;

    $queryInsert = "EXEC Gnrl.UDP_tblComunidades_Insert '$Comu_Descripcion','$Ciud_Id','$Comu_Tarifa','{$_SESSION['Usua_Id']}'";

    $result = sqlsrv_prepare($estadocon, $queryInsert);

    PRINT $result;
    if(sqlsrv_execute($result))
    {
        $_SESSION['ValidacionSuccess'] = true;
        header('location: ../pages-comunidadesindex.php');
    }
    else
    {
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "No se ha podido realizar la consulta";
        $_SESSION['ValidacionError'] = true;
        header('location: ../pages-comunidadesindex.php');
    }
    }
?>