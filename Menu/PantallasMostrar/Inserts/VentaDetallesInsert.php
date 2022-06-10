<?php
    

    include '../../../assets/conexion/ConexionDB.php';

    $con = new conexion();
    $estadocon = $con->getCon();
    session_start();
    $Menu= $_POST['ddlMenu'];
    $Vent_Id = $_SESSION['VentID'];
    $VeDe_Cantidad = $_POST['txtVeDe_Cantidad'];
    $UsuarioCrea = $_SESSION['Usua_Id'];

    if($Menu== "" || $Vent_Id =="" || $VeDe_Cantidad ==""){
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "Rellene un campo";
        $_SESSION['ValidacionError'] = true;
        header('location: pages-ventasInserted.php');
    }else{
        $queryInsert = "EXEC Vent.UDP_tblVentaDetalles_Insert '$Vent_Id', '$Menu', '$VeDe_Cantidad', '{$_SESSION['Usua_Id']}'";
        $result = sqlsrv_prepare($estadocon, $queryInsert);

        if(sqlsrv_execute($result))
        {
            $_SESSION['ValidacionSuccess'] = true;
            header('location: pages-ventasInserted.php');
        }
        else
        {
            $_SESSION['Titulo'] = "Error";
            $_SESSION['Mensaje'] = "No se ha podido realizar la consulta";
            $_SESSION['ValidacionError'] = true;
            header('location: pages-ventasInserted.php');
        }

    }

    

?>