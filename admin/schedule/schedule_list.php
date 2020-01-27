<?php
require_once('../configs/auth.php');
require_once("../configs/config.php");
require_once "../auth/standard_check_role.php";
$result = mysqli_query($conn, "SELECT * FROM schedule INNER JOIN route ON route.r_id = schedule.route_id INNER JOIN bus ON bus.bus_id = schedule.bus_id INNER JOIN bus_operator ON bus_operator.bus_operator_id = bus.bus_operator_id");
?>
<?php
$title = "Schedule List";
include('../header.php');
?>
    <section class="content">
        <div class="container-fluid">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Schedule List <a href="schedule_new.php" class="btn-sm btn-primary" class="new"> <i class="fa fa-plus"></i> New Schedule</a></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Schedule</a></li>
                                <li class="breadcrumb-item active">Schedule List</li>
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
                                    <th>S_ID</th>
                                    <th>Route</th>
                                    <th>Bus</th>
                                    <th>Dep_Time</th>
                                    <th>Arr_Time</th>
                                    <th>Price</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php while($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td><?php echo $row['s_id'] ?></td>
                                        <td><?php echo $row['title'] ?></td>
                                        <td><?php echo $row['bus_operator_name'] ?>_<?php echo $row['bus_id'] ?> (<?php echo $row['type'] ?>)</td>
                                        <td><?php echo $row['departure_time'] ?></td>
                                        <td><?php echo $row['arrival_time'] ?></td>
                                        <td><?php echo $row['price'] ?></td>
                                        <td>
                                            <a class="btn-sm btn-primary" href="schedule_edit.php?s_id=<?php echo $row['s_id']?>">Edit</a>
                                        </td>
                                        <td>
                                            <a  class="btn-sm btn-danger" href="schedule_delete.php?s_id=<?php echo $row['s_id']?>" onclick="return confirm('Are you sure?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </table>
                        </div><!-- /.card-body -->
                    </div>

                </section>
                <!-- /.Left col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
<?php include('../footer.php')?>