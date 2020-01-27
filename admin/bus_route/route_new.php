<?php
    require_once('../configs/auth.php');
    require_once("../configs/config.php");
    $result = mysqli_query($conn, "SELECT * FROM city");
    $city_list = array();
    while($row = mysqli_fetch_assoc($result))
        array_push($city_list,$row);
    ?>
<?php
$title = "New Route";
include('../header.php');
?>
    <section class="content-header">
    </section>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">New Route</h3>
                </div>
                <form action="route_add.php" method="post" role="form">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group" >
                            <label for="loc_start">Route Title:</label>
                            <input type="text" class="form-control" name="route_title">
                        </div>
                        <div class="form-group">
                            <label for="loc_start">Location Start:</label>
                            <select class="form-control selectpicker" title="Select a city" data-live-search="true"  name = 'loc_start' id ="loc_start" required>
                                <option value="" selected disabled hidden>Choose City</option>
                                <?php foreach ($city_list as $city): ?>
                                    <option data-tokens="<?php echo $city['c_name'] ?>" value="<?php echo $city['c_id']?>"><?php echo $city['c_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div id='route_list'>

                        </div>
                        <div class="form-group">
                            <label for="loc_end">Location End:</label>
                            <select class="form-control selectpicker" title="Select a city" data-live-search="true"  name = 'loc_end' id ="loc_end" required>
                                <option value="" selected disabled hidden>Choose City</option>
                                <?php foreach ($city_list as $city): ?>
                                    <option data-tokens="<?php echo $city['c_name'] ?>" value="<?php echo $city['c_id']?>"><?php echo $city['c_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn-sm btn-primary" type='button' id="add_route_city">Add Location</button>
                            <button  class="btn-sm btn-secondary" type='button' id="delete_route_city">Remove Location</button>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Add Route">
                        </div>

                    </div>
                    <!-- /.card-body -->
                </form>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            var count = 2;
            $("#add_route_city").click(function(){
                var str = "<li>Location "+count+":<br><select class='form-control' name='loc_"+count+"'><option value='' selected disabled hidden>Choose City</option><?php foreach ($city_list as $city): ?><option value=\"<?php echo $city['c_id']?>\"><?php echo $city['c_name'] ?></option><?php endforeach; ?></select></li>";
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