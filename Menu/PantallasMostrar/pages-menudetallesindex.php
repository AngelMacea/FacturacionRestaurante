<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Detalles</title>
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
<link href="../../assets/css/pantallas.css" rel="stylesheet">
  <link href="../../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/iziToast-master/dist/css/iziToast.min.css">
    <link rel="stylesheet" href="../../assets/flexselect/flexselect.css" type="text/css" media="screen" />
</head>
<body>
    <?php  include 'layout-pantalla.php'; ?>
    <div class="container">

    <div class="card mt-5">
        <div class="card-header fw-bold fs-5 ps-5 mb-5">
            Menú Detalles
        </div>
        <div class="card-body">
        <button class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#MenuDeModal">Nuevo</button>
                <table id="TablaE1" class="table table-striped mt-5">
                <thead>
                <tr>
                <th>ID</th>
                <th>Menú</th>
                <th>Ingrediente</th>
                <th>Cantidad</th>
                <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php
                
                include '../../assets/conexion/ConexionDB.php';

                    $con = new conexion();
                    $estadocon = $con->getCon();
                    
                    $query = "EXEC Gnrl.UDP_tblMenuDetalles_Mostrar";
                    $result = sqlsrv_query($estadocon,$query);


                    if($row = sqlsrv_fetch_array($result)){

                        

                        do{
                            if($row['MenuDe_Id'] != "")
                            {
                                print   '<tr>';
                                print   '<td>' .$row['MenuDe_Id'] .'</td>';
                                print   '<td>' .$row['Menu_Descripcion'] .'</td>';
                                print   '<td>' .$row['Ingr_Descripcion'] .'</td>';
                                print   '<td>' .$row['MenuDe_Cantidad'] .'</td>';
                                print   '<td><input type="button" href="#" title="Detalles" alt="Detalles" value="Detalles"/><input type="button" href="#" title="Editar" alt="Editar" value="Editar"/></td>';
                                print   '</tr>';
                            }
                        }while($row = sqlsrv_fetch_array($result));   
                    }
                ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>

        <!-- Modal -->
        <div class="modal fade" id="MenuDeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insertar registro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="Inserts/menudetallesInsert.php">
                    <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label for="txtMenú_Id">Menú</label>
                                <select class="form form-control flexselect" name="ddlMenus" id="ddlMenus">
                                    <?php
                                    $query = "EXEC Gnrl.UDP_tblMenus_Mostrar";
                                    $result = sqlsrv_query($estadocon,$query);
                                    if($row = sqlsrv_fetch_array($result)){
                
                                        do
                                        {
                                                if($row['Menu_Id'] != ""){
                                
                                                    echo "<option value=".$row['Menu_Id'].">".$row['Menu_Descripcion']."</option>";
                                                }
                                        }
                                        while($row = sqlsrv_fetch_array($result));
                                
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                        <div class="form-group">
                        <label for="txtMenú_Id">Ingrediente</label>
                                <select class="form form-control flexselect" name="ddlIngredientes" id="ddlIngredientes">
                                    <?php
                                    $query = "EXEC Inv.UDP_tblIngredientes_Mostrar";
                                    $result = sqlsrv_query($estadocon,$query);
                                    if($row = sqlsrv_fetch_array($result)){
                
                                        do
                                        {
                                                if($row['Ingr_Id'] != ""){
                                
                                                    echo "<option value=".$row['Ingr_Id'].">".$row['Ingr_Descripcion']."</option>";
                                                }
                                        }
                                        while($row = sqlsrv_fetch_array($result));
                                
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Cantidad de Ingredientes</label>
                                    <input type="number" 
                                    class="form-control" 
                                    id="txtCantidad"
                                    name="txtCantidad"
                                    placeholder="Ingrese una valor">
                            </div>
                        </div>
                       <div class="col-12 mt-2">
                       <input type="submit" class="btn btn-primary mb-5" id="btnInsertar" value="Agregar" />
                       </div>
                    </div>
                        
                    </form>
      </div>
      <div class="modal-footer">
      </div>
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
<script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>
  <script src="../../assets/flexselect/liquidmetal.js" type="text/javascript"></script>
<script src="../../assets/flexselect/jquery.flexselect.js" type="text/javascript"></script>
  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>
<script>
    jQuery(document).ready(function() {
    $("select.flexselect").flexselect();
  });
</script>
    <script src="../../assets/iziToast-master/dist/js/iziToast.min.js" type="text/javascript"></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"> </script>
     <script src="../../assets/js/alertas.js"></script>
    <?php include('pages-validar.php');?>
</body>
</html>
