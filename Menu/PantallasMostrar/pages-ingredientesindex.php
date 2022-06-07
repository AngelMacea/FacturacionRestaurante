<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingredientes</title>
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
    <?php include 'layout-pantalla.php'; ?>
    <div class="container">

    <div class="card mt-5">
        <div class="card-header fw-bold fs-5 ps-5 mb-5">
            Ingredientes
        </div>
        <div class="card-body">
                <div>
                    <form method="POST" action="">
                        <input type="button" class="btn btn-primary mb-5" id="btnNuevo" value="Nuevo" />
                    </form>
                </div>
                <table id="TablaE1" class="table table-striped mt-5">
                <thead>
                <tr>
                <th>ID</th>
                <th>Ingrediente</th>
                <th>Cantidad</th>
                <th>Proveedor</th>
                <th>Fecha de Caducidad</th>
                <th>Estatus</th>
                <th>Almacen</th>
                <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    date_default_timezone_set('America/Tegucigalpa');
                    include '../../Login/ConexionDB.php';

                    $con = new conexion();
                    $estadocon = $con->getCon();
                    
                    $query = "EXEC Inv.UDP_tblIngredientes_Mostrar";
                    $result = sqlsrv_query($estadocon,$query);


                    if($row = sqlsrv_fetch_array($result)){

                        $TotalCompra = 0;
                        
                        do{
                            if($row['Ingr_Id'] != "")
                            {
                                
                                print   '<tr>';
                                print   '<td>' .$row['Ingr_Id'] .'</td>';
                                print   '<td>' .$row['Ingr_Descripcion'] .'</td>';
                                print   '<td>' .$row['Ingr_Stock'] .'</td>';
                                print   '<td>' .$row['Prov_Descripcion'] .'</td>';
                                print   '<td>' .$row['Ingr_FechaCaducidad'] .'</td>';
                                print   '<td>' .$row['Ingr_Estatus'] .'</td>';
                                print   '<td>' .$row['Almc_Descripcion'] .'</td>';
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
