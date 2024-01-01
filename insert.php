<?php
        //Creating Connection
        $servername="localhost";
        $user="root";
        $pass='';
        $dbname='CodeLearn';

        $conn=mysqli_connect($servername,$user,$pass,$dbname);

        if(!$conn){
            die("<script>alert('Connection failed')</script>");
        }
        
?>
