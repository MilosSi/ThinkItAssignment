<?php


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php if(isset($_GET['reg'])): ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon <?= ($_GET['reg']=='true')? "bg-green":"bg-danger"; ?>"><i class="fas fa-clipboard-check"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Register</span>
                        <span class="info-box-number"><?= ($_GET['reg']=='true')? "Successful":"Failed"; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
    </div>
    <?php endif;?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Log in / Register</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Auth</a></li>
                        <li class="breadcrumb-item active">Log in - Register</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form onsubmit="return proveraLogin()" action="index.php?page=login_logic" method="post">
                    <h2>Login</h2>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="emailLogin" name="emailLogin" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="passLogin" name="passLogin" placeholder="Password - Min 8 characters - 1 Upper case and 1 Number">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-6">
                <form onsubmit="return proveraReg()" action="index.php?page=register_logic" method="post">
                    <h2>Register</h2>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" id="usernameReg" name="usernameReg" aria-describedby="emailHelp" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="emailReg" name="emailReg" aria-describedby="emailReg" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="passwordReg" name="passwordReg" placeholder="Password - Min 8 characters - 1 Upper case and 1 Number">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select role</label>
                        <select class="form-control" id="roleReg" name="roleReg">
                            <?php
                                foreach ($roles as $role):
                            ?>
                            <option value="<?= $role->id?>"><?= $role->name?></option>
                            <?php
                                endforeach;
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
