<?php 
$title = "New Route";
include('../header.php');
?>
    <?php
    require_once('../configs/auth.php');
    require_once("../configs/config.php");
    $result = mysqli_query($conn, "SELECT * FROM city");
    $city_list = array();
    while($row = mysqli_fetch_assoc($result))
        array_push($city_list,$row);
    ?>
    <h1>New Route</h1>
    <form action="route_add.php" method="post">
    <ul>
    <li>
    Route Title:
    <input type="text" name="route_title">
    </li>
    <li>
    Location Start:<br>
    <select name = 'loc_start' requred>
    <option value="" selected disabled hidden>Choose City</option>
    <?php foreach ($city_list as $city): ?>
    <option value="<?php echo $city['c_id']?>"><?php echo $city['c_name'] ?></option>
    <?php endforeach; ?>
    </select>
    </li>
    <li>
    <ul id='route_list'>
    </ul>
    <button type='button' id="add_route_city">Add Sub Route</button>
    <button type='button' id="delete_route_city">Delete Route</button>
    </li>

    <li>
    Location End:<br>
    <select name="loc_end">
    <option value="" selected disabled hidden>Choose City</option>
    <?php foreach ($city_list as $city): ?>
    <option value="<?php echo $city['c_id']?>"><?php echo $city['c_name'] ?></option>
    <?php endforeach; ?>
    </select>
    </li>
    </ul>
    <input type="submit" value="Add Route">
    <script type="text/javascript">
    $(document).ready(function(){
    var count = 2;
  $("#add_route_city").click(function(){
    var str = "<li>Location "+count+":<br><select name='loc_"+count+"'><option value='' selected disabled hidden>Choose City</option><?php foreach ($city_list as $city): ?><option value=\"<?php echo $city['c_id']?>\"><?php echo $city['c_name'] ?></option><?php endforeach; ?></select></li>";
    html = $.parseHTML( str );
    count++;
    $("#route_list").append(html);
  });
  $("#delete_route_city").click(function(){
    if(count == 2)
        count = 2;
    else
        count--;
    $("#route_list").children().last().remove();
  });
});
    </script>
<?php include('../footer.php')?>