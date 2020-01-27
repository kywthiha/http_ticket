
<?php
require_once('../configs/auth.php');
require_once("../configs/config.php");
$result = mysqli_query($conn, "SELECT * FROM city");
?>
<?php
$title = "City list";
include('../header.php');
?>

<!-- Modal -->
<div class="modal fade" id="new_city_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="city_add.php" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New City</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="city_name">City Name:</label>
                        <input class="form-control" type="text" name="c_name">

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Add City">
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="edit_city_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="city_update.php" method="post">
                <div class="modal-header">
                    <input type="hidden" id="c_id_edit" name="c_id" value="">
                    <h5 class="modal-title" id="exampleModalLabel">Edit City</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="c_name_edit">City Name:</label>
                        <input class="form-control" type="text" name="c_name" id="c_name_edit" value="">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Update City">
                </div>
            </form>
        </div>
    </div>
</div>
<section class="content">
        <div class="container-fluid">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>City List <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#new_city_modal">
                                    <i class="fa fa-plus"></i>New City
                                </button></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">City</a></li>
                                <li class="breadcrumb-item active">City List</li>
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
                                    <th>City ID</th>
                                    <th>City Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td><?php echo $row['c_id'] ?></td>
                                        <td><?php echo $row['c_name'] ?></td>
                                        <td>
                                            <a class="btn-sm btn-primary btn_edit" href="#" data_edit ="<?php echo $row['c_id']?>">Edit</a>
                                            <a class="btn-sm btn-danger" href="city_delete.php?c_id=<?php echo $row['c_id']?>" onclick="return confirm('Are you sure?')">Delete</a>
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
<script>
    $(document).ready(function () {
        $(".btn_edit").on("click",function (event) {
            event.preventDefault();
            let c_id = $(this).attr("data_edit");
            $.get("show_name.php",{'c_id':c_id}, function(data){
                // Display the returned data in browser
                data = JSON.parse(data);
                $("#c_name_edit").attr("value",data['c_name']);
            });
            $("#c_id_edit").attr("value",c_id);
            $("#edit_city_modal").modal('show');
        });
    });
</script>
<?php include('../footer.php')?>