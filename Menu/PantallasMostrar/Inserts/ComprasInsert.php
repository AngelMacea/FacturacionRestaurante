<?php


include '../../../assets/conexion/ConexionDB.php';

$con = new conexion();
$estadocon = $con->getCon();
session_start();

  $NumOrden = $_POST['txtNumOrden'];
  $FechaCompra = $_POST['txtFecha'];
  $Impuesto = $_POST['txtIVA'];
  $Proveedor = $_POST['ddlProveedores'];

  $Ingrediente = $_POST['ddlIngrediente'];
  $Cantidad = $_POST['txtCantidad'];
  $Precio = $_POST['txtPrecio'];


    
    if($NumOrden== "" || $FechaCompra =="" || $Impuesto =="" || $Proveedor ==""){
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "Rellene un campo";
        $_SESSION['ValidacionError'] = true;
        header('location: pages-comprasInsert.php');
    }else{
      $_SESSION['ValidacionError'] = false;

        $_SESSION['NumOrden'] = substr($NumOrden, 0, 5);
        $_SESSION['FechaCompra'] = $FechaCompra;
        $_SESSION['Impuesto'] = $Impuesto;
        $_SESSION['Proveedor'] = $Proveedor;

      $queryInsert = "EXEC Inv.UDP_tblCompras_Insert '$FechaCompra','  $Proveedor','#$NumOrden','$Impuesto','{$_SESSION['Usua_Id']}'";
      $result = sqlsrv_prepare($estadocon, $queryInsert);

      print $queryInsert;
      if(sqlsrv_execute($result))
      {
        $query = "EXEC Inv.UDP_tblComprasDetalles_Recibo '#".$_SESSION['NumOrden']."'";
        PRINT $query;
        $resultado = sqlsrv_query($estadocon,$query);
        if($row = sqlsrv_fetch_array($resultado)){

          $_SESSION['CompraId'] = $row['ID'];

          $queryIngr = "EXEC Inv.UDP_tblCompraDetalles_Insert '{$_SESSION['CompraId']}',' $Ingrediente','$Precio','$Cantidad','{$_SESSION['Usua_Id']}'";
          $results = sqlsrv_prepare($estadocon, $queryIngr);
    
          print $queryIngr;
          if(sqlsrv_execute($results))
          {

              $_SESSION['ValidacionSuccess'] = true;
              header('location: pages-comprasInserted.php');
              
          }
          else
          {
              $_SESSION['Titulo'] = "Error";
              $_SESSION['Mensaje'] = "No se ha podido realizar la consulta";
              $_SESSION['ValidacionError'] = true;
              PRINT $queryIngr;
              header('location: pages-comprasInsert.php');
          }
        } 
        else
        {
            echo "Error sacando el Id de Compra";
        }

          
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