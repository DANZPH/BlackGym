<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');	
}

// Include necessary styles and scripts
?><!DOCTYPE html>
<html lang="en">
<head>
    <title>Gym System Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="../css/fullcalendar.css" />
    <link rel="stylesheet" href="../css/matrix-style.css" />
    <link rel="stylesheet" href="../css/matrix-media.css" />
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/jquery.gritter.css" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,800" rel="stylesheet" type="text/css">
</head>
<body>
<div id="header">
    <h1><a href="dashboard.html">Perfect Gym Admin</a></h1>
</div>

<?php include 'includes/topheader.php'?>

<?php $page='members-entry'; include 'includes/sidebar.php'?>

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> 
            <a href="index.html" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i> Home</a> 
            <a href="#" class="tip-bottom">Manage Members</a> 
            <a href="#" class="current">Add Members</a> 
        </div>
        <h1>Member Entry Form</h1>
    </div>

<form role="form" action="index.php" method="POST">
<?php 
include 'dbcon.php';

if (isset($_POST['fullname'])) {
    $fullname = $_POST["fullname"];    
    $username = $_POST["username"];
    $password = md5($_POST["password"]);  // Hashing the password
    $gender = $_POST["gender"];
    $services = $_POST["services"];
    $plan = $_POST["plan"];
    $address = $_POST["address"];
    $contact = $_POST["contact"];

    // Insert query with paid_date set to current timestamp
    $qry = "INSERT INTO members 
            (fullname, username, password, dor, gender, services, amount, paid_date, plan, address, contact, status, p_year, attendance_count, ini_weight, curr_weight, ini_bodytype, curr_bodytype, progress_date, reminder) 
            VALUES ('$fullname', '$username', '$password', CURRENT_TIMESTAMP, '$gender', '$services', 0, CURRENT_TIMESTAMP, '$plan', '$address', '$contact', 'Pending', 0, 0, 0, 0, '', '', CURRENT_TIMESTAMP, 0)";

    $result = mysqli_query($con, $qry);

    // Check if the query was successful
    if (!$result) {
        echo "<div class='container-fluid'>";
        echo "<div class='row-fluid'>";
        echo "<div class='span12'>";
        echo "<div class='widget-box'>";
        echo "<div class='widget-title'> <span class='icon'> <i class='icon-info-sign'></i> </span>";
        echo "<h5>Error Message</h5>";
        echo "</div>";
        echo "<div class='widget-content'>";
        echo "<div class='error_ex'>";
        echo "<h1 style='color:maroon;'>Error 404</h1>";
        echo "<h3>Error occurred while entering your details</h3>";
        echo "<p>" . mysqli_error($con) . "</p>"; // Display MySQL error message for debugging
        echo "<a class='btn btn-warning btn-big' href='../pages/index.php'>Go Back</a></div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    } else {
        echo "<div class='container-fluid'>";
        echo "<div class='row-fluid'>";
        echo "<div class='span12'>";
        echo "<div class='widget-box'>";
        echo "<div class='widget-title'> <span class='icon'> <i class='icon-info-sign'></i> </span>";
        echo "<h5>Message</h5>";
        echo "</div>";
        echo "<div class='widget-content'>";
        echo "<div class='error_ex'>";
        echo "<h1>Success</h1>";
        echo "<h3>Member details have been added!</h3>";
        echo "<p>The requested details have been added. Please wait for verification.</p>";
        echo "<a class='btn btn-inverse btn-big' href='../index.php'>Go Back</a></div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<h3>YOU ARE NOT AUTHORIZED TO ACCESS THIS PAGE. GO BACK to <a href='index.php'>DASHBOARD</a></h3>";
}
?>
</form>

<script src="../js/excanvas.min.js"></script> 
<script src="../js/jquery.min.js"></script> 
<script src="../js/jquery.ui.custom.js"></script> 
<script src="../js/bootstrap.min.js"></script> 
<script src="../js/jquery.flot.min.js"></script> 
<script src="../js/jquery.flot.resize.min.js"></script> 
<script src="../js/jquery.peity.min.js"></script> 
<script src="../js/fullcalendar.min.js"></script> 
<script src="../js/matrix.js"></script> 
<script src="../js/matrix.dashboard.js"></script> 
<script src="../js/jquery.gritter.min.js"></script> 
<script src="../js/matrix.interface.js"></script> 
<script src="../js/matrix.chat.js"></script> 
<script src="../js/jquery.validate.js"></script> 
<script src="../js/matrix.form_validation.js"></script> 
<script src="../js/jquery.wizard.js"></script> 
<script src="../js/jquery.uniform.js"></script> 
<script src="../js/select2.min.js"></script> 
<script src="../js/matrix.popover.js"></script> 
<script src="../js/jquery.dataTables.min.js"></script> 
<script src="../js/matrix.tables.js"></script>
</body>
</html>