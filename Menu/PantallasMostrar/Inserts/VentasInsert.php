<?php
    

    include '../../../assets/conexion/ConexionDB.php';

    $con = new conexion();
    $estadocon = $con->getCon();
    session_start();
    $Clientes= $_POST['ddlClientes'];
    $Empleados = $_POST['ddlEmpleados'];
    $Vent_NoOrden = $_POST['txtVent_NoOrden'];
    $Vent_IVA = $_POST['txtVent_IVA'];
    $Vent_Fecha = $_POST['txtVent_Fecha'];
    $Ingr_Stock = $_POST['txtIngr_Stock'];
    $Almc_Id = $_POST['ddlAlmc_Id'];
    $Vent_Descuento = $_POST['txtVent_Descuento'];
    $Vent_Servicio = $_POST['ddlVent_Servicio'];
    $VentObservaciones = $_POST['txtVentObservaciones'];
    $UsuarioCrea = $_SESSION['Usua_Id'];

    

    $queryInsert = "EXEC Vent.UDP_tblVentas_Insert '$Clientes', '$Vent_Fecha', '$Empleados', '#$Vent_NoOrden', '$Vent_IVA', '$Vent_Descuento', '$Vent_Servicio', '$VentObservaciones', '{$_SESSION['Usua_Id']}'";
    PRINT $queryInsert;
    $result = sqlsrv_prepare($estadocon, $queryInsert);

    PRINT $result;
    if(sqlsrv_execute($result))
    {
        PRINT '<script>';
        PRINT 'alert("Se agrego con exito al usuario")';
        PRINT '</script>';
        header('location: ../pages-ventasindex.php');
    }
    else
    {
        PRINT '<script>';
        PRINT 'alert("Error")';
        PRINT '</script>';
    }

?>