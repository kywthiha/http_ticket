<?php
$title = "Seat LIst";
require_once "header.php";
?>
    <div class="container" style="margin-top: 2%;">
        <div class="row justify-content-center">
            <?php
            require_once("admin/configs/config.php");
            if (!isset($_GET['s_id'], $_GET['no_of_seat'], $_GET['departureDate']))
                die("Invalid Request");
            $s_id = $_GET['s_id'];
            $no_of_seat = $_GET['no_of_seat'];
            $departureDate = $_GET['departureDate'];
            $departure_date_time = new DateTime();
            if (!($s_id && $no_of_seat && $departureDate)) {
                die("Invalid Request");
            }
            if ($no_of_seat > 5)
                die("Maximum num of seat 5");
            try {
                $departure_date_time = new DateTime($departureDate);
            } catch (Exception $e) {
                die("Date Invalid");
            }
            $user_data = array("s_id" => $s_id, "no_of_seat" => $no_of_seat, "departureDate" => $departureDate);
            session_start();
            $_SESSION['user_data_http_love'] = $user_data;
            $no_of_seat_list = 0;
            $result = mysqli_query($conn, "SELECT * FROM schedule INNER JOIN route ON route.r_id = schedule.route_id INNER JOIN bus ON bus.bus_id = schedule.bus_id INNER JOIN bus_operator ON bus_operator.bus_operator_id = bus.bus_operator_id WHERE s_id = '$s_id'");
            $row = mysqli_fetch_assoc($result);
            try {
                $departure_date_time = new DateTime($departureDate . ' ' . $row['departure_time']);
            } catch (Exception $e) {
                die("Date Invalid");
            }
            $arrival_date_time = new DateTime($departureDate . ' ' . $row['arrival_time']);
            $date_now = new DateTime();
            $date_diff = $departure_date_time->diff($date_now)->days;
            if ($date_diff > 20)
                die('Maximum Date 20 day');
            $no_of_seat_list = $row['no_of_seat'];
            $departure_time_am_pm = $departure_date_time->format('M d, h:i A');
            $arrival_time_am_pm = $arrival_date_time->format('M d, h:i A');
            $row['departure_time'] = $departure_time_am_pm;
            $row['arrival_time'] = $arrival_time_am_pm;
            $_SESSION['ticket_data_http_love'] = $row;
            $_SESSION['payment_info_http_love'] = array("price" => $row['price'], "no_of_seat" => $no_of_seat);
            mysqli_query($conn, "DELETE FROM booking WHERE status = 0 and staff_id IS NULL and create_date_time < (NOW() - INTERVAL 10 MINUTE)");
            $query_tickets = "SELECT * FROM ticket 
LEFT JOIN booking_detail
ON ticket.t_id = booking_detail.ticket_id AND booking_detail.departure_date= '$departureDate'
LEFT JOIN booking ON booking.booking_id = booking_detail.booking_id
LEFT JOIN traveller ON booking.traveller_id = traveller.traveller_id
LEFT JOIN traveller_gender ON traveller_gender.g_id = traveller.gender_id
WHERE schedule_id='$s_id'";
            $result_tickets = mysqli_query($conn, $query_tickets);
            ?>
            <div class="col-md-10">
                <div class="card text-white bg-primary mb-3 text-center">
                    <div class="card-header h5"><?php echo $arrival_time_am_pm ?></div>
                </div>
            </div>
            <div class="col-md-5" style="margin-bottom: 1%;">
                <div class="card">
                    <div class="card-header">
                        Please
                        select <?php if ($no_of_seat > 1) echo $no_of_seat . ' Seats'; else echo $no_of_seat . ' Seat'; ?>
                    </div>
                    <div class="card-body">
                        <table class="table table-seat-plan" id="seat-table" data-max-seats="<?php echo $no_of_seat ?>">
                            <?php
                            while ($row_tickets = mysqli_fetch_assoc($result_tickets)):

                                ?>
                                <tr>
                                    <?php
                                    for ($r = 1; $r <= 5; $r++):
                                        if (!$row_tickets)
                                            break;
                                        if ($r == 3):
                                            ?>
                                            <td>
                                            </td>
                                        <?php else: ?>
                                            <?php if ($row_tickets['traveller_id']): ?>
                                                <td><a href="#" class="seat seat-unavailable btn disabled btn-danger"
                                                       aria-disabled="true"
                                                       data-seat-id="<?php echo $row_tickets['t_id'] ?>"
                                                       data-seat-number="<?php echo $row_tickets['seat_no'] ?>"><span>
                                                    <?php if ($row_tickets['g_id'] == 1 || $row_tickets['g_id'] == 3): ?>
                                                        <i class="fa fa-male"></i>
                                                    <?php elseif ($row_tickets['g_id'] == 2 || $row_tickets['g_id'] == 4): ?>
                                                        <i class="fa fa-female"></i>
                                                    <?php elseif ($row_tickets['g_id'] == 5): ?>
                                                        <i class="fa fa-users"></i>
                                                    <?php endif; ?>
                                                </span></a>
                                                </td>
                                            <?php elseif ($row_tickets['departure_date']): ?>
                                                <td><a href="#" class="seat seat-unavailable btn disabled btn-danger"
                                                       aria-disabled="true"
                                                       data-seat-id="<?php echo $row_tickets['t_id'] ?>"
                                                       data-seat-number="<?php echo $row_tickets['seat_no'] ?>"><span><i
                                                                    class="fa fa-lock"></i></span></a>
                                                </td>
                                            <?php else: ?>
                                                <td><a href="#" class="seat seat-available btn"
                                                       data-seat-id="<?php echo $row_tickets['t_id'] ?>"
                                                       data-seat-number="<?php echo $row_tickets['seat_no'] ?>"><span><?php echo $row_tickets['seat_no'] ?></span></a>
                                                </td>

                                            <?php endif; ?>
                                            <?php
                                            $row_tickets = mysqli_fetch_assoc($result_tickets);
                                        endif; ?>
                                    <?php
                                    endfor;
                                    ?>
                                </tr>
                            <?php
                            endwhile;
                            ?>
                        </table>
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
                                <td><?php echo $row['bus_operator_name'] ?></td>
                            </tr>
                            <tr>
                                <td>Type</td>
                                <td><?php echo $row['type'] ?></td>
                            </tr>
                            <tr>
                                <td>Route</td>
                                <td><?php echo $row['title'] ?></td>
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
                                <td><?php echo $row['price'] * $no_of_seat ?> MMK</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="card-text text-center">
                            <form action="ticket_seat.php" method="get">
                                <input type="hidden" name="ticket_id" value="" id="seatIDs">
                                <h5>Please
                                    select <?php if ($no_of_seat > 1) echo $no_of_seat . ' Seats'; else echo $no_of_seat . ' Seat'; ?>
                                    <h1 id="selectedSeatNumbers" class="text-primary text-center">0</h1>
                                    <button type="submit" class="btn btn-primary" id="seatSelectionSubmitButton">
                                        Continue To Travel Info
                                    </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
<?php
require_once "footer.php";
?>