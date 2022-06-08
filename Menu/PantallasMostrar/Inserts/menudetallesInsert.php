<?php
    include '../../../assets/conexion/ConexionDB.php';
    $con = new conexion();
    $estadocon = $con->getCon();
    session_start();
    

    $menuIdentificacion = $_POST['ddlMenus'];
    $ingredienteIdentificacion = $_POST['ddlIngredientes'];
    $menuCantidad = $_POST['txtCantidad'];

    
    if($menuCantidad == "" || $menuIdentificacion == ""|| $ingredienteIdentificacion == ""){
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "Rellene un campo";
        $_SESSION['ValidacionError'] = true;
        header('location: ../pages-menudetallesindex.php');
    }
    else{
        $_SESSION['ValidacionError'] = false;

    $queryInsert = "EXEC Gnrl.UDP_tblMenuDetalles_Insert '$menuIdentificacion',' $ingredienteIdentificacion','$menuCantidad','{$_SESSION['Usua_Id']}'";

    $result = sqlsrv_prepare($estadocon, $queryInsert);

    PRINT $result;
    if(sqlsrv_execute($result))
    {
        $_SESSION['ValidacionSuccess'] = true;
        header('location: ../pages-menudetallesindex.php');
    }
    else
    {
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "No se ha podido realizar la consulta";
        $_SESSION['ValidacionError'] = true;
        header('location: ../pages-menudetallesindex.php');
    }
    }
?>