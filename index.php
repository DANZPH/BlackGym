<?php session_start(); 
include('dbcon.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gym System Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-login.css" />
    <link href="font-awesome/css/fontawesome.css" rel="stylesheet" />
    <link href="font-awesome/css/all.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    <!-- SweetAlert CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom Styles for Neon Glow -->
    <style>
        /* Neon glow effect for the loginbox */
        #loginbox {
            background-color: #222; /* Dark background color for the form */
            padding: 40px;
            width: 300px; /* You can adjust the width as needed */
            margin: 100px auto; /* Center the box on the page */
            border-radius: 10px;
            box-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 20px #00ffcc, 0 0 30px #00ffcc, 0 0 40px #00ffcc, 0 0 50px #00ffcc; /* Neon glow */
            color: #fff;
            text-align: center;
            position: relative;
            animation: neon-flicker 1.5s infinite alternate; /* Flicker effect */
        }

        /* Optional flicker effect for the glow */
        @keyframes neon-flicker {
            0% {
                box-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 20px #00ffcc, 0 0 30px #00ffcc, 0 0 40px #00ffcc, 0 0 50px #00ffcc;
            }
            50% {
                box-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 20px #ff3399, 0 0 30px #ff3399, 0 0 40px #ff3399, 0 0 50px #ff3399;
            }
            100% {
                box-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 20px #00ffcc, 0 0 30px #00ffcc, 0 0 40px #00ffcc, 0 0 50px #00ffcc;
            }
        }

        /* Optional styling for the input fields and button */
        .main_input_box {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        input {
            background-color: #333; /* Dark background for input fields */
            color: #fff;
            border: 1px solid #555; /* Light border */
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            transition: all 0.3s ease-in-out;
        }

        input:focus {
            outline: none;
            border-color: #00ffcc; /* Glowing effect on focus */
            box-shadow: 0 0 10px #00ffcc, 0 0 20px #00ffcc; /* Glowing effect */
        }

        .btn {
            background-color: #00ffcc; /* Neon button color */
            color: #222; /* Dark text on button */
            cursor: pointer;
            border-radius: 5px;
            padding: 10px 20px;
            width: 100%;
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            background-color: #00cc99;
        }

        /* Optional: Style for the login links */
        h6 {
            font-size: 14px;
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        h6:hover {
            color: #00ffcc;
        }
    </style>

</head>

<body>
    <div id="loginbox">
        <form id="loginform" method="POST" class="form-vertical" action="#">
            <div class="control-group normal_text">
                <h3>BLACK GYM</h3>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="fas fa-user-circle"></i></span>
                        <input type="text" name="user" placeholder="Username" required/>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly"><i class="fas fa-lock"></i></span>
                        <input type="password" name="pass" placeholder="Password" required />
                    </div>
                </div>
            </div>
            <div class="form-actions center">
                <button type="submit" class="btn btn-block btn-large btn-info" title="Log In" name="login" value="Admin Login">Admin Login</button>
            </div>
        </form>

        <?php
        if (isset($_POST['login'])) {
            $username = mysqli_real_escape_string($con, $_POST['user']);
            $password = mysqli_real_escape_string($con, $_POST['pass']);
            $password = md5($password);

            $query = mysqli_query($con, "SELECT * FROM admin WHERE password='$password' AND username='$username'");
            $row = mysqli_fetch_array($query);
            $num_row = mysqli_num_rows($query);

            if ($num_row > 0) {
                $_SESSION['user_id'] = $row['user_id'];
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Welcome!',
                        text: 'You have successfully logged in.',
                        confirmButtonColor: '#28a745',
                        background: '#2c2c2c',
                        color: '#fff'
                    }).then(() => {
                        window.location.href = 'admin/index.php';
                    });
                </script>";
            } else {
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid Login',
                        text: 'Incorrect Username or Password. Please try again.',
                        confirmButtonColor: '#ff6347',
                        background: '#2c2c2c',
                        color: '#fff'
                    });
                </script>";
            }
        }
        ?>

        <div class="pull-left">
            <a href="customer/index.php"><h6>Customer Login</h6></a>
        </div>
        <div class="pull-right">
            <a href="staff/index.php"><h6>Staff Login</h6></a>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>  
    <script src="js/matrix.login.js"></script> 
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/matrix.js"></script>
</body>

</html>
