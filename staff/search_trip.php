<?php
session_start();
require_once("../admin/configs/config.php");
require_once "auth/staff_role_check.php";
$source_id = $_GET['source_id'];
$destination_id = $_GET['destination_id'];
$departureDate = $_GET['departureDate'];
$bus_operator_id = $_SESSION['staff_staff']['operator_id'];
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
INNER JOIN bus_operator ON bus_operator.bus_operator_id = bus.bus_operator_id AND bus_operator.bus_operator_id = '$bus_operator_id'
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
<?php
$title = "Search Trip";
require_once "header.php";
?>
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
            $departure_time_am_pm = $departure_date_time->format('M d, h:i A');
            $arrival_time_am_pm = $arrival_date_time->format('M d, h:i A');
            $duration = $arrival_date_time->diff($departure_date_time)->format('%h');
        ?>
        <div class="col-md-12" style="margin-bottom: 2%;">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title"><?php echo $departure_time_am_pm ?> - <?php echo $search_row['type'] ?></h5>
                            <p class="card-text font-italic"><?php echo $search_row['route_city_detail'] ?></p>
                            <p class="card-text font-weight-light">Departs: <span class="text-primary font-italic"><?php echo $departure_time_am_pm ?></span></p>
                            <p class="card-text font-weight-light">Arrives: <span class="text-primary font-italic"><?php echo $arrival_time_am_pm ?></span>   Duration: <?php echo $duration?> Hours</p>

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
                                    <a href="seat_list.php?s_id=<?php echo $search_row['s_id'] ?>&no_of_seat=<?php echo $no_of_seat?>&departureDate=<?php echo $departureDate?>" class="btn btn-primary">Select Seat</a>
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
    <?php require_once "footer.php";?>