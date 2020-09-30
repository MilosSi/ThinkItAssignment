<?php

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Notifications</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Notifications</li>
                    </ol>
                </div>
            </div>
            <a href="index.php?page=addnotification" class="btn btn-primary">Add Notification</a>
        </div><!-- /.container-fluid -->

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Notifications - Listing</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="ships" class="table table-bordered table-striped ">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Notification ranks</th>
                                    <th>Added by</th>
                                    <th>actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($notifications as $not):
                                    ?>
                                    <tr>
                                        <td><?= $not->notid ?></td>
                                        <td><?= $not->not_name ?></td>
                                        <td>
                                            <?php foreach ($not->ranks as $nrank): ?>
                                            <?= $nrank->rank_name?><br>
                                            <?php endforeach;?>
                                        </td>
                                        <td><?= $not->username ?></td>
                                        <td><a href="index.php?page=editnotification&id=<?=$not->notid?>" class="btn btn-success">Edit</a>
                                            <form action="index.php?page=deletenotification&id=<?=$not->notid?>?" method="post">
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
                                    <th>Ranks</th>
                                    <th>Added</th>
                                    <th>actions</th>
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
