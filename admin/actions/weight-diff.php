<?php

$servername="sql104.infinityfree.com";
$uname="if0_36048499";
$pass="LokK4Hhvygq";
$db="if0_36048499_gymnsb";

$conn=mysqli_connect($servername,$uname,$pass,$db);

if(!$conn){
    die("Connection Failed");
}

$sql = "SELECT SUM( curr_weight - ini_weight) FROM members WHERE user_id='$id'";
        $amountsum = mysqli_query($conn, $sql) or die(mysqli_error($sql));
        $row_amountsum = mysqli_fetch_assoc($amountsum);
        $totalRows_amountsum = mysqli_num_rows($amountsum);
        echo $row_amountsum['SUM( curr_weight - ini_weight)'];

                
?>