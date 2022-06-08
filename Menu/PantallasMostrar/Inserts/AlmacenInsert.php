<?php
   include '../../../assets/conexion/ConexionDB.php';

    $con = new conexion();
    $estadocon = $con->getCon();
    session_start();
    

    $almacenDescripcion = $_POST['txtAlmc'];

    
    if($almacenDescripcion== ""){
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "Rellene un campo";
        $_SESSION['ValidacionError'] = true;
        header('location: ../pages-almacenesindex.php');
    }
    else{
        $_SESSION['ValidacionError'] = false;
        
        $queryInsert = "EXEC Inv.UDP_tblAlmacenes_Insert '$almacenDescripcion', '{$_SESSION['Usua_Id']}'";
        $result = sqlsrv_prepare($estadocon, $queryInsert);

        if(sqlsrv_execute($result))
        {
            $_SESSION['ValidacionSuccess'] = true;
            header('location: ../pages-almacenesindex.php');
        }
        else
        {
            $_SESSION['Titulo'] = "Error";
            $_SESSION['Mensaje'] = "No se ha podido realizar la consulta";
            $_SESSION['ValidacionError'] = true;
            header('location: ../pages-almacenesindex.php');
        }
    }

?>