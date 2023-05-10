<!-- Control Sidebar -->
<!--<aside class="control-sidebar control-sidebar-dark">-->
<!--    Control sidebar content goes here -->
<!--</aside>-->
<!-- /.control-sidebar -->
<!-- Main Footer -->
<footer class="main-footer">
    <!-- Default to the left -->
    <center>
        <strong style="position: center;">
            امروز:
            <?php
            $date=jdate("l Y/n/j");
            echo $date;
            ?>
            مصادف با:
            <?php
            $arabic_date= arabicDate('hj: l j F Y ',time());
            echo $arabic_date;
            ?>
            می باشد
            <br><br>
            کلیه حقوق اطلاعات این سامانه متعلق به دبیرخانه جشنواره مقالات علمی حوزه می باشد
        </strong>
    </center>
</footer>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jVectorMap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.2 -->
<script src="plugins/chartjs-old/Chart.min.js"></script>
<script src="plugins/select2/select2.full.min.js"></script>
<!-- PAGE SCRIPTS -->
<!--<script src="dist/js/pages/dashboard2.js"></script>-->
<script src="build/js/NoLink.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- Persian Data Picker -->
<script src="dist/js/persian-date.min.js"></script>
<script src="dist/js/persian-datepicker.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!--Customs-->
<!--<script src="build/js/Customs.js"></script>-->

</body>
</html>
<script src="build/js/Plugins_Includes.js"></script>
<?php
include_once __DIR__.'/config/connection_close.php';
?>