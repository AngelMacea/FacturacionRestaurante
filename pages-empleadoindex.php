<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css%22%3E"/>
    <link rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" 
        crossorigin="anonymous">
</head>
<body>

    <div class="container">

    <div class="card mt-5">
        <div class="card-header fw-bold fs-5 ps-5">
            Empleados
        </div>
        <div class="card-body">
                <div>
                    <form method="POST" action="">
                        <input type="button" class="btn btn-primary" id="btnNuevo" value="Nuevo" />
                    </form>
                </div>

                <?php
                    include 'ConexionDB.php';

                    $con = new conexion();
                    $estadocon = $con->getCon();
                    
                    $query = "EXEC  Gnrl.UDP_tblEmpleados_Mostrar";
                    $result = sqlsrv_query($estadocon,$query);


                    if($row = sqlsrv_fetch_array($result)){

                        print '<table id="TablaE1" class="table table-bordered mt-5">';
                        print '<thead>';
                        print   '<tr>';
                        print       '<th>ID</th>';
                        print       '<th>Identidad</th>';
                        print       '<th>Nombre</th>';
                        print       '<th>Sexo</th>';
                        print       '<th>Edad</th>';
                        print       '<th>Estado Civil</th>';
                        print       '<th>Correo</th>';
                        print       '<th>Rol</th>';
                        print       '<th>Acciones</th>';
                        print   '</tr>';
                        print    '</thead>';

                        do{
                            if($row['Emp_Id'] != "")
                            {
                                print '<tbody>';
                                print '<tr>';
                                print   '<td>' .$row['Emp_Id'] .'</td>';
                                print   '<td>' .$row['Emp_Identidad'] .'</td>';
                                print   '<td>' .$row['Nombre'] .'</td>';
                                print   '<td>' .$row['Sexo'] .'</td>';
                                print   '<td>' .$row['Emp_Edad'] .'</td>';
                                print   '<td>' .$row['EsCi_Descrip'] .'</td>';
                                print   '<td>' .$row['Emp_Correo'] .'</td>';
                                print   '<td>' .$row['Rol_Descripcion'] .'</td>';
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
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js%22%3E"> </script>
    <script>
        $(document).ready( function () {
            $('#TablaE1').DataTable();
        } );
    </script>
</body>
</html>