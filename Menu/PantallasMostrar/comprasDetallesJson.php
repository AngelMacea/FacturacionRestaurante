<?php

    include '../../assets/conexion/ConexionDB.php';
    $con = new conexion();
    $estadocon = $con->getCon();
    $Orden = $_GET['NoOrden'];

    
    $response = array();
    $query="EXEC Inv.UDP_tblCompraDetalles_MostrarRecibo '$Orden'";
    $result = sqlsrv_prepare($estadocon,$query);

       if(sqlsrv_execute($result)){
           $response['response'] = array();
           while($row = sqlsrv_fetch_array($result)){
               array_push(
                   $response['response'],
                   array(
                       "compraDetalleIdentificacion"=>$row['CompDe_Id'],"compraNoOrden"=>$row['Comp_NoOrden'],"ingredienteIdentificacion"=>$row['Ingr_Id'], "ingredienteDescripcion"=>$row['Ingr_Descripcion'], "compraDetallePrecio"=>$row['CompDe_PrecioCompra'], "compraDetalleCantidad"=>$row['CompDe_Cantidad'],"compraIVA"=>$row['Comp_IVA']
                   )
               );
           }
       }
       else{
            $response['response']= sqlsrv_errors();
       }

    
      echo json_encode($response);

?>