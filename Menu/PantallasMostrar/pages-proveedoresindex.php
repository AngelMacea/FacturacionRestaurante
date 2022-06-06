<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
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

    <div class="container">

    <div class="card mt-5">
        <div class="card-header fw-bold fs-5 ps-5">
            Proveedores
        </div>
        <div class="card-body">
                <div>
                    <form method="POST" action="">
                        <input type="button" class="btn btn-primary mb-5 mt-5" id="btnNuevo" value="Nuevo" />
                    </form>
                </div>

                <?php
                 include 'layout-pantalla.php';
                    include '../../Login/ConexionDB.php';

                    $con = new conexion();
                    $estadocon = $con->getCon();
                    
                    $query = "EXEC Gnrl.UDP_tblProveedores_Mostrar";
                    $result = sqlsrv_query($estadocon,$query);


                    if($row = sqlsrv_fetch_array($result)){

                        print '<table id="TablaE1" class="table table-striped mt-5">';
                        print '<thead>';
                        print   '<tr>';
                        print       '<th>ID</th>';
                        print       '<th>Proveedor</th>';
                        print       '<th>Telefono</th>';
                        print       '<th>Ciudad</th>';
                        print       '<th>Pais</th>';
                        print       '<th>Acciones</th>';
                        print   '</tr>';
                        print    '</thead>';

                        do{
                            if($row['Prov_Id'] != "")
                            {
                                print '<tbody>';
                                print '<tr>';
                                print   '<td>' .$row['Prov_Id'] .'</td>';
                                print   '<td>' .$row['Prov_Descripcion'] .'</td>';
                                print   '<td>' .$row['Prov_Tel'] .'</td>';
                                print   '<td>' .$row['Ciud_Descripcion'] .'</td>';
                                print   '<td>' .$row['Pais_Descripcion'] .'</td>';
                                print   '<td><input type="button" href="#" title="Detalles" alt="Detalles" value="Detalles"/><input type="button" href="#" title="Editar" alt="Editar" value="Editar"/></td>';
                                print '</tr>';
                                print '</tbody>';
                            
                            }
                        }
                        while($row = sqlsrv_fetch_array($result));
                        {
                            print '</table>';
                        }
                    
                    }

                ?>
            
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
    <script>
        $(document).ready( function () {
            $('#TablaE1').DataTable();
        } );
    </script>
</body>
</html>