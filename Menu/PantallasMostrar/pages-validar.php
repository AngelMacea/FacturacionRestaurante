<?php
            if(!isset($_SESSION['ValidacionSuccess'])){
                $_SESSION['ValidacionSuccess'] = false;
                 }
                 else if($_SESSION['ValidacionSuccess']){
                  print "<script>izzitoastSucces('Realizado', 'El campo se ha enviado exitosamente').show();</script>";
                   $_SESSION['ValidacionSuccess'] = false;
                 }
    
                 if(!isset($_SESSION['ValidacionError'])){
                    $_SESSION['ValidacionError'] = false;
                  }
                 else  if($_SESSION['ValidacionError']){
                     $titulo  = $_SESSION['Titulo'];
                     $mensaje = $_SESSION['Mensaje'];
                    print "<script>izzitoastError('$titulo', '$mensaje').show();</script>";
                    $_SESSION['ValidacionError'] = false;
                 }       
         ?>