<!-- Content Wrapper. Contains page content -->
<?php
if(isset($notification))
    $action="updatenotification&id={$_GET['id']}";
else
    $action="submitaddnotification";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Notification</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Ranks</li>
                    </ol>
                </div>
            </div>
            <a href="index.php?page=notifications" class="btn btn-primary">Back</a>
        </div><!-- /.container-fluid -->

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><?= (isset($notification)? "Update notification" : "Add notification")?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="index.php?page=<?=$action?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Notification name</label>
                                    <input type="text" class="form-control" id="notname" name="notname" placeholder="Captain announcement" value="<?= (isset($notification)? $notification->not_name : "")?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Notification content</label>
                                    <textarea class="textarea" id="summernote" name="notcontent" placeholder="Place some text here"
                                              style="width: 100%;  font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                        <?= (isset($notification)? $notification->content : "")?>
                                    </textarea>
                                </div>
                                <?php
                                if (isset($notification)):
                                    ?>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Added / Edited by</label>
                                        <input type="text" class="form-control" id="admn" name="admn" disabled value="<?= $notification->username?>">
                                    </div>
                                <?php endif;?>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Choose Rank for which notification is (Multiple)</label>
                                    <select class="form-control" id="rankid" name="rankid[]" multiple>
                                        <?php foreach($ranks as $rank ):?>
                                            <option value="<?= $rank->rankid ?>"
                                                <?php
                                                if(isset($notification)):
                                                    ?>
                                                    <?php foreach ($notification->ranks as $mrank):?>
                                                    <?= ($rank->rankid == $mrank->id)? "selected":""?>
                                                <?php endforeach; ?>
                                                <?php endif;?>

                                            > <?= $rank->rank_name?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><?= (isset($notification)? "Update" : "Submit")?></button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->


                </div>
                <!--/.col (left) -->
                <?php if(isset($notification)):?>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Crew Members affected by this notification</h3>
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
                <?php endif;?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
