<?php

include '../../../assets/conexion/ConexionDB.php';

$con = new conexion();
$estadocon = $con->getCon();
session_start();

$Ingrediente = $_POST['ddlIngrediente'];
$Cantidad = $_POST['txtCantidad'];
$Precio   = $_POST['txtPrecio'];
    
    if($Ingrediente== "" || $Cantidad =="" || $Precio == ""){
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "Rellene un campo";
        $_SESSION['ValidacionError'] = true;
        header('location: pages-comprasInserted.php');
    }else{
      $_SESSION['ValidacionError'] = false;


      $queryInsert = "EXEC Inv.UDP_tblCompraDetalles_Insert '{$_SESSION['CompraId']}','  $Ingrediente','$Precio','$Cantidad','{$_SESSION['Usua_Id']}'";
      $result = sqlsrv_prepare($estadocon, $queryInsert);

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
          //header('location: pages-comprasInsert.php');
      }
    }
  
?>