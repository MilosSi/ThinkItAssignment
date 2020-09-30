<!-- Content Wrapper. Contains page content -->
<?php
if(isset($rank))
    $action="updaterank&id={$_GET['id']}";
else
    $action="submitaddrank";
?>
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
            <a href="index.php?page=ranks" class="btn btn-primary">Back</a>
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
                            <h3 class="card-title"><?= (isset($rank)? "Update rank" : "Add rank")?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="index.php?page=<?=$action?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Rank Name</label>
                                    <input type="text" class="form-control" id="rankname" name="rankname" placeholder="Captain" value="<?= (isset($rank)? $rank->rank_name : "")?>">
                                </div>
                                <?php
                                if (isset($rank)):
                                    ?>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Added / Edited by</label>
                                        <input type="text" class="form-control" id="admn" name="admn" disabled value="<?= $rank->username?>">
                                    </div>
                                <?php endif;?>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><?= (isset($rank)? "Update" : "Submit")?></button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->


                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
