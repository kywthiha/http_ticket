<?php
require_once("admin/configs/config.php");
$source_id = $_GET['source_id'];
$destination_id = $_GET['destination_id'];
$departureDate = $_GET['departureDate'];
$no_of_seat = $_GET['no_of_seat'];
$search_query = "SELECT schedule.s_id,schedule.departure_time,schedule.arrival_time,schedule.price,route_detail.route_id,bus.type,bus.no_of_seat,bus_operator.bus_operator_name,bus_operator.email,bus_operator.phone_no,route.title,A.source_id AS source_id,route_detail.city_id AS destination_id,GROUP_CONCAT(city.c_name ORDER BY route_detail.location SEPARATOR '-') AS route_city_detail
FROM route_detail
INNER JOIN
(SELECT route_detail.route_id,route_detail.location,route_detail.city_id AS source_id
FROM route_detail
WHERE route_detail.city_id = '$source_id') AS A
ON A.route_id = route_detail.route_id AND A.location < route_detail.location AND route_detail.city_id = '$destination_id'
INNER JOIN route ON route.r_id = route_detail.route_id
INNER JOIN schedule ON schedule.route_id = route.r_id
INNER JOIN bus ON bus.bus_id = schedule.bus_id
INNER JOIN bus_operator ON bus_operator.bus_operator_id = bus.bus_id
INNER JOIN route_detail AS rd ON rd.route_id = route_detail.route_id
INNER JOIN city ON city.c_id = rd.city_id
GROUP BY schedule.s_id
ORDER BY schedule.s_id";
$result_search = mysqli_query($conn, $search_query);
$result_city = mysqli_query($conn, "SELECT * FROM city");
$city_list = array();
while ($city_row = mysqli_fetch_assoc($result_city))
    array_push($city_list, $city_row);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/themes/default.css"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/themes/default.date.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>HTTP Bus Ticket</title>
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
<div class="container" style="margin-top:2%;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Search Trip</h5>
                    <form action="search_trip.php" method="get">
                        <div class="form-row align-items-end">
                            <div class="form-group col-md-3">
                                <label for="source_id">Leaving From</label>
                                <select class="form-control selectpicker" data-live-search="true"
                                        title="Select a location" name="source_id" required>
                                    <?php foreach ($city_list as $city): ?>
                                        <?php if ($city['c_id'] == $source_id): ?>
                                            <option selected data-tokens="<?php echo $city['c_name'] ?>"
                                                    value="<?php echo $city['c_id'] ?>"><?php echo $city['c_name'] ?></option>
                                        <?php else: ?>
                                            <option data-tokens="<?php echo $city['c_name'] ?>"
                                                    value="<?php echo $city['c_id'] ?>"><?php echo $city['c_name'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="destination_id">Going To</label>

                                <select class="form-control selectpicker" data-live-search="true"
                                        title="Select a location" name="destination_id" required>
                                    <?php foreach ($city_list as $city): ?>
                                        <?php if ($city['c_id'] == $destination_id): ?>
                                            <option selected data-tokens="<?php echo $city['c_name'] ?>"
                                                    value="<?php echo $city['c_id'] ?>"><?php echo $city['c_name'] ?></option>
                                        <?php else: ?>
                                            <option data-tokens="<?php echo $city['c_name'] ?>"
                                                    value="<?php echo $city['c_id'] ?>"><?php echo $city['c_name'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="departureDate">Departure Date</label>
                                <input type="text" id="departureDate" name="departureDate"
                                       class="form-control datepicker"
                                       placeholder="Pick a date" value="<?php echo $departureDate ?>" required>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="no_of_seat">Number of Seats</label>
                                <select class="form-control selectpicker" title="Select Seat" name="no_of_seat"
                                        required>
                                    <?php for ($i = 1; $i < 6; $i++): ?>
                                        <?php if ($i == $no_of_seat): ?>
                                            <option value="<?php echo $i ?>" selected><?php echo $i ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                        <?php endif; ?>

                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <input type="submit" class="form-control btn btn-primary" name="search_now"
                                       id="search_now" value="Search Now">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center" style="margin-top: 2%;margin-bottom: 10%;" id="trip_list">
        <?php

        while ($search_row = mysqli_fetch_assoc($result_search)):
            $departure_date_time = new DateTime($departureDate.' '.$search_row['departure_time']);
            $arrival_date_time = new DateTime($departureDate.' '.$search_row['arrival_time']);
            $departure_time_am_pm = $departure_date_time->format('h:i A');
            $arrival_time_am_pm = $arrival_date_time->format('h:i A');
            $duration = $arrival_date_time->diff($departure_date_time)->format('%h');
        ?>
        <div class="col-md-12" style="margin-bottom: 2%;">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title"><?php echo $departure_time_am_pm ?> - <?php echo $search_row['type'] ?></h5>
                            <p class="card-text font-italic"><?php echo $search_row['route_city_detail'] ?></p>
                            <p class="card-text font-weight-light">Departs: <span class="text-primary font-italic">Jan 28, <?php echo $departure_time_am_pm ?></span></p>
                            <p class="card-text font-weight-light">Arrives: <span class="text-primary font-italic">Jan 28, <?php echo $arrival_time_am_pm ?></span>   Duration: <?php echo $duration?> Hours</p>

                        </div>
                        <div class="col-md-6">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5 class="card-title"><?php echo $search_row['bus_operator_name'] ?></h5>
                                </div>
                                <div class="col text-right">
                                    <h5 class="card-title text-danger"><?php echo $search_row['price']*$no_of_seat ?> MMK</h5>
                                    <div class="card-text text-danger"><?php echo $no_of_seat ?> Seat x <?php echo $search_row['price'] ?> MMK</div>
                                    <br>
                                    <a href="seat_list.php?s_id=<?php echo $search_row['s_id'] ?>" class="btn btn-primary">Select Seat</a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php endwhile;?>
    </div>

    <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Please select pick date</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/picker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.5.6/compressed/picker.date.js"></script>
    <script>
        $(document).ready(function () {
            Date.prototype.addDays = function (days) {
                let date = new Date(this.valueOf());
                date.setDate(date.getDate() + days);
                return date;
            }
            let dateInput = $('.datepicker').pickadate({
                format: 'yyyy-mm-dd',
                min: new Date(),
                max: new Date().addDays(20)

            });

            $('form').submit(function (e) {
                let hello = $("#departureDate").val();
                if (hello == "") {
                    $('#alertModal').modal('show');
                    e.preventDefault();
                }
            });

        });
    </script>
</body>
</html>