<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Seat List</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-white border-bottom box-shadow">
    <a class="navbar-brand font-weight-bold" href="#">HTTP Bus Ticket</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container" style="margin-top: 2%;">
    <div class="row justify-content-center">
        <?php
        require_once("admin/configs/config.php");
        if (!isset($_GET['s_id'],$_GET['no_of_seat'],$_GET['departureDate']))
            die("Invalid Request");
        $s_id = $_GET['s_id'];
        $no_of_seat = $_GET['no_of_seat'];
        $departureDate = $_GET['departureDate'];
        if (!($s_id && $no_of_seat && $departureDate)){
            die("Invalid Request");
        }
        if ($no_of_seat > 5)
            die("Maximum num of seat 5");
        $no_of_seat_list = 0;
        $query_tickets = "SELECT * FROM ticket WHERE schedule_id=$s_id";
        $result_tickets = mysqli_query($conn, $query_tickets);
        $result = mysqli_query($conn, "SELECT * FROM schedule INNER JOIN route ON route.r_id = schedule.route_id INNER JOIN bus ON bus.bus_id = schedule.bus_id INNER JOIN bus_operator ON bus_operator.bus_operator_id = bus.bus_operator_id WHERE s_id = '$s_id'");
        $row = mysqli_fetch_assoc($result);
        $departure_date_time = new DateTime();
        try {
            $departure_date_time = new DateTime($departureDate.' '.$row['departure_time']);
        } catch (Exception $e) {
            die("Date Invalid");
        }
        $arrival_date_time = new DateTime($departureDate.' '.$row['arrival_time']);
        $date_now = new DateTime();
        $date_diff = $departure_date_time->diff($date_now)->days;
        if ($date_diff>20)
            die('Maximum Date 20 day');
        $no_of_seat_list = $row['no_of_seat'];
        $departure_time_am_pm = $departure_date_time->format('M d, h:i A');
        $arrival_time_am_pm = $arrival_date_time->format('M d, h:i A');
        ?>
        <div class="col-md-10">
            <div class="card text-white bg-primary mb-3 text-center">
                  <div class="card-header h3">Departure Date: <?php echo $departureDate?></div>
            </div>
        </div>
        <div class="col-md-5" style="margin-bottom: 1%;">
            <div class="card">
                <div class="card-header">
                    Please select <?php if($no_of_seat>1) echo $no_of_seat.' Seats'; else echo $no_of_seat.' Seat';?>
                </div>
                <div class="card-body">
                    <table class="table table-seat-plan" id="seat-table" data-max-seats="<?php echo $no_of_seat ?>">
                        <?php
                        while($row_tickets = mysqli_fetch_assoc($result_tickets)):
                            ?>
                            <tr>
                                <?php
                                for ($r = 1; $r <= 5; $r++):
                                    if(!$row_tickets)
                                        break;
                                    if( $r == 3):
                                        ?>
                                        <td>
                                        </td>
                                    <?php else:?>
                                        <td><a href="#" class="seat seat-available btn" data-seat-id="<?php echo $row_tickets['t_id'] ?>"
                                               data-seat-number="<?php echo $row_tickets['seat_no'] ?>"><span><?php echo $row_tickets['seat_no'] ?></span></a>
                                        </td>
                                    <?php
                                        $row_tickets = mysqli_fetch_assoc($result_tickets);
                                    endif;?>
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
                            <td><?php echo $row['price']*$no_of_seat ?> MMK</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="card-text text-center">
                        <form action="index.php" method="get">
                            <input type="hidden" name="ticket_id" value="" id="seatIDs">
                            <h5>Please select <?php if($no_of_seat>1) echo $no_of_seat.' Seats'; else echo $no_of_seat.' Seat';?>
                                <h1 id="selectedSeatNumbers" class="text-primary text-center">0</h1>
                                <button type="submit" class="btn btn-primary" id="seatSelectionSubmitButton">Continue To Travel Info</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="js/seat_select.js"></script>
</body>
</html>