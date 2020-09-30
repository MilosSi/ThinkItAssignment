<!-- Content Wrapper. Contains page content -->
<?php
if(isset($member))
    $action="updatemember&id={$_GET['id']}";
else
    $action="submitaddmember";
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
            <a href="index.php?page=crewmembers" class="btn btn-primary">Back</a>
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
                            <h3 class="card-title"><?= (isset($member)? "Update member" : "Add member")?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="index.php?page=<?=$action?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">First name</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Milos" value="<?= (isset($member)? $member->first_name : "")?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Last name</label>
                                    <input type="text" class="form-control" id="surname" name="surname" placeholder="Simic" value="<?= (isset($member)? $member->surname : "")?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="milossimic@gmail.com" value="<?= (isset($member)? $member->email_address : "")?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Choose ship</label>
                                    <select class="form-control" id="shipid" name="shipid">
                                        <?php
                                            foreach ($ships as $ship):
                                        ?>
                                        <option value="<?= $ship->shipid?>"
                                            <?php if(isset($member)): ?>
                                            <?= ($member->ship_id == $ship->shipid)? "selected":"";?>
                                            <?php endif?>>
                                            <?= $ship->ship_name?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Choose Rank (Multiple)</label>
                                    <select class="form-control" id="rankid" name="rankid[]" multiple>
                                        <?php foreach($ranks as $rank ):?>
                                        <option value="<?= $rank->rankid ?>"
                                        <?php
                                        if(isset($member)):
                                        ?>
                                            <?php foreach ($member->ranks as $mrank):?>
                                                <?= ($rank->rankid == $mrank->id)? "selected":""?>
                                            <?php endforeach; ?>
                                        <?php endif;?>

                                        > <?= $rank->rank_name?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <?php
                                if (isset($member)):
                                    ?>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Added / Edited by</label>
                                        <input type="text" class="form-control" id="admn" name="admn" disabled value="<?= $member->username?>">
                                    </div>
                                <?php endif;?>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><?= (isset($member)? "Update" : "Submit")?></button>
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
