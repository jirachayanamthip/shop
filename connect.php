<?php
     $host= "localhost";
     $user = "root";
     $pm = "";
     $db = "shop";

     $conn = new mysqli($host,$user,$pm,$db);

     if ($conn->connect_error){
        die("connect fail: ". $connect_error);
     }
     echo"connect successfully";
     mysqli_set_charset($conn, "utf8");
     ?>