<?php 
$title = "Edit Schedule";
include('../header.php');
?>
    <h1>Edit Schedule</h1>
    <?php
    require_once('../configs/auth.php');
    require_once("../configs/config.php");
    $s_id = $_GET['s_id'];
    $result_schedule = mysqli_query($conn, "SELECT * FROM schedule WHERE s_id = '$s_id'");
    $row_schedule = mysqli_fetch_assoc($result_schedule);
    $bus_result = mysqli_query($conn, "SELECT * FROM bus INNER JOIN bus_operator ON bus_operator.bus_operator_id = bus.bus_operator_id");
    $route_result = mysqli_query($conn, "SELECT * FROM route");
    ?>
    <form action="schedule_update.php" method="post">
    <label for="route_id">Route:</label>
    <input type="hidden" name="s_id" value="<?php echo $row_schedule['s_id']?>">
    <select name = 'route_id' requred>
    <option value="" selected disabled hidden>Choose City</option>
    <?php while($row = mysqli_fetch_assoc($route_result)): ?>
        <option <?php if ($row_schedule['route_id'] == $row['r_id'] ) echo 'selected' ; ?> value="<?php echo $row['r_id']?>"><?php echo $row['title']?></option>
    <?php endwhile;?>
    </select>
    <br>
    <label for="bus_id">Bus:</label>
    <select name = 'bus_id' requred>
    <option value="" selected disabled hidden>Choose City</option>
    <?php while($row = mysqli_fetch_assoc($bus_result)): ?>
        <option <?php if ($row_schedule['bus_id'] == $row['bus_id'] ) echo 'selected' ; ?> value="<?php echo $row['bus_id']?>">
        [<?php echo $row['bus_id']?>,
        <?php echo $row['bus_operator_name']?>,
        <?php echo $row['no_of_seat']?>,
        <?php echo $row['type']?>]
        </option>
    <?php endwhile;?>
    </select>
    <br>
    <label for="departure_time">Departure Time:</label>
    <input type="time" name="departure_time" id="" required value="<?php echo $row_schedule['departure_time'] ?>"><br>
    <label for="arrival_time">Arrival Time:</label>
    <input type="time" name="arrival_time" id="" required value="<?php echo $row_schedule['arrival_time'] ?>"><br>
    <label for="price">Price:</label>
    <input type="number" name="price" id="" required min="1" value="<?php echo $row_schedule['price'] ?>"><br>
    <input type="submit" value="Update Schedule">
    </form>
    <?php include('../footer.php')?>