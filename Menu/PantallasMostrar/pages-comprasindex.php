<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras</title>
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
  <link href="../../assets/css/pantallas.css" rel="stylesheet">
  <link rel="stylesheet" href="../../assets/iziToast-master/dist/css/iziToast.min.css">
</head>
<body>
    <?php include 'layout-pantalla.php'; ?>
    <div class="container">

    <div class="card mt-5">
        <div class="card-header fw-bold fs-5 ps-5 mb-5">
            Compras
        </div>
        <div class="card-body">
        <a class="btn btn-primary mb-5" href="Inserts/pages-comprasInsert.php" >Nuevo</a>
            <table id="example" class="table table-striped mt-5">
                    <thead>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Numero Orden</th>
                            <th>Proveedor</th>
                        </tr>
                    </thead>
            </table>
        </div>
        </div>
    </div>


     <!-- Modal -->
<div class="modal fade" id="ComprasModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insertar registro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="insertForm" method="POST" action="Inserts/ComprasInsert.php">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="txtEmp_Id">Fecha de la compra</label>
                                    <input type="date"
                                    class="form-control"
                                    id="txtComp_Fecha"
                                    name="txtComp_Fecha"
                                    >
                                    
                                </div>
                                <div class="form-group">
                                        <label for="txtNombre"># de orden</label>
                                        <input type="text" 
                                        class="form-control" 
                                        id="txtComp_NoOrden"
                                        name="txtComp_NoOrden"
                                        placeholder="Ingrese el # de orden">
                                        
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                        <label for="txtComp_IVA">IVA %</label>
                                        <input type="number" 
                                        class="form-control" 
                                        id="txtComp_IVA"
                                        name="txtComp_IVA"
                                        placeholder="Ingrese el % de IVA">
                                        
                                </div>
                                
                            </div>
                            </div>
                            
                            <input type="submit" class="btn btn-primary mb-5" id="btnInsertar" value="Crear" />
                    </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ComprasDetallesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insertar registro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="insertForm" method="POST" action="Inserts/ComprasInsert.php">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="txtEmp_Id">Fecha de la compra</label>
                                    <input type="date"
                                    class="form-control"
                                    id="txtComp_Fecha"
                                    name="txtComp_Fecha"
                                    >
                                    
                                </div>
                                <div class="form-group">
                                        <label for="txtNombre"># de orden</label>
                                        <input type="text" 
                                        class="form-control" 
                                        id="txtComp_NoOrden"
                                        name="txtComp_NoOrden"
                                        placeholder="Ingrese el # de orden">
                                        
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                        <label for="txtComp_IVA">IVA %</label>
                                        <input type="number" 
                                        class="form-control" 
                                        id="txtComp_IVA"
                                        name="txtComp_IVA"
                                        placeholder="Ingrese el % de IVA">
                                        
                                </div>
                                
                            </div>
                            </div>
                            
                            <input type="submit" class="btn btn-primary mb-5" id="btnInsertar" value="Crear" />
                    </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<script src="../../assets/js/jquery-3.6.0.min.js"></script>
<script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous">
    </script>
    <script src="../../assets/iziToast-master/dist/js/iziToast.min.js" type="text/javascript"></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"> </script>
     <script src="../../assets/js/alertas.js"></script>
     <script src="../../assets/js/tablamaestra.js"></script>
    <?php include('pages-validar.php');?>
</body>
</html>

