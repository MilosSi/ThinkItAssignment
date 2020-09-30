<?php

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ships</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Ships</li>
                    </ol>
                </div>
            </div>
            <a href="index.php?page=addship" class="btn btn-primary">Add new ship</a>
        </div><!-- /.container-fluid -->

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ships - Listing</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="ships" class="table table-bordered table-striped ">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Serial Number</th>
                                    <th>Admin</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach ($ships as $ship):
                                ?>
                                <tr>
                                    <td><?= $ship->shipid ?></td>
                                    <td><?= $ship->ship_name ?>
                                    </td>
                                    <td><?= $ship->serial_num ?></td>
                                    <td><?= $ship->username ?></td>
                                    <td> <img src="app/assets/dist/img/ships/<?= $ship->image_path?>" class="img-fluid" style="height: 150px"> </td>
                                    <td><a href="index.php?page=editship&id=<?=$ship->shipid?>" class="btn btn-success">Edit</a>
                                    <form action="index.php?page=deleteship&id=<?=$ship->shipid?>?" method="post">
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
                                    <th>Name</th>
                                    <th>Serial Number</th>
                                    <th>Image</th>
                                    <th>Admin</th>
                                    <th>Actions</th>
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
