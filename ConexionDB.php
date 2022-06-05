<?php
    class conexion
    {
        
        private $con;
        function getCon()
        {

            $servername1 = "DESKTOP-OFF7LQC";
            $connectionInfo = array("Database"=>"FacturacionRestaurante", "UID"=>"ADMIN", "PWD"=>"123", "CharacterSet"=>"UTF-8");

            $con = sqlsrv_connect($servername1, $connectionInfo);

            return $con;
        }
    }
?>