<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas - Insertar</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css" />
    <link rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" 
        crossorigin="anonymous">
                 <!-- Favicons -->
  <link href="https://chineserestaurantcrossings.com/wp-content/uploads/2018/02/cropped-OP2-1-32x32.png" rel="icon">

<!-- Vendor CSS Files -->
<link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="../../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="../../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
<link href="../../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
<link href="../../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="../../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="../../../assets/css/pantallas.css" rel="stylesheet">
  <link href="../../../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/iziToast-master/dist/css/iziToast.min.css">
    <link rel="stylesheet" href="../../../assets/flexselect/flexselect.css" type="text/css" media="screen" />
    <style>
        #btnCrear{
            width:400px;
            margin-top:5%;
        }
    </style>
</head>
<body>
    <?php  include 'layout-insert.php';?>
    <div class="container">

    <div class="card mt-5">
        <div class="card-header fw-bold fs-5 ps-5 mb-5">
            <div class="row">
            <div class="col-10">
            Insertar registro
            </div>
            <div class="col-2">
            </div>
            </div>
            
        </div>
        <div class="card-body">
            <?php
            include '../../../assets/conexion/ConexionDB.php';

            $con = new conexion();
            $estadocon = $con->getCon();
            $NumOrden = $_SESSION["NumOrden"];
            $query = "EXEC Vent.UDP_tblVentas_MostrarCabecera '$NumOrden'";
            $result = sqlsrv_query($estadocon,$query);
            if($row = sqlsrv_fetch_array($result)){
                $_SESSION["Cliente"] = $row['Cliente'];
                $_SESSION["Servicio"] = $row['Servicio'];
  
            }else{
              header('location: pages.php');
            }
            ?>
        <form class="insertForm" method="POST" action="VentaDetallesInsert.php">
            <div class="row">
                <div class="col-6">
                            <div class="form-group">
                                <label for="ddlClientes">Cliente</label>
                                <input type="text" class="form form-control" disabled value="<?php echo isset($_SESSION["Cliente"]) ? $_SESSION["Cliente"] : ""; ?>"/>
                                
                            </div>
                    </div>            
                    <div class="col-6">       
                        <div class="form-group">
                            <label for="txtVent_NoOrden">Numero de Orden</label>
                            <input type="text" class="form form-control" disabled value="<?php echo isset($_SESSION["NumOrden"]) ? $_SESSION["NumOrden"] : ""; ?>"/>
                            
                                
                        </div>
                        </div> 
                        <div class="col-6"> 
                        <div class="form-group">
                            <label for="txtVent_IVA">Impuesto</label>
                            <input type="text" class="form form-control" disabled value="<?php echo isset($_SESSION["Impuesto"]) ? $_SESSION["Impuesto"] : ""; ?>"/>
                        </div>
                        </div>
                            
                <div class="col-6">
                    <div class="form-group">
                            <label for="txtVent_Fecha">Fecha de venta</label>
                            <input type="text" class="form form-control" disabled value="<?php echo isset($_SESSION["FechaVenta"]) ? $_SESSION["FechaVenta"] : ""; ?>"/>
                    </div>
                    </div>
                    <div class="col-6">
                            <div class="form-group">
                                <label for="txtVent_Descuento">Descuento</label>
                                <input type="text" class="form form-control" disabled value="<?php echo isset($_SESSION["Descuento"]) ? $_SESSION["Descuento"] : ""; ?>"/>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="ddlVent_Servicio">Tipo de servicio</label>
                                <input type="text" class="form form-control" disabled value="<?php echo isset($_SESSION["Servicio"]) ? $_SESSION["Servicio"] : ""; ?>"/>
                            </div>
                            </div>
                <div class="col-12">
                    <div class="form-group">
                                    <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Observaciones/ Direccion </span>
                                    </div>
                                    <textarea class="form-control" disabled name="txtVentObservaciones" id="txtVentObservaciones" style="max-height: 200px" aria-label="Observaciones" placeholder="<?php echo isset($_SESSION["Observaciones"]) ? $_SESSION["Observaciones"] : ""; ?>"></textarea>
                                    </div> 
                                </div>
                </div>
                
                    <div class="col-6">
                        <div class="form-group">
                                    <label for="ddlMenu">Menu</label>
                                    <select class="form form-control flexselect" name="ddlMenu" id="ddlMenu">
                                        <option value="" selected disabled></option>
                                        <?php
                                        

                                        $query = "EXEC Gnrl.UDP_tblMenus_Mostrar";
                                        $result = sqlsrv_query($estadocon,$query);
                                        if($row = sqlsrv_fetch_array($result)){
                    
                                            do
                                            {
                                                    if($row['ID'] != ""){
                                    
                                                        echo "<option value=".$row['ID'].">".$row['Descripcion']." - L.".$row['Precio']."</option>";
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
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                                <label for="txtVeDe_Cantidad">Cantidad</label>
                                <input type="number"
                                class="form form-control"
                                name="txtVeDe_Cantidad"
                                min="1"
                                max="100" 
                                id="txtVeDe_Cantidad"
                                placeholder="Ingrese la cantidad de la compra"
                                />       
                        </div>
                    </div>
                    <div class="col-6">
                <input type="submit" class="btn btn-primary mb-5" id="btnCrear" value="Agregar Producto" />
                </div>
            </form>  
                    <table id="TablaE1" class="table table-striped mt-5">
                        <thead>
                        <tr>
                        <th>ID</th>
                        <th>Ingrediente</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                                $query = "EXEC Vent.UDP_tblVentaDetalles_Mostrar '$NumOrden'";
                                $result = sqlsrv_query($estadocon,$query);

                                if($row = sqlsrv_fetch_array($result)){
                                    
                                    do{
                                        if($row['VentDe_Id'] != "")
                                        {
                                            
                                            print   '<tr>';
                                            print   '<td>' .$row['VentDe_Id'] .'</td>';
                                            print   '<td>' .$row['Menu_Descripcion'] .'</td>';
                                            print   '<td>' .$row['Menu_Precio'] .'</td>';
                                            print   '<td>' .$row['VentDe_Cantidad'] .'</td>';
                                            print   '</tr>';

                                        }
                                    }
                                    while($row = sqlsrv_fetch_array($result));
                                }
                                else{
                                    print $query;
                                }
                            ?>
                        </tbody>
            </table>
            <div class="col-6 mt-5">
            <a class="btn btn-primary mb-5"  href="../pages-ventasindex.php" >Guardar factura</a>  
            </div>                 
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous">
    </script>
<script src="../../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../../assets/vendor/php-email-form/validate.js"></script>
  <script src="../../../assets/flexselect/liquidmetal.js" type="text/javascript"></script>
<script src="../../../assets/flexselect/jquery.flexselect.js" type="text/javascript"></script>
  <!-- Template Main JS File -->
  <script src="../../../assets/js/main.js"></script>
<script>
    jQuery(document).ready(function() {
    $("select.flexselect").flexselect();
  });
</script>
    <script src="../../../assets/iziToast-master/dist/js/iziToast.min.js" type="text/javascript"></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"> </script>
     <script src="../../../assets/js/alertas.js"></script>
    <?php include('../pages-validar.php');?>
</body>
</html>
