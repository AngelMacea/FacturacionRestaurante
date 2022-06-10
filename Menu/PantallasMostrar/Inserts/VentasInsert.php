<?php

include '../../../assets/conexion/ConexionDB.php';

$con = new conexion();
$estadocon = $con->getCon();
session_start();

  $cliente= $_POST['ddlClientes'];
  $NumOrden= '#'.$_POST['txtVent_NoOrden'];
  $FechaVenta = $_POST['txtVent_Fecha'];
  $Descuento = $_POST['txtVent_Descuento'];
  $Impuesto = $_POST['txtVent_IVA'];
  $Servicio = $_POST['ddlVent_Servicio'];
  $Observaciones = $_POST['txtVentObservaciones'];

  $Menu = $_POST['ddlMenu'];
  $Cantidad = $_POST['txtVeDe_Cantidad'];
    
    if($cliente== "" || $NumOrden =="" || $FechaVenta =="" || $Impuesto ==""||$Servicio== "" || $Observaciones =="" || $Menu =="" || $Cantidad ==""){
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "Rellene un campo";
        $_SESSION['ValidacionError'] = true;
        header('location: pages-ventasInsert.php');
    }else{
      $_SESSION['ValidacionError'] = false;

        $_SESSION['Cliente'] = $cliente;
        $_SESSION['NumOrden'] = $NumOrden;
        $_SESSION['FechaVenta'] = $FechaVenta;
        $_SESSION['Impuesto'] = $Impuesto;
        $_SESSION['Descuento'] = $Descuento;
        $_SESSION['Servicio'] = $Servicio;
        $_SESSION['Observaciones'] = $Observaciones;

      $queryInsert = "EXEC Vent.UDP_tblVentas_Insert '$cliente','$FechaVenta','{$_SESSION['Usua_Id']}','$NumOrden','$Impuesto','$Descuento','$Servicio','$Observaciones','{$_SESSION['Usua_Id']}'";
      $result = sqlsrv_prepare($estadocon, $queryInsert);

      print $queryInsert;
      if(sqlsrv_execute($result))
      {
          $query = "EXEC Vent.UDP_tblVentaDetalles_MostrarVentId '$NumOrden'";
          $result = sqlsrv_query($estadocon,$query);

          
          if($row = sqlsrv_fetch_array($result)){
            $Vent_Id = $row['ID'];
            $_SESSION['VentID'] = $Vent_Id;
            $queryInsert = "EXEC Vent.UDP_tblVentaDetalles_Insert '$Vent_Id','$Menu','$Cantidad','{$_SESSION['Usua_Id']}'";
            $result = sqlsrv_prepare($estadocon, $queryInsert);
            
            
             if(sqlsrv_execute($result))
                {
                    header('location: pages-ventasInserted.php');
                }
                else
                {
                    $_SESSION['Titulo'] = "Error";
                    $_SESSION['Mensaje'] = "No se ha podido realizar la consulta";
                    $_SESSION['ValidacionError'] = true;
                    PRINT $queryInsert;
                    header('location: pages-ventasInsert.php');
                }

          }else{
            $_SESSION['Titulo'] = "Error";
            $_SESSION['Mensaje'] = "No se ha podido realizar la consulta";
            $_SESSION['ValidacionError'] = true;
            header('location: pages-ventasInsert.php');
          }
      }
      else
      {
          print "a";
      }

       



      
  }

?>