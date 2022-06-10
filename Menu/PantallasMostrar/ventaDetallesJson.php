<?php

    include '../../assets/conexion/ConexionDB.php';
    $con = new conexion();
    $estadocon = $con->getCon();
    $Orden = $_GET['NoOrden'];

    $response = array();
    $query="EXEC Vent.UDP_tblVentaDetalles_Mostrar '$Orden'";
    $result = sqlsrv_prepare($estadocon,$query);

       if(sqlsrv_execute($result)){
           $response['response'] = array();
           while($row = sqlsrv_fetch_array($result)){
               array_push(
                   $response['response'],
                   array(
                       "ventaDetalleIdentificacion"=>$row['VentDe_Id'],"ventaNoOrden"=>$row['Vent_NoOrden'],"menuDescripcion"=>$row['Menu_Descripcion'], "menuPrecio"=>$row['Menu_Precio'], "ventaDetalleCantidad"=>$row['VentDe_Cantidad'],"ventaImpuesto"=>$row['Vent_IVA']
                   )
               );
           }
       }
       else{
            $response['response']= sqlsrv_errors();
       }

    
      echo json_encode($response);

?>