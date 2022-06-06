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
                        <input type="button" class="btn btn-primary mb-5" id="btnNuevo" value="Nuevo" />
                    </form>
                </div>

                <?php
                    include 'ConexionDB.php';

                    $con = new conexion();
                    $estadocon = $con->getCon();
                    
                    $query = "EXEC Gnrl.UDP_tblProveedores_Mostrar";
                    $result = sqlsrv_query($estadocon,$query);


                    if($row = sqlsrv_fetch_array($result)){

                        print '<table id="TablaE1" class="table table-bordered mt-5">';
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