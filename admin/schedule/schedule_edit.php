    <?php
    require_once('../configs/auth.php');
    require_once("../configs/config.php");
    $s_id = $_GET['s_id'];
    $result_schedule = mysqli_query($conn, "SELECT * FROM schedule WHERE s_id = '$s_id'");
    $row_schedule = mysqli_fetch_assoc($result_schedule);
    $bus_result = mysqli_query($conn, "SELECT * FROM bus INNER JOIN bus_operator ON bus_operator.bus_operator_id = bus.bus_operator_id");
    $route_result = mysqli_query($conn, "SELECT * FROM route");
    ?>
<?php
$title = "Edit Schedule";
include('../header.php');
?>
<section class="content-header">
</section>
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">New Schedule</h3>
            </div>
            <form action="schedule_update.php" method="post" role="form">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group">
                        <label for="route_id">Route:</label>
                        <input type="hidden" name="s_id" value="<?php echo $row_schedule['s_id']?>">
                        <select class="form-control selectpicker" data-live-search="true"
                                title="Choose Route" name = 'route_id' id="route_id" required>
                            <option value="" selected disabled hidden>Choose Route</option>
                            <?php while($row = mysqli_fetch_assoc($route_result)): ?>
                                <option data-tokens="<?php echo $row['title']?>" <?php if ($row_schedule['route_id'] == $row['r_id'] ) echo 'selected' ; ?> value="<?php echo $row['r_id']?>"><?php echo $row['title']?></option>
                            <?php endwhile;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bus_id">Bus:</label>
                        <select class="form-control selectpicker" data-live-search="true"
                                title="Choose Route" name = 'bus_id' required>
                            <option value="" selected disabled hidden>Choose Bus</option>
                            <?php while($row = mysqli_fetch_assoc($bus_result)): ?>
                                <option data-tokens="<?php echo $row['bus_operator_name']?>" <?php if ($row_schedule['bus_id'] == $row['bus_id'] ) echo 'selected' ; ?> value="<?php echo $row['bus_id']?>">
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
                        <input class="form-control" type="time" name="departure_time" id="departure_time" required value="<?php echo $row_schedule['departure_time'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="arrival_time">Arrival Time:</label>
                        <input class="form-control" type="time" name="arrival_time" id="arrival_time" required value="<?php echo $row_schedule['arrival_time'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" class="form-control" name="price" id="price" required min="1" value="<?php echo $row_schedule['price'] ?>">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Update Schedule">
                    </div>

                </div>
                <!-- /.card-body -->
            </form>

        </div>
    </div>
</div>
    <?php include('../footer.php')?>