<?php
    include '../../../assets/conexion/ConexionDB.php';

    $con = new conexion();
    $estadocon = $con->getCon();
    session_start();
    $proveedorDescripcion = $_POST['txtProveedor'];
    $proveedorTelefono = $_POST['txttelefono'];
    $ciudadIdentificacion = $_POST['ddlCiudades'];


    
    if($proveedorDescripcion== "" || $proveedorTelefono ==""|| $ciudadIdentificacion ==""){
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "Rellene un campo";
        $_SESSION['ValidacionError'] = true;
        header('location: ../pages-proveedoresindex.php');
    }
    else{
        $_SESSION['ValidacionError'] = false;

    $queryInsert = "EXEC Gnrl.UDP_tblProveedores_Insert '$proveedorDescripcion',' $proveedorTelefono','$ciudadIdentificacion','{$_SESSION['Usua_Id']}'";

    $result = sqlsrv_prepare($estadocon, $queryInsert);

    PRINT $result;
    if(sqlsrv_execute($result))
    {
        $_SESSION['ValidacionSuccess'] = true;
        header('location: ../pages-proveedoresindex.php');
    }
    else
    {
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "No se ha podido realizar la consulta";
        $_SESSION['ValidacionError'] = true;
        header('location: ../pages-proveedoresindex.php');
    }
    }
?>