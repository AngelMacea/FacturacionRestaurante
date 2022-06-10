<?php


include '../../../assets/conexion/ConexionDB.php';

$con = new conexion();
$estadocon = $con->getCon();
session_start();

  $NumOrden = $_POST['txtNumOrden'];
  $FechaCompra = $_POST['txtFecha'];
  $Impuesto = $_POST['txtIVA'];
  $Proveedor = $_POST['ddlProveedores'];
    
    if($NumOrden== "" || $FechaCompra =="" || $Impuesto =="" || $Proveedor ==""){
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "Rellene un campo";
        $_SESSION['ValidacionError'] = true;
        header('location: pages-comprasInsert.php');
    }else{
      $_SESSION['ValidacionError'] = false;

        $_SESSION['NumOrden'] = $NumOrden;
        $_SESSION['FechaCompra'] = $FechaCompra;
        $_SESSION['Impuesto'] = $Impuesto;
        $_SESSION['Proveedor'] = $Proveedor;

      $queryInsert = "EXEC Inv.UDP_tblCompras_Insert '$FechaCompra','  $Proveedor','$NumOrden','$Impuesto','{$_SESSION['Usua_Id']}'";
      $result = sqlsrv_prepare($estadocon, $queryInsert);

      print $queryInsert;
      if(sqlsrv_execute($result))
      {
          $_SESSION['ValidacionSuccess'] = true;
          header('location: pages-comprasInserted.php');
          
      }
      else
      {
          $_SESSION['Titulo'] = "Error";
          $_SESSION['Mensaje'] = "No se ha podido realizar la consulta";
          $_SESSION['ValidacionError'] = true;
          PRINT $queryInsert;
          header('location: pages-comprasInsert.php');
      }
  }
?>