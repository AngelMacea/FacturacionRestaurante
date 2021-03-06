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
            </div>
            
        </div>
        <div class="card-body">
        <form class="insertForm" method="POST" action="VentasInsert.php">
            <div class="row">
                <div class="col-6">
                            <div class="form-group">
                                <label for="ddlClientes">Cliente</label>
                                <select class="form form-control flexselect" name="ddlClientes" id="ddlClientes">
                                    <option value="" selected disabled></option>
                                    <?php
                                    
                                    include '../../../assets/conexion/ConexionDB.php';

                                    $con = new conexion();
                                    $estadocon = $con->getCon();
                                    

                                    $query = "EXEC Gnrl.UDP_tblClientes_Mostrar";
                                    $result = sqlsrv_query($estadocon,$query);
                                    if($row = sqlsrv_fetch_array($result)){
                
                                        do
                                        {
                                                if($row['Identificacion'] != ""){
                                
                                                    echo "<option value=".$row['Identificacion'].">".$row['Nombre']."</option>";
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
                            <label for="txtVent_NoOrden">Numero de Orden</label>
                            <input type="text"
                            class="form form-control"
                            readonly="readonly"
                            name="txtVent_NoOrden" 
                            id="txtVent_NoOrden"
                            placeholder="Ingrese el numero de orden"
                            max="5"
                            />
                            
                                
                        </div>
                        </div> 
                        <div class="col-6"> 
                        <div class="form-group">
                            <label for="txtVent_IVA">Impuesto</label>
                            <input type="number"
                            class="form form-control"
                            min="0"
                            max="100"
                            name="txtVent_IVA" 
                            id="txtVent_IVA"
                            placeholder="Ingrese el porcentaje del impuesto"
                            />
                        </div>
                        </div>
                            
                <div class="col-6">
                    <div class="form-group">
                            <label for="txtVent_Fecha">Fecha de venta</label>
                            <input type="text"
                            readonly="readonly"
                            class="form form-control"
                            name="txtVent_Fecha" 
                            id="txtVent_Fecha"
                            
                            placeholder="Ingrese la fecha de la venta"
                            />
                    </div>
                    </div>
                    <div class="col-6">
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
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="ddlVent_Servicio">Tipo de servicio</label>
                                <select class="form form-control" name="ddlVent_Servicio" id="ddlVent_Servicio" >
                                        <option value="L">Local</option>
                                        <option value="D">Delivery</option>
                                        <option value="A">Autoservicio</option>
                                </select>
                            </div>
                            </div>
                <div class="col-12">
                    <div class="form-group">
                                    <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Observaciones/ Direccion </span>
                                    </div>
                                    <textarea class="form-control" name="txtVentObservaciones" id="txtVentObservaciones" style="max-height: 200px" aria-label="Observaciones"></textarea>
                                    </div> 
                                </div>
                </div>
                
                    <div class="col-6">
                        <div class="form-group">
                                    <label for="ddlMenu">Menu</label>
                                    <select class="form form-control flexselect" name="ddlMenu" id="ddlMenu">
                                        <option value="" selected disabled></option>
                                        <?php
                                        
                                        include '../../assets/conexion/ConexionDB.php';

                                        $con = new conexion();
                                        $estadocon = $con->getCon();
                                        

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
                <input type="submit" class="btn btn-primary mb-5" id="btnCrear" value="Crear" />
                </div>
                
            </form>             
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
<script>
      
      $( document ).ready(function() {
                $("#txtVent_NoOrden").attr("value",
                function  id () 
                {
                    return Math.random().toString(36).substr(2).slice(0,5).toUpperCase();
                }
                );
                $("#txtVent_Fecha").val(
                    function fechaCompra(){
                        Date.prototype.yyyymmdd = function() {
                        var yyyy = this.getFullYear().toString();
                        var mm = (this.getMonth()+1).toString(); 
                        var dd  = this.getDate().toString();
                        return  (mm[1]?mm:"0"+mm[0]) + "/" + (dd[1]?dd:"0"+dd[0]) + "/" +  yyyy; 
                        };
                        
                        var date = new Date();
                        return date.yyyymmdd()

                    }
                    
                );
        }); 
    </script>
    
    <script src="../../../assets/iziToast-master/dist/js/iziToast.min.js" type="text/javascript"></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"> </script>
     <script src="../../../assets/js/alertas.js"></script>
    <?php include('../pages-validar.php');?>
</body>
</html>
