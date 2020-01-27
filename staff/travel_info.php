<?php
session_start();
require_once "auth/staff_role_check.php";
$title = "Travel Info";
require_once "header.php";
?>
<div class="container" style="margin-top: 2%;">
    <div class="row justify-content-center">
        <?php
        require_once("../admin/configs/config.php");
        if (!isset($_SESSION['user_data_http_love'],$_SESSION['ticket_data_http_love'],$_SESSION['ticket_ids_http_love'],$_SESSION['booking_id'],$_SESSION['payment_info_http_love'])) {
            die('unauthorized access');
        }
        if (isset($_SESSION['booking_status'])){
            if($_SESSION['booking_status'] = 0){
                echo "<p class='alert alert-danger'>Booking Fail, Please try again</p>";
            }
        }
        $s_id = $_SESSION['user_data_http_love']['s_id'];
        $ticket_detail = $_SESSION['ticket_data_http_love'];
        $ticket_ids = $_SESSION['ticket_ids_http_love'];
        $no_of_seat = $_SESSION['user_data_http_love']['no_of_seat'];
        $departureDate = $_SESSION['user_data_http_love']['departureDate'];
        $departure_time_am_pm = $ticket_detail['departure_time'];
        $arrival_time_am_pm = $ticket_detail['arrival_time'];
        $gender_status = 0;
        if($no_of_seat > 1){
            $gender_status = 1;
        }
        $gender_result = mysqli_query($conn, "SELECT * FROM traveller_gender WHERE group_status = $gender_status");
        ?>
        <div class="col-md-10">
            <div class="card text-white bg-primary mb-3 text-center">
                <div class="card-header h5"><?php echo $arrival_time_am_pm?></div>
            </div>
        </div>
        <div class="col-md-5" style="margin-bottom: 1%;">
            <div class="card">
                <div class="card-header">
                    Enter Traveller Information
                </div>
                <div class="card-body">
                    <form action="traveller_booking.php" method="get">
                        <input type="hidden" name="ticket_ids" value="<?php echo $ticket_ids?>">
                        <input type="hidden" name="departureDate" value="<?php echo $departureDate?>">
                        <div class="form-group">
                            <label for="traveller_name">Name *</label>
                            <input type="text" class="form-control" id="traveller_name" name = "traveller_name" placeholder="Enter traveller name" required>
                        </div>
                        <div class="form-group">
                            <label for="traveller_gender">Gender *</label>
                            <select class="form-control selectpicker" title="Select a gender" name="traveller_gender" required>
                                <?php  while ($gender_row = mysqli_fetch_assoc($gender_result)):?>
                                    <option value="<?php echo $gender_row['g_id'] ?>"><?php echo $gender_row['g_name'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="traveller_email">Email address</label>
                            <input type="email" name="traveller_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_no">Phone No *</label>
                            <input type="tel" class="form-control" id="phone_no" name="phone_no" placeholder="Enter a phone no" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit and Continue</button>
                    </form>
                </div>
            </div>


        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Trip Information
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td>Operator</td>
                            <td><?php echo $ticket_detail['bus_operator_name'] ?></td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td><?php echo $ticket_detail['type'] ?></td>
                        </tr>
                        <tr>
                            <td>Route</td>
                            <td><?php echo $ticket_detail['title'] ?></td>
                        </tr>
                        <tr>
                            <td>Departure Time</td>
                            <td><?php echo $departure_time_am_pm ?></td>
                        </tr>
                        <tr>
                            <td>Arrival Time</td>
                            <td><?php echo $arrival_time_am_pm ?></td>
                        </tr>
                        <tr>
                            <td>Subtotal</td>
                            <td><?php echo $ticket_detail['price']*$no_of_seat ?> MMK</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>
<?php require_once "footer.php"?>