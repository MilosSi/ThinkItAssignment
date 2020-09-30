
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.5
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="app/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="app/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="app/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="app/assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="app/assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="app/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="app/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="app/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="app/assets/plugins/moment/moment.min.js"></script>
<script src="app/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="app/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="app/assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="app/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="app/assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="app/assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="app/assets/dist/js/demo.js"></script>

<?php
    if(!isset($_GET['page'])):
?>
    <script src="app/assets/js/loginreg.js"></script>
<?php endif; ?>

<?php
    if(isset($_GET['page']) && ($_GET['page']=='ships' || $_GET['page']=='ranks' || $_GET['page']=='crewmembers' || $_GET['page']=='editship' || $_GET['page']=='notifications' || $_GET['page']=='editnotification' || $_GET['page']=='users')):
?>
    <!-- DataTables -->
    <script src="app/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="app/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="app/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="app/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

    <script>
        $(function () {
            $('#ships').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });

            $('#crew').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $('#addcrew').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
<?php endif;?>

<?php
    if(isset($_GET['page']) && $_GET['page'] == 'editship'):
?>
<script src="app/assets/js/editship.js"></script>
<?php
    endif;
?>

<?php
if(isset($_GET['page']) && ($_GET['page'] == 'addnotification' || $_GET['page'] == 'editnotification')):
    ?>
    <script src="app/assets/js/addnotification.js"></script>
<?php
endif;
?>
</body>
</html>
