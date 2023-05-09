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

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">وضعیت ارزیابی جشنواره فعلی :
                <?php
                $query=mysqli_query($connection_maghalat,"Select * from festival where active=1");
                foreach ($query as $LastFestival){}
                echo 'دوره '.$LastFestival['name'];
                $LastFestivalID=$LastFestival['id'];
                ?>
            </h3>
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
                                $AllArticles=mysqli_query($connection_maghalat,"Select * from article where festival_id='$LastFestivalID'");
                                echo mysqli_num_rows($AllArticles);
                                ?></h3>

                            <p>مقاله</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-folder"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6" style="display: inline-block;max-width: 24.5%">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php
                                $AllArticles=mysqli_query($connection_maghalat,"Select * from article where festival_id='$LastFestivalID' and rate_status='اجمالی'");
                                echo mysqli_num_rows($AllArticles);
                                ?></h3>

                            <p>اثر در حال ارزیابی اجمالی</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-sync"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6" style="display: inline-block;max-width: 24.5%">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php
                                $AllArticles=mysqli_query($connection_maghalat,"Select * from article where festival_id='$LastFestivalID' and rate_status='تفصیلی'");
                                echo mysqli_num_rows($AllArticles);
                                ?></h3>

                            <p>اثر در حال ارزیابی تفصیلی</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-sync"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6" style="display: inline-block;max-width: 24.5%">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php
                                $AllArticles=mysqli_query($connection_maghalat,"Select * from article where festival_id='$LastFestivalID' and chosen_status=1");
                                echo mysqli_num_rows($AllArticles);
                                ?></h3>

                            <p>برگزیده</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-checkbox"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <div class="col-lg-3 col-6" style="display: inline-block;max-width: 24.5%">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php
                                $RejectedEjmali=mysqli_query($connection_maghalat,"Select * from article where festival_id='$LastFestivalID' and rate_status='اجمالی ردی'");
                                echo mysqli_num_rows($RejectedEjmali);
                                ?></h3>

                            <p>اجمالی ردی</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-close"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6" style="display: inline-block;max-width: 24.5%">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php
                                $AcceptedEjmali=mysqli_query($connection_maghalat,"Select * from article where festival_id='$LastFestivalID' and rate_status='تفصیلی'");
                                echo mysqli_num_rows($AcceptedEjmali);
                                ?></h3>

                            <p>اجمالی قبول</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-checkbox"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6" style="display: inline-block;max-width: 24.5%">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php
                                $RejectedTafsili=mysqli_query($connection_maghalat,"Select * from article where festival_id='$LastFestivalID' and rate_status='تفصیلی ردی'");
                                echo mysqli_num_rows($RejectedTafsili);
                                ?></h3>

                            <p>تفصیلی ردی</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-close"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6" style="display: inline-block;max-width: 24.5%">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php
                                $InProgress=mysqli_query($connection_maghalat,"Select * from article where festival_id='$LastFestivalID' and rate_status='منتظر تایید'");
                                echo mysqli_num_rows($InProgress);
                                ?></h3>

                            <p>منتظر تایید شورای علمی</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-sync"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
        <!-- /.card-body -->
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">وضعیت کاربران</h3>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-6" style="display: inline-block;max-width: 24.5%">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                <?php
                                $query=mysqli_query($connection_maghalat,"select * from users");
                                echo mysqli_num_rows($query);
                                ?>
                            </h3>

                            <p>کاربر</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-people"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6" style="display: inline-block;max-width: 24.5%">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php
                                $query=mysqli_query($connection_maghalat,"select * from users where type=1");
                                echo mysqli_num_rows($query);
                                ?></h3>

                            <p>ارزیاب</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6" style="display: inline-block;max-width: 24.5%">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php
                                $query=mysqli_query($connection_maghalat,"select * from users where type=3");
                                echo mysqli_num_rows($query);
                                ?></h3>

                            <p>کارشناس سامانه</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-stalker"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6" style="display: inline-block;max-width: 24.5%">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php
                                $query=mysqli_query($connection_maghalat,"select * from users where type=4");
                                echo mysqli_num_rows($query);
                                ?></h3>

                            <p>مدیر کل</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-person-outline"></i>
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