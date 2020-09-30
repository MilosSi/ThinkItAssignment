<!-- Content Wrapper. Contains page content -->
<?php
if(isset($ship))
    $action="updateship&id={$_GET['id']}";
else
    $action="submitaddship";
?>
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
            <a href="index.php?page=ships" class="btn btn-primary">Back</a>
        </div><!-- /.container-fluid -->

    </section>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><h3 class="card-title"><?= (isset($ship)? "Update ship" : "Add ship")?></h3></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="index.php?page=<?=$action?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ship Name</label>
                                    <input type="text" class="form-control" id="shipname" name="shipname" placeholder="Ovation of the seas" value="<?= (isset($ship)? $ship->ship_name : "")?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Serial Number</label>
                                    <input type="text" class="form-control" id="serialnum" name="serialnum" placeholder="MDA5525" value="<?= (isset($ship)? $ship->serial_num : "")?>">
                                </div>
                                <?php
                                    if (isset($ship)):
                                ?>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Added / Edited by</label>
                                    <input type="text" class="form-control" id="admn" name="admn" disabled value="<?= $ship->username?>">
                                </div>
                                <?php endif;?>
                                <div class="form-group">
                                    <label for="exampleInputFile">Upload picture</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="shippic" name="shippic">
                                            <label class="custom-file-label" for="s"><?= (isset($ship)? $ship->image_path : "Choose file")?></label>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if (isset($ship)):
                                    ?>
                                    <img src="app/assets/dist/img/ships/<?= $ship->image_path?>" class="img-fluid d-block" style="height: 150px">
                                <?php
                                endif;
                                ?>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><?= (isset($ship)? "Update" : "Submit")?></button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->


                </div>
                <!--/.col (left) -->
                <!-- left column -->
                <?php if (isset($ship)):?>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title"><h3 class="card-title">Crew Members</h3></h3>
                                </div>
                                <!-- /.card-header -->

                                <!-- /.card-header -->
                                <div class="card-body table-responsive">
                                    <table id="crew" class="table table-bordered table-striped ">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Ranks</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($crewmembers as $cm):
                                        ?>
                                        <tr>
                                            <td><a href="index.php?page=editcrew&id=<?= $cm->id?>"><?= $cm->id?></a> </td>
                                            <td><?= $cm->first_name?> <?= $cm->surname?></td>
                                            <td>
                                                <?php foreach ($cm->ranks as $cmranks):?>
                                                    <?= $cmranks->rank_name?><br>
                                                <?php endforeach;?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Ranks</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title"><h3 class="card-title">Add crew members</h3></h3>
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body table-responsive">
                                    <table id="addcrew" class="table table-bordered table-striped ">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Ranks</th>
                                            <th>On Ship</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($crewmembersout as $cmo):
                                            ?>
                                            <tr>
                                                <td><a href="index.php?page=editcrew&id=<?= $cmo->id?>"><?= $cmo->id?></a> </td>
                                                <td><?= $cmo->first_name?> <?= $cmo->surname?></td>
                                                <td>
                                                    <?php foreach ($cmo->ranks as $cmranks):?>
                                                        <?= $cmranks->rank_name?><br>
                                                    <?php endforeach;?>
                                                </td>
                                                <td><?= ($cmo->ship == null)?"Ship Deleted":$cmo->ship->ship_name;?></td>
                                                <td><button class="btn btn-success addtocrew" data-crew="<?= $cmo->id?>">Add to this ship</button></td>
                                                <input type="hidden" id="shipid" value="<?= $_GET['id'] ?>">
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Ranks</th>
                                            <th>On Ship</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->


                            </div>
                            <!-- /.card -->
                        </div>
                    </div>


                </div>
                <!--/.col (left) -->
                <?php endif;?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->
