<?php
    

    include '../../../assets/conexion/ConexionDB.php';

    $con = new conexion();
    $estadocon = $con->getCon();
    session_start();
    $Emp_Id = $_POST['ddlEmpleados'];
    $Usua_Pass = $_POST['txtPass'];
    $Usua_Usuario = $_POST['txtUsuario'];
    $Usua_UsuarioCrea = $_SESSION['Usua_Id'];

    
    if($Usua_Pass == "" ||$Usua_Usuario == "" ){
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "Rellene un campo";
        $_SESSION['ValidacionError'] = true;
        header('location: ../pages-usuarioindex.php');
    }
    else{
        $_SESSION['ValidacionError'] = false;

    $queryInsert = "EXEC Acce.UDP_tblUsuarios_Insert '$Emp_Id', '$Usua_Usuario', '$Usua_Pass', '{$_SESSION['Usua_Id']}'";
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
