<?php
require_once('../configs/auth.php');
require_once("../configs/config.php");
require_once "../auth/standard_check_role.php";
$sql_route = "SELECT * FROM route WHERE route.r_id =3 ";
$route_result = mysqli_query($conn, $sql_route);
$route_row = mysqli_fetch_assoc($route_result);
$sql_route_detail = "SELECT * FROM route_detail INNER JOIN city ON city.c_id = route_detail.city_id WHERE route_detail.route_id =3 ";
$route_detail_result = mysqli_query($conn, $sql_route_detail);
$route_detail_list = array();
while($route_detail_row = mysqli_fetch_assoc($route_detail_result))
    array_push($route_detail_list, $route_detail_row);
print_r($route_detail_list);
$city_result = mysqli_query($conn, "SELECT * FROM city");
$city_list = array();
while($row_city = mysqli_fetch_assoc($city_result))
    array_push($city_list,$row_city);
?>
<?php
$title = "New Route";
include('../header.php');
?>
<h1>New Route</h1>
<form action="route_add.php" method="post">
    <ul>
    <li>
    Route Title:
    <input type="text" name="route_title" value="<?php echo $route_row['title'] ?>">
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
<script>
    $(document).ready(function(){
    var count = 2;
    $("#add_route_city").click(function(){
    var str = "<li>Location "+count+":<br><select name='loc_"+count+"'><option value='' selected disabled hidden>Choose City</option><?php foreach ($city_list as $city): ?><option value=\"<?php echo $city['c_id']?>\"><?php echo $city['c_name'] ?></option><?php endforeach; ?></select></li>";
    html = $.parseHTML(str);
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