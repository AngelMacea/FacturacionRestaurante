<?php

include '../../../assets/conexion/ConexionDB.php';

$con = new conexion();
$estadocon = $con->getCon();
session_start();

$Ingrediente = $_POST['ddlIngrediente'];
$Cantidad = $_POST['txtCantidad'];
    
    if($Ingrediente== "" || $Cantidad =="" ){
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "Rellene un campo";
        $_SESSION['ValidacionError'] = true;
        header('location: pages-comprasInserted.php');
    }else{
      $_SESSION['ValidacionError'] = false;


      $queryInsert = "EXEC Inv.UDP_tblCompras_Insert '$FechaCompra','  $Proveedor','#$NumOrden','$Impuesto','{$_SESSION['Usua_Id']}'";
      $result = sqlsrv_prepare($estadocon, $queryInsert);

      if(sqlsrv_execute($result))
      {
        $query = "EXEC Inv.UDP_tblComprasDetalles_Recibo '".$_SESSION['NumOrden']."'";
        $resultado = sqlsrv_query($estadocon,$query);
        if($row = sqlsrv_fetch_array($resultado)){

            do
            {
                    if($row['CompraId'] != ""){
    
                        $_SESSION['CompraId'] = $row['CompraId'];
                        PRINT "Id de compra: ".$_SESSION['CompraId'];
                    }
            }
            while($row = sqlsrv_fetch_array($result));
    
        } 
        else
        {
            
            echo "Error sacando el Id de Compra";
        }
        



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