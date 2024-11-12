<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit;
}

// Database connection
$conn = mysqli_connect("sql104.infinityfree.com", "if0_36048499", "LokK4Hhvygq", "if0_36048499_gymnsb");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gym System</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="../css/fullcalendar.css" />
    <link rel="stylesheet" href="../css/matrix-style.css" />
    <link rel="stylesheet" href="../css/matrix-media.css" />
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/jquery.gritter.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<div id="header">
    <h1><a href="dashboard.html">Perfect Gym</a></h1>
</div>

<?php include '../includes/header.php'?>
<?php $page="payment"; include '../includes/sidebar.php'?>

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> 
            <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
            <a href="payment.php" class="current">Payments</a> 
        </div>
        <h1 class="text-center">Registered Member's Payment <i class="icon icon-group"></i></h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class='widget-box'>
                    <div class='widget-title'> 
                        <span class='icon'> <i class='icon-th'></i> </span>
                        <h5>Member's Payment table</h5>
                        <form id="custom-search-form" role="search" method="POST" action="search-result.php" class="form-search form-horizontal pull-right">
                            <div class="input-append span12">
                                <input type="text" class="search-query" placeholder="Search" name="search" required>
                                <button type="submit" class="btn"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class='widget-content nopadding'>
                        <?php
                        $qry = "SELECT * FROM members";
                        $cnt = 1;
                        $result = mysqli_query($conn, $qry);

                        echo "<table class='table table-bordered data-table table-hover'>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fullname</th>
                                        <th>Last Payment Date</th>
                                        <th>Amount</th>
                                        <th>Choosen Service</th>
                                        <th>Plan</th>
                                        <th>Action</th>
                                        <th>Remind</th>
                                    </tr>
                                </thead>
                                <tbody>";

                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>
                                    <td><div class='text-center'>{$cnt}</div></td>
                                    <td><div class='text-center'>{$row['fullname']}</div></td>
                                    <td><div class='text-center'>" . ($row['paid_date'] == 0 ? "New Member" : $row['paid_date']) . "</div></td>
                                    <td><div class='text-center'>₱{$row['amount']}</div></td>
                                    <td><div class='text-center'>{$row['services']}</div></td>
                                    <td><div class='text-center'>{$row['plan']} Month/s</div></td>
                                    <td><div class='text-center'><a href='user-payment.php?id={$row['user_id']}'><button class='btn btn-success btn'><i class='icon icon-money'></i> Make Payment</button></a></div></td>
                                    <td><div class='text-center'><a href='sendReminder.php?id={$row['user_id']}'><button class='btn btn-danger btn' " . ($row['reminder'] == 1 ? "disabled" : "") . ">Alert</button></a></div></td>
                                  </tr>";
                            $cnt++;
                        }

                        echo "</tbody></table>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row-fluid">
    <div id="footer" class="span12"><?php echo date("Y"); ?> &copy; BLACK GYM</div>
</div>

<style>
#footer {
    color: white;
}
#custom-search-form {
    margin: 0;
    margin-top: 5px;
    padding: 0;
}
#custom-search-form .search-query {
    padding: 3px 4px;
    margin-bottom: 0;
    border-radius: 3px;
}
#custom-search-form button {
    border: 0;
    background: none;
    padding: 2px 5px;
    margin-top: 2px;
    position: relative;
    left: -28px;
    margin-bottom: 0;
    border-radius: 3px;
}
.search-query:focus + button {
    z-index: 3;   
}
</style>

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

<script type="text/javascript">
function goPage(newURL) {
    if (newURL != "") {
        if (newURL == "-") {
            resetMenu();
        } else {  
            document.location.href = newURL;
        }
    }
}
function resetMenu() {
    document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>