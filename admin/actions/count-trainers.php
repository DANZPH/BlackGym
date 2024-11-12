<?php

$servername="sql104.infinityfree.com";
$uname="if0_36048499";
$pass="LokK4Hhvygq";
$db="if0_36048499_gymnsb";

$conn=mysqli_connect($servername,$uname,$pass,$db);

if(!$conn){
    die("Connection Failed");
}

$sql = "SELECT * FROM staffs WHERE designation='Trainer'";
                $query = $conn->query($sql);

                echo "$query->num_rows";
?> 