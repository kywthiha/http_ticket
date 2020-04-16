<?php
session_start();
if(isset($_SESSION['staff_auth'],$_SESSION['staff_staff'])) {
    header("location: /staff/select_schedule.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="https://img.icons8.com/bubbles/50/000000/bus.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>HTTP Bus Ticket Administration</title>
</head>
<body>
<div class="container-fluid" style="margin-top:4%;">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center"><img src="https://img.icons8.com/bubbles/50/000000/bus.png" class="rounded text-center" alt="Cinque Terre"></h4>
                            <h4 class="card-title text-center">Staff</h4>
                            <form action="auth/login.php" method="post">
                                <?php
                                if(isset($_SESSION['staff_auth_fail'])):
                                    unset($_SESSION['staff_auth_fail']);
                                    ?>
                                    <div class="alert alert-danger">User name and password invalid</div>
                                <?php endif;?>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control" type="text" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" id="password" name="password">
                                </div>
                                <input type="submit" class="btn btn-primary" value="Login">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>