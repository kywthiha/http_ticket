<?php
    session_start();
    require_once "auth/staff_role_check.php";
    $title = "Ticket Seat";
    require_once  "header.php";
    require_once("../admin/configs/config.php");

    if (!isset($_SESSION['user_data_http_love'],$_SESSION['ticket_data_http_love'],$_SESSION['payment_info_http_love'])) {
        die('unauthorized access');
    }
    $s_user_detail = $_SESSION['user_data_http_love'];
    $ticket_id = $_GET['ticket_id'];
    $departureDate = $_SESSION['user_data_http_love']['departureDate'];
    $sql_booking = "INSERT INTO booking(departure_date) VALUES ('$departureDate')";
    $result_booking = mysqli_query($conn, $sql_booking);
    $booking_id = mysqli_insert_id($conn);
    $tk_dp_list = array();
    $ticket_id_list = explode(",", $ticket_id);
    foreach ($ticket_id_list as $ticket_id_one) {
        array_push($tk_dp_list, "('$ticket_id_one','$booking_id','$departureDate')");
    }
    $tk_dp_list = implode(',', $tk_dp_list);
    $sql = "INSERT INTO booking_detail (ticket_id, booking_id, departure_date) VALUES $tk_dp_list";
    $result = mysqli_query($conn, $sql);
    if($result){
        $_SESSION['ticket_ids_http_love'] = $ticket_id;
        $_SESSION['booking_id'] = $booking_id;
    }

?>
<div class="container" style="margin-top: 2%;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card text-white bg-danger mb-3 text-center">
                <?php if(!($result && $result_booking)):
                    ?>
                <div class="card-header h3">
                    No available Seat, Please try again select seat
                </div>
                <div class="card-body">
                    <div class="car-text">
                        <a class="btn btn-primary" href="seat_list.php?s_id=<?php echo $s_user_detail['s_id']?>&no_of_seat=<?php echo  $s_user_detail['no_of_seat']?>&departureDate=<?php echo $departureDate?>">Try again Select Seat</a>
                    </div>
                </div>
                <?php
                    else:
                    header("location:travel_info.php");
                ?>
                <?php  endif;?>
            </div>
        </div>

    </div>


</div>
<?php require_once "footer.php"?>