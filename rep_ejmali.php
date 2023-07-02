<?php include_once __DIR__.'/header.php'; ?>
<!-- Main content -->
<section class="content">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">گزارش ارزیابی های اجمالی انجام شده در جشنواره:
                <select class="form-control select2"
                        data-placeholder="انتخاب کنید"
                        style="width: 20%;text-align: right" name="festival_id"
                        id="festival_id">
                    <option value="" selected disabled>انتخاب کنید</option>
                    <?php
                    $query=mysqli_query($connection_maghalat,"select distinct festival_id from article");
                    foreach ($query as $festivals){
                        $query=mysqli_query($connection_maghalat,"select * from festival where id=".$festivals['festival_id']);
                        foreach ($query as $festivalInfo) {}
                        echo "<option value='$festivalInfo[name]'>$festivalInfo[name]</option>";
                    }
                    ?>
                </select>
                با وضعیت
                <select class="form-control select2"
                        data-placeholder="انتخاب کنید"
                        style="width: 20%;text-align: right" name="festival_id"
                        id="festival_id">
                    <option value="" selected disabled>انتخاب کنید</option>
                    <option value="" selected disabled>اجمالی قبول</option>
                    <option value="" selected disabled>اجمالی ردی</option>
                </select>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            محتوای باکس
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
</div>

<!-- /.content-wrapper -->



<?php include_once __DIR__.'/footer.php'; ?>
