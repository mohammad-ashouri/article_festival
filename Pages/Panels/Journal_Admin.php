<!-- Main content -->
<section class="content">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">وضعیت کلی ادوار جشنواره</h3>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-6" style="display: inline-block;max-width: 24.5%">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php
                                $query=mysqli_query($connection_mag,"select * from mag_info where active=1 or deleted=0");
                                echo mysqli_num_rows($query);
                                ?></h3>

                            <p>نشریه</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-book"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6" style="display: inline-block;max-width: 24.5%">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php
                                $query=mysqli_query($connection_mag,"select * from mag_versions where active=1 or deleted=0");
                                echo mysqli_num_rows($query);
                                ?></h3>

                            <p>نسخه نشریه</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-copy"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6" style="display: inline-block;max-width: 24.5%">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php
                                $query=mysqli_query($connection_mag,"select * from mag_articles");
                                echo mysqli_num_rows($query);
                                ?></h3>

                            <p>مقاله ثبت شده</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-paper"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6" style="display: inline-block;max-width: 24.5%">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php
                                $AllEjmaliRates=mysqli_query($connection_maghalat,"select * from ejmali");
                                $AllTafsiliRates=mysqli_query($connection_maghalat,"select * from tafsili");
                                echo mysqli_num_rows($AllEjmaliRates)+mysqli_num_rows($AllTafsiliRates);
                                ?></h3>

                            <p>ارزیابی انجام شده</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
        <!-- /.card-body -->
    </div>

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">آخرین بازدیدهای شما</h3>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-6" style="display: inline-block;max-width: 24.5%">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php
                                $query=mysqli_query($connection_mag,"select * from mag_info where active=1 or deleted=0");
                                echo mysqli_num_rows($query);
                                ?></h3>

                            <p>نشریه</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-book"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->