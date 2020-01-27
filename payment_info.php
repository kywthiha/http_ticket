<?php
$title = "Payment";
require_once "header.php";
?>

<div class="container" style="margin-top:2%;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <?php
            session_start();
            require_once "admin/configs/config.php";
            if (!isset($_SESSION['booking_id'],$_SESSION['traveller_id'],$_SESSION['payment_info_http_love'])) {
                die('unauthorized access');
            }
            $payment_info = $_SESSION['payment_info_http_love'];
            $_SESSION['payment_id'] = "http_love_1500";
            $booking_id = $_SESSION['booking_id'];
            $result = mysqli_query($conn,"SELECT create_date_time FROM booking WHERE booking_id = '$booking_id'");
            $bk_date_time = mysqli_fetch_assoc($result);
            $bk_date_time = new DateTime($bk_date_time['create_date_time']);
            $bk_date_time = $bk_date_time ->add(new DateInterval('PT10M'));

            ?>
            <div class="alert alert-warning" role="alert">
                <i class="fa fa-clock-o" aria-hidden="true"></i>
                To confirm the seats, please complete the payment by <?php echo $bk_date_time->format("h:i A"); ?>
            </div>
            <div class="card border-primary">
                <div class="card-body justify-content-center">
                    <h5 class="card-title">Order Summary</h5>
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td>Rate</td>
                            <td><?php echo $payment_info['price']?> MMK</td>
                        </tr>
                        <tr>
                            <td>No of Seat</td>
                            <td><?php echo $payment_info['no_of_seat']?></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td><?php echo $payment_info['price']*$payment_info['no_of_seat']?> MMK</td>
                        </tr>
                        </tbody>
                    </table>
                        <a href="payment.php" class="btn btn-outline-primary">Processed To Payment</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once "footer.php";?>
