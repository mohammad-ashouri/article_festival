<?php include_once __DIR__ . '/header.php';
if ($_SESSION['head'] == 4 or $_SESSION['head'] == 3):
    ?>
    <?php if (isset($_GET['FeeSet'])): ?>
    <div class="card card-success">
        <div class="card-header">
            <center>
                <h3 class="card-title">
                    تعرفه ارزیابی دوره
                    <?php
                    $query = mysqli_query($connection_maghalat, "select name from festival where id=$_GET[festival]");
                    $festivalInfo = mysqli_fetch_array($query);
                    echo $festivalInfo['name'];
                    ?>
                    با موفقیت ثبت شد.
                </h3>
            </center>
        </div>
    </div>
<?php elseif (isset($_GET['ErrorSetFee'])): ?>
    <div class="card card-danger">
        <div class="card-header">
            <center>
                <h3 class="card-title">
                    خطا در ثبت تعرفه!
                </h3>
            </center>
        </div>
    </div>
<?php endif; ?>
    <!-- Main content -->
    <section class="content">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">تعرفه های پرداختی به ارزیابان</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="post" id="Rater_Fee">
                    <label>دوره</label>
                    <select class="form-control select2"
                            data-placeholder="دوره را انتخاب کنید"
                            style="width: 20%;text-align: right" name="festival_id"
                            id="festival_id">
                        <option selected disabled>انتخاب کنید</option>
                        <?php
                        $query = mysqli_query($connection_maghalat, 'select distinct (festival_id) from article order by festival_id asc');
                        foreach ($query as $article_items):
                            $festival = $article_items['festival_id'];
                            $query = mysqli_query($connection_maghalat, "select * from festival where id='$festival'");
                            foreach ($query as $Festival_Info) {
                            }
                            ?>
                            <option <?php if ($Festival_Info['id'] == @$_POST['festival_id']) echo 'selected'; ?>
                                    value="<?php echo $Festival_Info['id']; ?>"><?php echo $Festival_Info['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button name="GetFees" type="submit" class="btn btn-primary">انتخاب دوره</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
    <?php
    if (isset($_POST['GetFees']) and @$_POST['festival_id']):
        $editor = null;
        $festival_id = $_POST['festival_id'];
        $query = mysqli_query($connection_maghalat, "select * from festival where id=$festival_id");
        $festivalItems = mysqli_fetch_array($query);
        $query = mysqli_query($connection_maghalat, "select * from fees where festival_id=$festival_id");
        $feeItems = mysqli_fetch_array($query);
        if (isset($feeItems)) {
            $query = mysqli_query($connection_maghalat, "select * from users where id=$feeItems[user_id]");
            $editor = mysqli_fetch_array($query);
        }
        ?>
        <section class="content">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">تعرفه پرداختی به ارزیابان در دوره ی
                        <?php echo $festivalItems['name']; ?>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form id="set-rater-fee" method="post" action="build/php/inc/Set_Rater_Fee.php">
                        <table class="table table-bordered table-striped display">
                            <thead>
                            <tr style="text-align: center">
                                <th>ارزیابی اجمالی</th>
                                <th>ارزیابی تفصیلی</th>
                                <th>ویرایشگر</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <input type="number" class="form-control"
                                           id="ejmali" value="<?php echo @$feeItems['ejmali']; ?>"
                                           placeholder="مبلغ اجمالی را به ریال وارد کنید"
                                           name="ejmali">
                                </td>
                                <td>
                                    <input type="number" class="form-control"
                                           id="tafsili" value="<?php echo @$feeItems['tafsili']; ?>"
                                           placeholder="مبلغ تفصیلی را به ریال وارد کنید"
                                           name="tafsili">
                                </td>
                                <td class="text-center">
                                    <p><?php echo @$editor['name'] . ' ' . @$editor['family']; ?></p>
                                </td>
                                <input type="hidden" name="festival_id" value="<?php echo $_POST['festival_id']; ?>">
                                <td class="text-center">
                                    <button name="setFee" type="submit" class="btn btn-success">ثبت تعرفه</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
    <?php
    endif;
    ?>
    <!-- /.content -->
    </div>
    <script src="build/js/RaterFee.js"></script>
    <!-- /.content-wrapper -->
<?php
endif;
include_once __DIR__ . '/footer.php'; ?>
