<?php
   include '../../../assets/conexion/ConexionDB.php';

    $con = new conexion();
    $estadocon = $con->getCon();
    session_start();
    $Clie_Identificacion = $_POST['txtId'];
    $Clie_Nombres = $_POST['txtNombre'];
    $Clie_Apellidos = $_POST['txtApellido'];
    $Clie_Telefono = $_POST['txttelefono'];
    $Clie_Sexo = $_POST['ddlSexo'];
    
    if($Clie_Identificacion== "" || $Clie_Nombres =="" || $Clie_Apellidos =="" || $Clie_Telefono ==""){
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "Rellene un campo";
        $_SESSION['ValidacionError'] = true;
        header('location: ../pages-clientesindex.php');
    }
    else{
        $_SESSION['ValidacionError'] = false;

    $queryInsert = "EXEC Gnrl.UDP_tblClientes_Insert '$Clie_Identificacion','  $Clie_Nombres','$Clie_Apellidos','$Clie_Sexo','$Clie_Telefono','{$_SESSION['Usua_Id']}'";
    $result = sqlsrv_prepare($estadocon, $queryInsert);

    print $queryInsert;
    if(sqlsrv_execute($result))
    {
        $_SESSION['ValidacionSuccess'] = true;
        header('location: ../pages-clientesindex.php');
        
    }
    else
    {
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "No se ha podido realizar la consulta";
        $_SESSION['ValidacionError'] = true;
        header('location: ../pages-clientesindex.php');
    }
    }
?>