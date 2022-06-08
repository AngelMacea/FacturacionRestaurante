<?php
    class conexion
    {
        
        private $con;
        function getCon()
        {
            $servername1 = "DESKTOP-R5AKNLQ";
            $connectionInfo = array("Database"=>"FacturacionRestaurante", "UID"=>"Admin", "PWD"=>"123", "CharacterSet"=>"UTF-8");

            $con = sqlsrv_connect($servername1, $connectionInfo);

            return $con;
        }
    }
?>