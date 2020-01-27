<div class="container-fluid">

    <?php
    require_once('../configs/auth.php');
    require_once("../configs/config.php");
    $result = mysqli_query($conn, "SELECT * FROM bus_operator");
    ?>
    <?php
    $title ='New Bus Operator';
    include('../header.php');
    ?>
    <section class="content-header">
    </section>
   <div class="row justify-content-center">
       <div class="col-md-7">
           <div class="card card-default">
               <div class="card-header">
                   <h3 class="card-title">Bus</h3>
               </div>
               <form action="bus_add.php" method="post" role="form">
                   <!-- /.card-header -->
                   <div class="card-body">
                       <div class="form-group">
                           <label for="bus_operator_name">Bus Operator Name:</label>
                           <select class="form-control selectpicker" id="bus_operator_name" data-live-search="true"
                                   title="Select a location" name="destination_id" required>
                               <?php while($row = mysqli_fetch_assoc($result)): ?>
                                   <option data-tokens="<?php echo $row['bus_operator_name'] ?>"
                                           value="<?php echo $row['bus_operator_id'] ?>"><?php echo $row['bus_operator_name'] ?></option>
                               <?php endwhile;?>
                               <select class="form-control selectpicker" name = 'bus_operator_id'  requred>

                               </select>
                       </div>
                       <div class="form-group">
                           <label for="bus_type">Bus Type:</label>
                           <select name = 'bus_type' class="form-control selectpicker" title="Select Type" requred>
                               <option value="Standard">Standard</option>
                               <option value="VIP">VIP</option>
                           </select>
                       </div>
                       <div class="form-group">
                           <label for="no_of_seat">No of Seat:</label>
                           <input type="number" name="no_of_seat" id="no_of_seat" class="form-control" required min="1" value="1" min="1" max="100" step="1"><br>
                       </div>

                       <div class="form-group">
                           <input type="submit" class="btn btn-primary" value="Add Bus">
                       </div>

                   </div>
                   <!-- /.card-body -->
               </form>

           </div>
       </div>
   </div>



<?php include("../footer.php");?>
</div>