<?php 

   $dbServer = "localhost";
   $dbUser = "root";
   $dbPass = "";
   $dbName = "classicmodels";

   $conn = mysqli_connect($dbServer, $dbUser, $dbPass);

   if($conn) {
      $open=mysqli_select_db($conn,$dbName) ;
   }
  
?>