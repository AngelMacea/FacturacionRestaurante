<?php

    include '../../assets/conexion/ConexionDB.php';
    $con = new conexion();
    $estadocon = $con->getCon();
    

    $response = array();
    $query="EXEC Inv.UDP_tblCompras_Mostrar";
    $result = sqlsrv_prepare($estadocon,$query);

       if(sqlsrv_execute($result)){
           $response['response'] = array();
           while($row = sqlsrv_fetch_array($result)){
               array_push(
                   $response['response'],
                   array(
                       "compraIdentificacion"=>$row['Comp_Id'], "compraFecha"=>$row['Comp_Fecha'], "compraOrden"=>$row['Comp_NoOrden'], "compraImpuesto"=>$row['Comp_IVA'], "proveedorDescripcion"=>$row['Prov_Descripcion']
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