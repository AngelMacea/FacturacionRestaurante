<?php
    

    include '../../../assets/conexion/ConexionDB.php';

    $con = new conexion();
    $estadocon = $con->getCon();
    session_start();
    $empleadoIdentificacion = $_POST['ddlEmpleados'];
    $pass = $_POST['txtPass'];
    $usuario = $_POST['txtUsuario'];
    $usuarioCrea = $_SESSION['Usua_Id'];

    
    if( $pass == "" ||$usuario == "" ||$empleadoIdentificacion == ""){
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "Rellene un campo";
        $_SESSION['ValidacionError'] = true;
        header('location: ../pages-usuarioindex.php');
    }
    else{
        $_SESSION['ValidacionError'] = false;

    $queryInsert = "EXEC Acce.UDP_tblUsuarios_Insert '$empleadoIdentificacion', '$usuario', '$pass', '{$_SESSION['Usua_Id']}'";
    PRINT $queryInsert;
    $result = sqlsrv_prepare($estadocon, $queryInsert);

    PRINT $result;
    if(sqlsrv_execute($result))
    {
        $_SESSION['ValidacionSuccess'] = true;
        header('location: ../pages-usuarioindex.php');
    }
    else
    {
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "No se ha podido realizar la consulta";
        $_SESSION['ValidacionError'] = true;
        header('location: ../pages-usuarioindex.php');
    }


    }
 

    

?>
