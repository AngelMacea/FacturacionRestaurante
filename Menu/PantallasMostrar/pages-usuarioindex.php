<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Usuario</title>
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
    <link rel="stylesheet" href="../../assets/iziToast-master/dist/css/iziToast.min.css">
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
    <div class="container ">

    <div class="card mt-5">
        <div class="card-header fw-bold fs-5 ps-5 mb-5">
            Usuarios 
        </div>
        <div class="card-body">
        <button class="btn btn-primary mb-5" data-toggle="collapse" data-target="#InsertUsuario">Agregar Usuarios</button>

        <div id="InsertUsuario" class="collapse">
                    <form method="POST" action="Inserts/UsuariosInsert.php">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="txtEmp_Id">ID del Empleado</label>
                                <select class="form form-control" name="ddlEmpleados" id="ddlEmpleados">
                                    <?php
                                    include '../../Login/ConexionDB.php';

                                    $con = new conexion();
                                    $estadocon = $con->getCon();
                                    
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
                                    ?>
                                </select>
                                
                            </div>
                            <div class="form-group">
                                    <label for="txtNombre">Contraseña</label>
                                    <input type="text" 
                                    class="form-control" 
                                    id="txtPass"
                                    name="txtPass"
                                    placeholder="Ingrese la contraseña">
                                    
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Usuario</label>
                                    <input type="text" 
                                    class="form-control" 
                                    id="txtUsuario"
                                    name="txtUsuario"
                                    placeholder="Ingrese el usuario">
                                    
                            </div>
                            
                        </div>
                        </div>
                        
                        <input type="submit" class="btn btn-primary mb-5" id="btnInsertar" value="btnInsertar" />
                    </form>
        </div>
                <div>
                </div>
                <table id="TablaE1" class="table table-striped  mt-5">
                <thead>
                <tr>
                <th>ID</th>
                <th>Empleado</th>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $query = "EXEC Acce.UDP_tblUsuarios_Mostrar";
                    $result = sqlsrv_query($estadocon,$query);

                    if($row = sqlsrv_fetch_array($result)){
                
                        do
                        {
                                if($row['Usua_Id'] != ""){
                
                                    echo "<tr>";
                                    echo "<td>". $row['Usua_Id'];
                                    echo "<td>". $row['Nombre'];
                                    echo "<td>". $row['Usua_Usuario'];
                                    echo "<td>". $row['Usua_Pass'];
                                    echo "<td><a href='#' title='Editar' alt='Editar'/></td>";
                                    echo "</tr>";
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

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous">
    </script>
    <script src="../../assets/iziToast-master/dist/js/iziToast.min.js" type="text/javascript"></script>
   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"> </script>
     <script src="../../assets/js/alertas.js"></script>
        <?php
            if(!isset($_SESSION['ValidacionTrue'])){
            $_SESSION['ValidacionTrue'] = false;
             }
             else if($_SESSION['ValidacionTrue']){
              print "<script>izzitoastSucces('Realizado', 'El campo se ha enviado exitosamente').show();</script>";
               $_SESSION['ValidacionTrue'] = false;
             }

             if(!isset($_SESSION['ValidacionFalse'])){
                $_SESSION['ValidacionFalse'] = false;
              }
             else  if($_SESSION['ValidacionFalse']){
                print "<script>izzitoastError('Error', 'El campo no se ha enviado').show();</script>";
                $_SESSION['ValidacionFalse'] = false;
             }       
         ?>
   

</body>
</html>
