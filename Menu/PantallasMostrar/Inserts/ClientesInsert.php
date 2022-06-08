<?php
   include '../../../assets/conexion/ConexionDB.php';

    $con = new conexion();
    $estadocon = $con->getCon();
    session_start();
    $clienteIdentificacion = $_POST['txtId'];
    $clienteNombres = $_POST['txtNombre'];
    $clienteApellidos = $_POST['txtApellido'];
    $clienteTelefono = $_POST['txttelefono'];
    $clienteSexo = $_POST['ddlSexo'];
    
    if($clienteIdentificacion== "" || $clienteNombres =="" || $clienteApellidos =="" || $clienteTelefono ==""){
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "Rellene un campo";
        $_SESSION['ValidacionError'] = true;
        header('location: ../pages-clientesindex.php');
    }
    else{
        $_SESSION['ValidacionError'] = false;

    $queryInsert = "EXEC Gnrl.UDP_tblClientes_Insert '$clienteIdentificacion','  $clienteNombres','$clienteApellidos','$Clie_Sexo','$clienteTelefono','{$_SESSION['Usua_Id']}'";
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