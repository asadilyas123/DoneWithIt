<?php
 
 session_start();
 if(!isset($_SESSION["onlineuser"])){
    header("location:logIn.php");
 }