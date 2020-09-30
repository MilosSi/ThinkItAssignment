<?php

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users and roles</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Users - Roles</li>
                    </ol>
                </div>
            </div>
            <a href="index.php?page=addroles" class="btn btn-primary">Add role</a>
        </div><!-- /.container-fluid -->

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Users - Listing</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="ships" class="table table-bordered table-striped ">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($users as $user):
                                    ?>
                                    <tr>
                                        <td><?= $user->uid ?></td>
                                        <td><?= $user->username ?>
                                        </td>
                                        <td><?= $user->email ?></td>
                                        <td><?= $user->name ?></td>
                                        <td>
                                            <form action="index.php?page=deleteuser&id=<?=$user->uid?>" method="post">
                                                <button class="btn btn-danger mt-2">Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Roles - Listing</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="crew" class="table table-bordered table-striped ">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Role name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($roles as $role):
                                    ?>
                                    <tr>
                                        <td><?= $role->id ?></td>
                                        <td><?= $role->name ?>
                                        </td>
                                        <td><a href="index.php?page=editrole&id=<?=$role->id?>" class="btn btn-success">Edit</a>
                                            <form action="index.php?page=deleterole&id=<?=$role->id?>" method="post">
                                                <button class="btn btn-danger mt-2">Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Role name</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
