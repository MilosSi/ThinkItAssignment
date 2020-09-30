<?php

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ranks</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Ranks</li>
                    </ol>
                </div>
            </div>
            <a href="index.php?page=addrank" class="btn btn-primary">Add new rank</a>
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
                                    <th>Rank Name</th>
                                    <th>Added by</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($ranks as $rank):
                                    ?>
                                    <tr>
                                        <td><?= $rank->rankid ?></td>
                                        <td><?= $rank->rank_name ?>
                                        </td>
                                        <td><?= $rank->username ?></td>
                                        <td><a href="index.php?page=editrank&id=<?=$rank->rankid?>" class="btn btn-success">Edit</a>
                                            <form action="index.php?page=deleterank&id=<?=$rank->rankid?>" method="post">
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
                                    <th>Rank Name</th>
                                    <th>Added by</th>
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
