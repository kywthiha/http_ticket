<?php
    require_once('../configs/auth.php');
    require_once("../configs/config.php");
    require_once "../auth/standard_check_role.php";
    $bus_result = mysqli_query($conn, "SELECT * FROM bus INNER JOIN bus_operator ON bus_operator.bus_operator_id = bus.bus_operator_id");
    $route_result = mysqli_query($conn, "SELECT * FROM route");
    ?>
<?php
$title = "New Schedule";
include('../header.php');?>
    <section class="content-header">
    </section>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">New Schedule</h3>
                </div>
                <form action="schedule_add.php" method="post" role="form">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="route_id">Route:</label>
                            <select class="form-control selectpicker" data-live-search="true"
                                    title="Choose Route" name = 'route_id' id="route_id" required>
                                <option value="" selected disabled hidden>Choose Route</option>
                                <?php while($row = mysqli_fetch_assoc($route_result)): ?>
                                    <option data-tokens="<?php echo $row['title']?>"  value="<?php echo $row['r_id']?>"><?php echo $row['title']?></option>
                                <?php endwhile;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bus_id">Bus:</label>
                            <select class="form-control selectpicker" data-live-search="true"
                                    title="Choose Route" name = 'bus_id' required>
                                <option value="" selected disabled hidden>Choose Bus</option>
                                <?php while($row = mysqli_fetch_assoc($bus_result)): ?>
                                    <option data-tokens="<?php echo $row['bus_operator_name']?>" value="<?php echo $row['bus_id']?>">
                                        [<?php echo $row['bus_id']?>,
                                        <?php echo $row['bus_operator_name']?>,
                                        <?php echo $row['no_of_seat']?>,
                                        <?php echo $row['type']?>]
                                    </option>
                                <?php endwhile;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="departure_time">Departure Time:</label>
                            <input class="form-control" type="time" name="departure_time" id="departure_time" required >
                        </div>
                        <div class="form-group">
                            <label for="arrival_time">Arrival Time:</label>
                            <input class="form-control" type="time" name="arrival_time" id="arrival_time" required >
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" class="form-control" name="price" id="price" required min="1">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Add Schedule">
                        </div>

                    </div>
                    <!-- /.card-body -->
                </form>

            </div>
        </div>
    </div>
    <?php include('../footer.php')?>