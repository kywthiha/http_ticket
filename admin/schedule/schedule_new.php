
<?php
$title = "New Schedule"; 
include('../header.php');?>
    <?php
    require_once('../configs/auth.php');
    require_once("../configs/config.php");
    $bus_result = mysqli_query($conn, "SELECT * FROM bus INNER JOIN bus_operator ON bus_operator.bus_operator_id = bus.bus_operator_id");
    $route_result = mysqli_query($conn, "SELECT * FROM route");
    ?>
    <h1>New Schedule</h1>
    <form action="schedule_add.php" method="post">
    <label for="route_id">Route:</label>
    <select name = 'route_id' requred>
    <option value="" selected disabled hidden>Choose City</option>
    <?php while($row = mysqli_fetch_assoc($route_result)): ?>
        <option value="<?php echo $row['r_id']?>"><?php echo $row['title']?></option>
    <?php endwhile;?>
    </select>
    <br>
    <label for="bus_id">Bus:</label>
    <select name = 'bus_id' requred>
    <option value="" selected disabled hidden>Choose City</option>
    <?php while($row = mysqli_fetch_assoc($bus_result)): ?>
        <option value="<?php echo $row['bus_id']?>">
        [<?php echo $row['bus_id']?>,
        <?php echo $row['bus_operator_name']?>,
        <?php echo $row['no_of_seat']?>,
        <?php echo $row['type']?>]
        </option>
    <?php endwhile;?>
    </select>
    <br>
    <label for="departure_time">Departure Time:</label>
    <input type="time" name="departure_time" id="" required ><br>
    <label for="arrival_time">Arrival Time:</label>
    <input type="time" name="arrival_time" id="" required ><br>
    <label for="price">Price:</label>
    <input type="number" name="price" id="" required min="1"><br>
    <input type="submit" value="Add Schedule">
    </form>
    <?php include('../footer.php')?>