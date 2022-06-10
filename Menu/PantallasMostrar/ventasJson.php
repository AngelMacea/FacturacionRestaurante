<?php

    include '../../assets/conexion/ConexionDB.php';
    $con = new conexion();
    $estadocon = $con->getCon();
    

    $response = array();
    $query="EXEC Vent.UDP_tblVentas_Mostrar";
    $result = sqlsrv_prepare($estadocon,$query);

       if(sqlsrv_execute($result)){
           $response['response'] = array();
           while($row = sqlsrv_fetch_array($result)){
               array_push(
                   $response['response'],
                   array(
                       "ventaIdentificacion"=>$row['Vent_Id'], "ventaCliente"=>$row['Vent_Cliente'], "ventaFecha"=>$row['Vent_Fecha'],"ventaOrden"=>$row['Vent_NoOrden'], "ventaImpuesto"=>$row['Vent_IVA'],"ventaDescuento"=>$row['Vent_Descuento'],"ventaServicio"=>$row['Vent_Servicio'],"ventaObservacion"=>$row['Vent_Observaciones']
                   )
               );
           }
       }

      
      echo json_encode(  array( 
        "data"=>$response["response"],
        "recordsTotal"=>count($response["response"]),
        "recordsFiltered"=>count($response["response"])
        ));

?>