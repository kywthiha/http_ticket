<?php
$title = "Payment";
require_once "header.php";
?>
<div class="container" style="margin-top:2%;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <?php
            require_once "admin/configs/config.php";
            session_start();
            if (!isset($_SESSION['booking_id'],$_SESSION['traveller_id'],$_SESSION['payment_info_http_love'],$_SESSION['payment_id'])) {
                die('unauthorized access');
            }
            $booking_id = $_SESSION['booking_id'];
            $sql = "UPDATE booking SET status=1  WHERE booking_id = '$booking_id'";
            $result = mysqli_query($conn,$sql);
            ?>
            <?php if($result): ?>
            <div class="alert alert-success" role="alert">
                <i class="fa fa-check" aria-hidden="true"></i>
                Booking Confirm , Payment Success
            </div>
            <?php
                unset($_SESSION['booking_id'],$_SESSION['traveller_id'],$_SESSION['payment_info_http_love'],$_SESSION['payment_id']);
            else:
                ?>
            <div class="alert alert-warning" role="alert">
                <i class="fa fa-clock-o" aria-hidden="true"></i>
                Payment Fail
            </div>
            <?php endif;?>
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title">Please go to HOME</h1>
                            <a class="btn btn-primary" href="/">HOME</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<?php
require_once "footer.php";
?>
