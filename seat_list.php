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
        $s_id = $_GET['s_id'];
        $no_of_seat = 0;
        $result = mysqli_query($conn, "SELECT * FROM schedule INNER JOIN route ON route.r_id = schedule.route_id INNER JOIN bus ON bus.bus_id = schedule.bus_id INNER JOIN bus_operator ON bus_operator.bus_operator_id = bus.bus_operator_id WHERE s_id = '$s_id'");
        $row = mysqli_fetch_assoc($result);
        $no_of_seat = $row['no_of_seat'];
        ?>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <table class="table table-seat-plan" id="seat-table" data-max-seats="3">
                        <?php
                        for ($seat_no = 1; $seat_no <= $no_of_seat; $seat_no++):
                            ?>
                            <tr>
                                <?php
                                for ($r = 1; $r <= 5; $r++):
                                    if( $r == 3):
                                        ?>
                                        <td>
                                        </td>
                                    <?php else:?>
                                        <td><a href="#" class="seat seat-available btn"
                                               data-seat-number="<?php echo $seat_no ?>"><span><?php echo $seat_no++ ?></span></a>
                                        </td>
                                    <?php endif;?>
                                <?php
                                endfor;
                                ?>
                            </tr>
                        <?php
                        endfor;
                        ?>
                    </table>
                    <h1 id="selectedSeatNumbers" class="text-primary text-center"></h1>
                    <table>
                        <tr>
                            <td><?php echo $row['s_id'] ?></td>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo $row['bus_operator_name'] ?>_<?php echo $row['bus_id'] ?> (<?php echo $row['type'] ?>
                                )
                            </td>
                            <td><?php echo $row['departure_time'] ?></td>
                            <td><?php echo $row['arrival_time'] ?></td>
                            <td><?php echo $row['price'] ?></td>
                            <td>
                                <a href="seat_list.php?s_id=<?php echo $row['s_id'] ?>" class="btn btn-secondary">Select
                                    Seat</a></td>
                        </tr>
                    </table>
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