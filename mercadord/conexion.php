<?php
$host_db = "localhost";
 $user_db = "root";
 $pass_db = "root";
 $db_name = "santodomingordventas";

 
 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
 ?>