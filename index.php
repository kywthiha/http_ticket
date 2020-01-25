<?php
require_once("admin/configs/config.php");
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

            $('form').submit(function(e) {
                    let hello= $("#departureDate").val();
                    if(hello == ""){
                        $('#alertModal').modal('show');
                        e.preventDefault();
                    }
            });

        });
    </script>
</body>
</html>