<?php include_once __DIR__ . '/header.php';
if ($_SESSION['head']==4):

if (isset($_GET['UserFounded'])):
    ?>
    <div class="card card-danger">
        <div class="card-header">
            <center>
                <h3 class="card-title">کاربر وارد شده در سیستم یافت شد (کاربر تکراری)</h3>
            </center>
        </div>
        <!-- /.card-header -->
    </div>
<?php
elseif (isset($_GET['UserAdded'])):
    ?>
    <div class="card card-success">
        <div class="card-header">
            <center>
                <h3 class="card-title">کاربر جدید '<?php echo $_GET['user'] ?>' با موفقیت اضافه شد</h3>
            </center>
        </div>
        <!-- /.card-header -->
    </div>
<?php endif; ?>

<!-- Main content -->
<section class="content">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">ثبت کاربر جدید</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="build/php/inc/Add_User.php">
            <div class="card-body">
                <center>
                    <table style="width: 80%" class="table table-bordered">
                        <tr>
                            <th>نام کاربری (کد ملی)*</th>
                            <td>
                                <input type="text" class="form-control" id="username"
                                       placeholder="نام کاربری (کد ملی) را وارد کنید" name="username">
                            </td>
                        </tr>
                        <tr>
                            <th>رمز عبور*</th>
                            <td>
                                <input type="password" class="form-control" id="password"
                                       placeholder="رمز عبور را وارد کنید" name="password">
                            </td>
                        </tr>
                        <tr>
                            <th>نام*</th>
                            <td>
                                <input type="text" class="form-control" id="name" placeholder="نام را وارد کنید"
                                       name="name">
                            </td>
                        </tr>
                        <tr>
                            <th>نام خانوادگی*</th>
                            <td>
                                <input type="text" class="form-control" id="family"
                                       placeholder="نام خانوادگی را وارد کنید" name="family">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                گروه علمی*
                            </th>
                            <td>
                                <select class="form-control select2" multiple="multiple"
                                        data-placeholder="گروه (های) علمی را انتخاب کنید"
                                        style="width: 100%;text-align: right" name="scientific_group[]"
                                        id="scientific_group">
                                    <?php
                                    $query = mysqli_query($connection_maghalat, 'select * from scientific_group order by name asc');
                                    foreach ($query as $group_items):
                                        ?>
                                        <option value="<?php echo $group_items['id']; ?>"><?php echo $group_items['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                محل خدمت
                            </th>
                            <td>
                                <select class="form-control select2"
                                        data-placeholder="محل خدمت را انتخاب کنید"
                                        style="width: 100%;text-align: right" name="service_location"
                                        id="service_location">
                                    <option disabled selected>انتخاب کنید</option>
                                    <?php
                                    $query = mysqli_query($connection_variables, 'select * from service_location order by subject asc');
                                    foreach ($query as $service_location_items):
                                        ?>
                                        <option value="<?php echo $service_location_items['id'] ?>"><?php echo $service_location_items['subject']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>تلفن همراه*</th>
                            <td>
                                <input type="text" class="form-control" id="mobile"
                                       placeholder="تلفن همراه را وارد کنید" name="mobile">
                            </td>
                        </tr>
                        <tr>
                            <th>جنسیت*</th>
                            <td>
                                <select class="form-control" id="gender" name="gender">
                                    <option selected disabled>انتخاب کنید</option>
                                    <option>مرد</option>
                                    <option>زن</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>آدرس</th>
                            <td>
                                <textarea class="form-control" rows="3" placeholder="آدرس را وارد نمایید" id="address"
                                          name="address"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>نام بانک</th>
                            <td>
                                <select class="form-control select2" data-placeholder=""
                                        style="width: 100%;text-align: right" name="bank_name" id="bank_name">
                                    <option disabled selected>انتخاب کنید</option>
                                    <?php
                                    $query = mysqli_query($connection_maghalat, 'select * from bank_list order by name asc');
                                    foreach ($query as $bank_items):
                                        ?>
                                        <option value="<?php echo $bank_items['name'] ?>"><?php echo $bank_items['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>شماره حساب</th>
                            <td>
                                <input type="text" class="form-control" id="bank_id"
                                       placeholder="شماره حساب را وارد کنید" name="bank_id">
                            </td>
                        </tr>
                        <tr>
                            <th>شماره کارت بانکی 16 رقمی</th>
                            <td>
                                <input type="text" class="form-control" id="debit_card_id"
                                       placeholder="شماره کارت بانکی 16 رقمی را وارد کنید" name="debit_card_id">
                            </td>
                        </tr>
                        <tr>
                            <th>شماره شبا 24 رقمی</th>
                            <td>
                                <input type="text" class="form-control" id="shaba"
                                       placeholder="شماره شبا 24 رقمی را وارد کنید" name="shaba">
                            </td>
                        </tr>
                        <tr>
                            <th>نوع کاربری*</th>
                            <td>
                                <select class="form-control select2" data-placeholder=""
                                        style="width: 100%;text-align: right" name="type" id="type">
                                    <option value="1">ارزیاب</option>
                                    <option value="2">سرگروه</option>
                                    <option value="3">کارشناس</option>
                                    <option value="4">مدیر</option>
                                    <option value="5">کارشناس نشریه</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </center>

            </div>
            <!-- /.card-body -->
            <center>
                <div class="card-footer">
                    <button name="Add_User" type="submit" class="btn btn-primary">ثبت کاربر جدید</button>
                </div>
            </center>

        </form>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">نمایش و مدیریت کاربران (به ترتیب نام خانوادگی)</h3>
                    <br>
                    <div class="card-tools-user-manager">
                        <!--                        <div class="input-group input-group-sm" style="width: 150px;">-->
                        <input type="search" name="table_search" class="form-control float-right"
                               placeholder="لطفا برای جستجو، نام و نام خانوادگی مورد نظر را تایپ نمایید"
                               onkeyup="myFunction()" id="myInput">
                        <!--                        </div>-->
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered table-striped" id="myTable">
                        <tr>
                            <th>ردیف</th>
                            <th>کاربر</th>
                            <th>مشخصات</th>
                            <th>گروه علمی</th>
                            <th>محل خدمت</th>
                            <th>شماره همراه</th>
                            <th>بانک</th>
                            <th>حساب</th>
                            <th>شماره کارت</th>
                            <th>شماره شبا</th>
                            <th>عملیات</th>
                        </tr>
                        <?php
                        $a = 1;
                        $SelectAllUsers = mysqli_query($connection_maghalat, "select * from users order by family asc");
                        foreach ($SelectAllUsers as $users):
                            ?>
                            <tr>
                                <td><?php echo $a;
                                    $a++; ?></td>
                                <td><?php echo $users['username']; ?></td>
                                <td><?php echo $users['name'] . ' ' . $users['family'] ?></td>
                                <td><?php
                                    $groups = explode('||', $users['scientific_group']);
                                    foreach ($groups as $itemgroups) {
                                        $id=$itemgroups;
                                        $query=mysqli_query($connection_maghalat,"Select * from scientific_group where id='$id'");
                                        foreach ($query as $scientific_group){
                                            echo '<label style="width: 180px">' . ' - ' . $scientific_group['name'] . '</label>' . '<br>';
                                        }
                                    }
                                    ?></td>
                                <td><?php
                                    $service_location=$users['service_location'];
                                    if ($service_location!=NULL){
                                        $query=mysqli_query($connection_variables,"Select * from service_location where id='$service_location'");
                                        foreach ($query as $Service_Location_Items){}
                                        echo @$Service_Location_Items['subject'];
                                    }

                                    ?></td>
                                <td><?php echo $users['phone'] ?></td>
                                <td><?php echo $users['bank_name'] ?></td>
                                <td><?php echo $users['bank_id'] ?></td>
                                <td><?php echo $users['debit_card_id'] ?></td>
                                <td><?php echo $users['shaba'] ?></td>
                                <td></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
</div>

<!-- /.content-wrapper -->

<script src="build/js/SearchInUserManagerTable.js"></script>

<?php
endif;
include_once __DIR__ . '/footer.php'; ?>
