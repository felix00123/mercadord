<?php
 
 session_start();
   if(!isset($_SESSION['user']))
   {
        echo "No hay ninguna sesion iniciada";
//esto ocurre cuando la sesion caduca.
        
   }
   else
   { 
    session_destroy();
       //echo "Has cerrado la sesion";
    echo "<meta content='0;URL=index' http-equiv='REFRESH'> </meta>";
       
   }
 
 
   
?>
 