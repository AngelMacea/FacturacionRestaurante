<?php
    

    include 'ConexionDB.php';

    $con = new conexion();
    $estadocon = $con->getCon();
    session_start();
    $Emp_Id = $_POST['ddlEmpleados'];
    $Usua_Pass = $_POST['txtPass'];
    $Usua_Usuario = $_POST['txtUsuario'];
    $Usua_UsuarioCrea = $_SESSION['Usua_Id'];

    //PRINT $estadocon;
    //PRINT $Emp_Id;
    //PRINT $Usua_Usuario;
    //PRINT $Usua_Pass;
    //PRINT $Usuar_UsuarioCrea;

    

    $queryInsert = "EXEC Acce.UDP_tblUsuarios_Insert '$Emp_Id', '$Usua_Usuario', '$Usua_Pass', '{$_SESSION['Usua_Id']}'";
    PRINT $queryInsert;
    $result = sqlsrv_prepare($estadocon, $queryInsert);

    PRINT $result;
    if(sqlsrv_execute($result))
    {
        $_SESSION['ValidacionTrue'] = true;
        header('location: ../pages-usuarioindex.php');
    }
    else
    {
        $_SESSION['ValidacionFalse'] = true;
        header('location: ../pages-usuarioindex.php');
    }


?>
