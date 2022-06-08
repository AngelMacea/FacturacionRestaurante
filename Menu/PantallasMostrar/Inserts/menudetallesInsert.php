<?php
    include '../../../assets/conexion/ConexionDB.php';
    $con = new conexion();
    $estadocon = $con->getCon();
    session_start();
    

    $Menu_Id = $_POST['ddlMenus'];
    $Ing_Id = $_POST['ddlIngredientes'];
    $MenuDe_Cantidad = $_POST['txtCantidad'];

    
    if($MenuDe_Cantidad == ""){
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "Rellene un campo";
        $_SESSION['ValidacionError'] = true;
        header('location: ../pages-menudetallesindex.php');
    }
    else{
        $_SESSION['ValidacionError'] = false;

    $queryInsert = "EXEC Gnrl.UDP_tblMenuDetalles_Insert '$Menu_Id',' $Ing_Id','$MenuDe_Cantidad','{$_SESSION['Usua_Id']}'";

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