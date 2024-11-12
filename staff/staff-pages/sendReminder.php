<?php
ob_start();
session_start();
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}
$conn = mysqli_connect("sql104.infinityfree.com","if0_36048499","LokK4Hhvygq","if0_36048499_gymnsb");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit;
}
if(isset($_GET['id'])){
$id=$_GET['id'];

//include 'dbcon.php';


$qry="UPDATE members SET reminder = '1' where user_id=$id";
$result=mysqli_query($conn,$qry);

if($result){
    echo '<script>alert("Notification sent to selected customer!")</script>';
    echo '<script>window.location.href = "payment.php";</script>';
    
}else{
    echo"ERROR!!";
}
}
?>