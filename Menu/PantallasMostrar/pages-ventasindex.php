<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css" />
    <link rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" 
        crossorigin="anonymous">
         <!-- Favicons -->
  <link href="https://chineserestaurantcrossings.com/wp-content/uploads/2018/02/cropped-OP2-1-32x32.png" rel="icon">

<!-- Vendor CSS Files -->
<link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
<link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
<link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="../../assets/css/style.css" rel="stylesheet">
<style>
     .container{
        margin-top:5%;
        width: auto;
        margin-left: 19%;
    }
</style>
</head>
<body>
    <?php include 'layout-pantalla.php'; 
    date_default_timezone_set('America/Tegucigalpa');
    ?>
    <div class="container">

    <div class="card mt-5">
        <div class="card-header fw-bold fs-5 ps-5 mb-5 ">
            Ventas
        </div>
        <div class="card-body">
        <button class="btn btn-primary mb-5" data-toggle="collapse" data-target="#InsertVentas">Nuevo</button>

<div id="InsertVentas" class="collapse">
        <form class="insertForm" method="POST" action="Inserts/VentasInsert.php">
            <div class="row">
                <div class="col">
                            <div class="form-group">
                                <label for="ddlClientes">Cliente</label>
                                <select class="form form-control" name="ddlClientes" id="ddlClientes">
                                    <option value="" selected disabled>Eliga un cliente</option>
                                    <?php
                                    
                                    include '../../assets/conexion/ConexionDB.php';

                                    $con = new conexion();
                                    $estadocon = $con->getCon();
                                    

                                    $query = "EXEC Gnrl.UDP_tblClientes_Mostrar";
                                    $result = sqlsrv_query($estadocon,$query);
                                    if($row = sqlsrv_fetch_array($result)){
                
                                        do
                                        {
                                                if($row['Clie_Id'] != ""){
                                
                                                    echo "<option value=".$row['Clie_Id'].">".$row['Nombre']."</option>";
                                                }
                                        }
                                        while($row = sqlsrv_fetch_array($result));
                                
                                    } 
                                    else
                                    {
                                        echo "<option value=''>Error</option>";
                                    }
                                    ?>
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <label for="ddlEmpleados">Empleado</label>
                                <select class="form form-control" name="ddlEmpleados" id="ddlEmpleados">
                                    <option value="" selected disabled>Eliga un empleado</option>
                                    <?php
                                    
                                    $query = "EXEC Gnrl.UDP_tblEmpleados_Mostrar";
                                    $result = sqlsrv_query($estadocon,$query);
                                    if($row = sqlsrv_fetch_array($result)){
                
                                        do
                                        {
                                                if($row['Emp_Id'] != ""){
                                
                                                    echo "<option value=".$row['Emp_Id'].">".$row['Nombre']."</option>";
                                                }
                                        }
                                        while($row = sqlsrv_fetch_array($result));
                                
                                    } 
                                    else
                                    {
                                        echo "<option value=''>Error</option>";
                                    }
                                    ?>
                                </select>
                                
                            </div>
                        <div class="form-group">
                            <label for="txtVent_NoOrden"># de Orden</label>
                            <input type="text"
                            class="form form-control"
                            name="txtVent_NoOrden" 
                            id="txtVent_NoOrden"
                            placeholder="Ingrese el # de orden"
                            />
                            
                                
                        </div>
                        <div class="form-group">
                            <label for="txtVent_IVA">IVA</label>
                            <input type="number"
                            class="form form-control"
                            min="0"
                            max="100"
                            name="txtVent_IVA" 
                            id="txtVent_IVA"
                            placeholder="Ingrese el % de IVA"
                            />
                            
                            
                                
                        </div>
                        
                            
                    
                </div>
                <div class="col">
                    <div class="form-group">
                            <label for="txtVent_Fecha">Fecha de venta</label>
                            <input type="date"
                            class="form form-control"
                            name="txtVent_Fecha" 
                            id="txtVent_Fecha"
                            placeholder="Ingrese la fecha de la venta"
                            />
                            
                            
                                
                    </div>
                   
                            <div class="form-group">
                                <label for="txtVent_Descuento">Descuento</label>
                                <input type="number"
                                class="form form-control"
                                min="0"
                                max="100"
                                name="txtVent_Descuento" 
                                id="txtVent_Descuento"
                                placeholder="Ingrese el % de descuento"
                                />
                                
                                
                            </div>
                            <div class="form-group">
                                <label for="ddlVent_Servicio">Tipo de servicio</label>
                                <select class="form form-control" name="ddlVent_Servicio" id="ddlVent_Servicio" >
                                        <option value="" selected disabled>Eliga un tipo de servicio</option>
                                        <option value="L">Local</option>
                                        <option value="D">Delivery</option>
                                        <option value="A">Autoservicio</option>
                                </select>
                                
                                
                            </div>
                            
                            
                            
                    
                    
                </div>
                <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Observaciones/ Direccion </span>
                                </div>
                                <textarea class="form-control" name="txtVentObservaciones" id="txtVentObservaciones" style="max-height: 200px" aria-label="Observaciones"></textarea>
                                </div> 
                            </div>
                </div>
                
                <input type="submit" class="btn btn-primary mb-5" id="btnInsertar" value="Crear" />
        </form>
</div>
                <table id="TablaE1" class="table table-striped mt-5">
                <thead>
                <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Empleado</th>
                <th># de Orden</th>
                <th>IVA</th>
                <th>Descuento</th>
                <th>Servicio</th>
                <th>Observacion</th>
                <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    
                    
                    $query = "EXEC Vent.UDP_tblVentas_Mostrar";
                    $result = sqlsrv_query($estadocon,$query);


                    if($row = sqlsrv_fetch_array($result)){

                        $TotalCompra = 0;
                        
                        do{
                            if($row['Vent_Id'] != "")
                            {
                                
                                print   '<tr>';
                                print   '<td>' .$row['Vent_Id'] .'</td>';
                                print   '<td>' .$row['Vent_Cliente'] .'</td>';
                                print   '<td>' .$row['Vent_Fecha'] .'</td>';
                                print   '<td>' .$row['Vent_Empleado'] .'</td>';
                                print   '<td>' .$row['Vent_NoOrden'] .'</td>';
                                print   '<td>' .$row['Vent_IVA'] .'</td>';
                                print   '<td>' .$row['Vent_Descuento'] .'</td>';
                                print   '<td>' .$row['Vent_Servicio'] .'</td>';
                                print   '<td>' .$row['Vent_Observaciones'] .'</td>';
                                print   '<td><input type="button" href="#" title="Detalles" alt="Detalles" value="Detalles"/><input type="button" href="#" title="Editar" alt="Editar" value="Editar"/></td>';
                                print   '</tr>';

                            }

                        }
                        while($row = sqlsrv_fetch_array($result));
                    }

                ?>
                </tbody>
            </table>
        </div>
        </div>

    </div>
    <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous">
    </script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"> </script>
</body>
</html>
