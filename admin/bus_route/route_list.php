<?php
require_once('../configs/auth.php');
require_once("../configs/config.php");
require_once "../auth/standard_check_role.php";
$sql = "SELECT route.*,GROUP_CONCAT(city.c_name ORDER BY route_detail.location SEPARATOR '-') AS city_name FROM route INNER JOIN route_detail ON route_detail.route_id = route.r_id INNER JOIN city ON city.c_id = route_detail.city_id GROUP BY route.r_id";
$result = mysqli_query($conn, $sql);
?>
<?php
$title = "Route List";
include('../header.php');
?>
    <section class="content">
        <div class="container-fluid">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Route List <a class="btn-sm btn-primary" href="route_new.php" class="new"> <i class="fa fa-plus"> </i> New Route</a></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Route</a></li>
                                <li class="breadcrumb-item active">Route List</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main row -->
            <div class="row justify-content-center">
                <!-- Left col -->
                <section class="col-12 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-body">
                            <table id="admin_data_table" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Route ID</th>
                                    <th>Route Title</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <?php
                                        $temp_array = explode("-",$row['city_name']);
                                        $from = $temp_array[0]."";
                                        $to = end($temp_array)."";
                                        ?>
                                        <td ><?php echo $row['r_id'] ?></td>
                                        <td><?php echo $row['title'] ?></td>
                                        <td><?php echo $from ?></td>
                                        <td><?php echo $to ?></td>
                                        <td class="text-center">
                                            <a href="#" class="btn-sm btn-success city_detail" route_citys="<?php echo $row['city_name'] ?>">Detail</a>
                                            <a class="btn-sm btn-danger" href="route_delete.php?r_id=<?php echo $row['r_id']?>" onclick="return confirm('Are you sure?')">Delete</a>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div><!-- /.card-body -->
                    </div>

                </section>
                <!-- /.Left col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <div class="modal fade" id="city_detail_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <input type="hidden" id="c_id_edit" name="c_id" value="">
                        <h5 class="modal-title" id="exampleModalLabel">Route Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Location</th>
                                <th scope="col">City</th>
                            </tr>
                            </thead>
                            <tbody id="show_city_detail">

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $(".city_detail").click(function (event) {
                event.preventDefault();
                $("#show_city_detail").empty();
                let city_list = $(this).attr("route_citys").split("-");
                console.log(city_list);
                $("#city_detail_modal").modal('show');
                $.each(city_list, function( index, value ) {
                    let td = $.parseHTML("<tr>\n" +
                        "                                <th scope='row'>"+(index+1)+"</th>\n" +
                        "                                <td>"+value+"</td>\n" +
                        "                            </tr>");
                    $("#show_city_detail").append(td);
                });

            });
        });
    </script>
<?php include('../footer.php')?>