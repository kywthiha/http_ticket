
<div class="container-fluid">
    <?php
    require_once "../configs/auth.php";
    require_once "../auth/admin_check_role.php";
    $title ='New Bus Operator';
    include('../header.php');
    ?>
    <section class="content-header">
    </section>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title text-center"><?php echo $_SESSION['staff']['name']?></h3>
                </div>
                <form action="../auth/password_change.php" method="post" role="form">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php
                        if(isset($_SESSION['password_change'])):
                        if($_SESSION['password_change'] ==1):
                        ?>
                            <div class="alert alert-success"> Password Change Success</div>
                        <?php elseif ($_SESSION['password_change'] ==2): ?>
                            <div class="alert alert-danger"> Wrong Old Password</div>
                        <?php
                            unset($_SESSION['password_change']);
                        endif;
                        endif;?>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-5 col-form-label">User Name:</label>
                                <div class="col-sm-5">
                                    <input type="hidden" name="name" value="<?php echo $_SESSION['staff']['name']?>">
                                    <input type="text"  class="form-control" id="inputEmail3" value="<?php echo $_SESSION['staff']['name']?>"  disabled>
                                </div>
                            </div>
                        <div class="form-group row">
                            <label for="old_password" class="col-sm-5 col-form-label">Old Password:</label>
                            <div class="col-sm-5">
                                <input type="password" name="old_password" class="form-control" id="old_password" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="new_password" class="col-sm-5 col-form-label">New Password:</label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" name="new_password" id="new_password">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Password Change">
                        </div>

                    </div>
                    <!-- /.card-body -->
                </form>

            </div>
        </div>
    </div>



    <?php include("../footer.php");?>
</div>