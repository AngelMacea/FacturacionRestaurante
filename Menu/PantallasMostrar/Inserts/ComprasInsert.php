<?php
   include '../../../assets/conexion/ConexionDB.php';

    $con = new conexion();
    $estadocon = $con->getCon();
    session_start();
    
    $compraFecha= $_POST['txtComp_Fecha'];
    $compraNoOrden = $_POST['txtComp_NoOrden'];
    $compraIVA = $_POST['txtComp_IVA'];
    $usuarioCrea = $_SESSION['Usua_Id'];

    if($compraFecha== "" || $compraNoOrden == ""|| $compraIVA == ""){
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "Rellene un campo";
        $_SESSION['ValidacionError'] = true;
        header('location: ../pages-comprasindex.php');
    }
    else{
        $_SESSION['ValidacionError'] = false;

            $queryInsert = "EXEC Inv.UDP_tblCompras_Insert '$compraFecha', '$compraNoOrden', '$compraIVA', '{$_SESSION['Usua_Id']}'";
            PRINT $queryInsert;
            $result = sqlsrv_prepare($estadocon, $queryInsert);

            PRINT $result;
            if(sqlsrv_execute($result))
            {
                $_SESSION['ValidacionSuccess'] = true;
                header('location: ../pages-comprasindex.php');
            }
            else
            {
                $_SESSION['Titulo'] = "Error";
                $_SESSION['Mensaje'] = "No se ha podido realizar la consulta";
                $_SESSION['ValidacionError'] = true;
                header('location: ../pages-comprasindex.php');
            }
        }
?>