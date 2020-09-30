<?php

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crew members</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Crew members</li>
                    </ol>
                </div>
            </div>
            <a href="index.php?page=addcrew" class="btn btn-primary">Add Crew member</a>
        </div><!-- /.container-fluid -->

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Crew members - Listing</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="ships" class="table table-bordered table-striped ">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Email</th>
                                    <th>Ship</th>
                                    <th>Ranks</th>
                                    <th>Added</th>
                                    <th>actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($crew as $cr):
                                    ?>
                                    <tr>
                                        <td><?= $cr->crewid ?></td>
                                        <td><?= $cr->first_name ?></td>
                                        <td><?= $cr->surname ?></td>
                                        <td><?= $cr->email_address ?></td>
                                        <td><?= ($cr->ship == null)? "Ship deleted":$cr->ship->ship_name ?></td>
                                        <td> <?php foreach ($cr->ranks as $crranks): ?><?= $crranks->rank_name?> <?php endforeach;?></td>
                                        <td><?= $cr->username ?></td>
                                        <td><a href="index.php?page=editcrew&id=<?=$cr->crewid?>" class="btn btn-success">Edit</a>
                                            <form action="index.php?page=deletecrew&id=<?=$cr->crewid?>?" method="post">
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
                                    <th>Surname</th>
                                    <th>Email</th>
                                    <th>Ship</th>
                                    <th>Ranks</th>
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
