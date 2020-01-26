<?php
require_once("admin/configs/config.php");
$result_city = mysqli_query($conn, "SELECT * FROM city");
$city_list = array();
while ($city_row = mysqli_fetch_assoc($result_city))
    array_push($city_list, $city_row);
?>
<?php
$title = "HTTP Bus Ticket";
require_once "header.php"
?>
<div class="container" style="margin-top:2%;">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Search Trip</h5>
                    <form action="search_trip.php#trip_list" method="get">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="source_id">Leaving From</label>
                                <select class="form-control selectpicker" data-live-search="true"
                                        title="Select a location" name="source_id" required>
                                    <?php foreach ($city_list as $city): ?>
                                        <option data-tokens="<?php echo $city['c_name'] ?>"
                                                value="<?php echo $city['c_id'] ?>"><?php echo $city['c_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="destination_id">Going To</label>
                                <select class="form-control selectpicker" data-live-search="true"
                                        title="Select a location" name="destination_id" required>
                                    <?php foreach ($city_list as $city): ?>
                                        <option data-tokens="<?php echo $city['c_name'] ?>"
                                                value="<?php echo $city['c_id'] ?>"><?php echo $city['c_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="departureDate">Departure Date</label>
                                <input type="text" id="departureDate" name="departureDate" class="form-control datepicker"
                                       placeholder="Pick a date" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="no_of_seat">Number of Seats</label>
                                <select class="form-control selectpicker" title="Select Seat" name="no_of_seat" required>
                                    <?php for ($i = 1; $i < 6; $i++): ?>
                                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="form-group col-md-6">
                                <input type="submit" class="form-control btn btn-primary" name="search_now" id="search_now" value="Search Now">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<?php require_once "footer.php"?>

