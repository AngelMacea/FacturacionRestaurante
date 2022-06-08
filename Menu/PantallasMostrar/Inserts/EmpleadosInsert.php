<?php
   include '../../../assets/conexion/ConexionDB.php';

    $con = new conexion();
    $estadocon = $con->getCon();
    session_start();

    $Emp_Identificacion = $_POST['txtId'];
    $Emp_Nombres = $_POST['txtNombre'];
    $Emp_Apellidos = $_POST['txtApellido'];
    $Emp_Edad = $_POST['txtEdad'];
    $Emp_Sexo = $_POST['ddlSexo'];
    $Emp_Correo = $_POST['txtEmail'];
    $Emp_EsCi = $_POST['ddlEstadoCiviles'];
    $Emp_Rol = $_POST['ddlRoles'];
    
    if( $Emp_Identificacion== "" || $Emp_Nombres =="" || $Emp_Apellidos =="" || $Emp_Edad ==""){
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "Rellene un campo";
        $_SESSION['ValidacionError'] = true;
        header('location: pages-empleadosInsert.php');
    }
    else{
        $_SESSION['ValidacionError'] = false;

    $queryInsert = "EXEC Gnrl.UDP_tblEmpleados_Insert '$Emp_Identificacion',' $Emp_Nombres ','$Emp_Apellidos','$Emp_Sexo','$Emp_Edad','$Emp_EsCi','$Emp_Correo','$Emp_Rol','{$_SESSION['Usua_Id']}'";
    $result = sqlsrv_prepare($estadocon, $queryInsert);

    print $queryInsert;
    if(sqlsrv_execute($result))
    {
        $_SESSION['ValidacionSuccess'] = true;
        header('location: pages-empleadosInsert.php');
        
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