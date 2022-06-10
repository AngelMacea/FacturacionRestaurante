<?php
   include '../../../assets/conexion/ConexionDB.php';

    $con = new conexion();
    $estadocon = $con->getCon();
    session_start();

    $empleadoIdentificacion = $_POST['txtId'];
    $empleadoNombres = $_POST['txtNombre'];
    $empleadoApellidos = $_POST['txtApellido'];
    $empleadoEdad = $_POST['txtEdad'];
    $empleadoSexo = $_POST['ddlSexo'];
    $empleadoCorreo = $_POST['txtEmail'];
    $empleadoEsCi = $_POST['ddlEstadoCiviles'];
    $empleadoRol = $_POST['ddlRoles'];
    
    if( $empleadoIdentificacion== "" || $empleadoNombres =="" || $empleadoApellidos=="" || $empleadoEdad ==""|| $empleadoSexo ==""||$empleadoCorreo ==""){
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "Rellene un campo";
        $_SESSION['ValidacionError'] = true;
        header('location: pages-empleadosInsert.php');
    }
    else{
        $_SESSION['ValidacionError'] = false;

    $queryInsert = "EXEC Gnrl.UDP_tblEmpleados_Insert '$empleadoIdentificacion',' $empleadoNombres ','$empleadoApellidos','$empleadoSexo','$empleadoEdad','$empleadoEsCi','$empleadoCorreo','$empleadoRol','{$_SESSION['Usua_Id']}'";
    $result = sqlsrv_prepare($estadocon, $queryInsert);

    print $queryInsert;
    if(sqlsrv_execute($result))
    {
        $_SESSION['ValidacionSuccess'] = true;
        header('location: ../pages-empleadoindex.php');
        
    }
    else
    {
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "No se ha podido realizar la consulta";
        $_SESSION['ValidacionError'] = true;
        header('location: pages-empleadosInsert.php');
    }
    }
?>