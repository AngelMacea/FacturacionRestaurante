<?php
    include '../../../assets/conexion/ConexionDB.php';
    $con = new conexion();
    $estadocon = $con->getCon();
    session_start();
    

    $Menu_Descrip = $_POST['txtMenu'];
    $Menu_Precio = $_POST['txtPrecio'];

    
    if($Menu_Descrip == "" ||$Menu_Precio == ""){
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "Rellene un campo";
        $_SESSION['ValidacionError'] = true;
        header('location: ../pages-menusindex.php');
    }
    else{
        $_SESSION['ValidacionError'] = false;

    $queryInsert = "EXEC Gnrl.UDP_tblMenus_Insert '$Menu_Descrip','$Menu_Precio','{$_SESSION['Usua_Id']}'";

    $result = sqlsrv_prepare($estadocon, $queryInsert);

    PRINT $result;
    if(sqlsrv_execute($result))
    {
        $_SESSION['ValidacionSuccess'] = true;
        header('location: ../pages-menusindex.php');
    }
    else
    {
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "No se ha podido realizar la consulta";
        $_SESSION['ValidacionError'] = true;
        header('location: ../pages-menusindex.php');
    }
    }
?>
