<?php

   $servername = "localhost";
   $username = "root";
   $password = "";
   $database = "donewithit";
   $connection = mysqli_connect($servername,$username,$password,$database);


   function renamefile($filename){
     $extension = pathinfo($filename)["extension"];
     return $newfilename = uniqid() . ".$extension";
   }

