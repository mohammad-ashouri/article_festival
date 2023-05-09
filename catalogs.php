<?php include_once __DIR__ . '/header.php';
if ($_SESSION['head']==3 or $_SESSION['head']==4):

?>
<!-- Main content -->
<section class="content">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">کاتالوگ ها</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <tr style="text-align: center">
                    <th style="width: 10px">ردیف</th>
                    <th>نام کاتالوگ</th>
                    <th>مقادیر تعریف شده کاتالوگ</th>
                    <th>عملیات</th>
                </tr>
                <tr style="text-align: center">
                    <td>1.</td>
                    <td style=";vertical-align: middle">عناوین بخش ویژه</td>
                    <td>
                        <select multiple class="form-control" style="width: 100%;height: 350px">
                            <?php
                            $query = mysqli_query($connection_maghalat, "select * from special_type order by subject asc");
                            foreach ($query as $specials):
                                ?>
                                <option <?php if ($specials['active']==0) echo "disabled style='background-color: #ffc107'" ?>>
                                    <?php echo $specials['subject']; if ($specials['active']==0) echo ' (غیرفعال)' ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <form action="build/php/inc/Add_Special_Type.php" method="post" id="Special_Type_Form">
                            <input name="Special_Type" type="text" class="form-control" id="Special_Type"
                                   placeholder="لطفا قبل از ورود اطلاعات، چک نمایید که قبلا وارد نشده باشد">
                            <br/>
                            <center>
                                <button type="submit" class="btn btn-primary"
                                        onclick="return confirm ('آیا از مقدار وارد شده مطمئن هستید؟ پس از ثبت، فقط میتوانید مقدار مورد نظر را غیرفعال نمایید')">
                                    ثبت بخش ویژه
                                </button>
                            </center>
                        </form>
                        <br/>
                        <form action="build/php/inc/Disable_Special_Type.php" method="post" id="Disable_Special_Type_Form">
                            <select name="Special_Type" class="form-control select2" style="width: 100%;" id="Disable_Special_Type">
                                <option disabled selected>انتخاب کنید</option>
                                <?php
                                $query = mysqli_query($connection_maghalat, "select * from special_type where active=1 order by subject asc");
                                foreach ($query as $specials):
                                    ?>
                                    <option>
                                        <?php echo $specials['subject'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <br/><br/>
                            <center>
                                <button type="submit" class="btn btn-danger">غیرفعالسازی بخش ویژه</button>
                            </center>
                        </form>
                        <br/>
                        <form action="build/php/inc/Enable_Special_Type.php" method="post" id="Enable_Special_Type_Form">
                            <select name="Special_Type" class="form-control select2" style="width: 100%;" id="Enable_Special_Type">
                                <option disabled selected>انتخاب کنید</option>
                                <?php
                                $query = mysqli_query($connection_maghalat, "select * from special_type where active=0 order by subject asc");
                                foreach ($query as $specials):
                                    ?>
                                    <option>
                                        <?php echo $specials['subject'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <br/><br/>
                            <center>
                                <button type="submit" class="btn btn-success">فعالسازی بخش ویژه</button>
                            </center>
                        </form>
                    </td>
                </tr>
                <tr style="text-align: center">
                    <td>2.</td>
                    <td style=";vertical-align: middle">محل خدمت</td>
                    <td>
                        <select multiple class="form-control" style="width: 100%;height: 350px">
                            <?php
                            $query = mysqli_query($connection_variables, "select * from service_location order by subject asc");
                            foreach ($query as $service_locations):
                                ?>
                                <option <?php if ($service_locations['active']==0) echo "disabled style='background-color: #ffc107'" ?>>
                                    <?php echo $service_locations['subject']; if ($service_locations['active']==0) echo ' (غیرفعال)' ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <form action="build/php/inc/Add_Service_Location.php" method="post" id="Service_Location_Form">
                            <input name="Service_Location" type="text" class="form-control" id="Service_Location"
                                   placeholder="لطفا قبل از ورود اطلاعات، چک نمایید که قبلا وارد نشده باشد">
                            <br/>
                            <center>
                                <button type="submit" class="btn btn-primary"
                                        onclick="return confirm ('آیا از مقدار وارد شده مطمئن هستید؟ پس از ثبت، فقط میتوانید مقدار مورد نظر را غیرفعال نمایید')">
                                    ثبت محل خدمت
                                </button>
                            </center>
                        </form>
                        <br/>
                        <form action="build/php/inc/Disable_Service_Location.php" method="post" id="Disable_Service_Location_Form">
                            <select name="Service_Location" class="form-control select2" style="width: 100%;" id="Disable_Service_Location">
                                <option disabled selected>انتخاب کنید</option>
                                <?php
                                $query = mysqli_query($connection_variables, "select * from service_location where active=1 order by subject asc");
                                foreach ($query as $service_locations):
                                    ?>
                                    <option>
                                        <?php echo $service_locations['subject'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <br/><br/>
                            <center>
                                <button type="submit" class="btn btn-danger">غیرفعالسازی محل خدمت</button>
                            </center>
                        </form>
                        <br/>
                        <form action="build/php/inc/Enable_Service_Location.php" method="post" id="Enable_Service_Location_Form">
                            <select name="Service_Location" class="form-control select2" style="width: 100%;" id="Enable_Service_Location">
                                <option disabled selected>انتخاب کنید</option>
                                <?php
                                $query = mysqli_query($connection_variables, "select * from service_location where active=0 order by subject asc");
                                foreach ($query as $service_locations):
                                    ?>
                                    <option>
                                        <?php echo $service_locations['subject'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <br/><br/>
                            <center>
                                <button type="submit" class="btn btn-success">فعالسازی محل خدمت</button>
                            </center>
                        </form>
                    </td>
                </tr>
                <tr style="text-align: center">
                    <td>3.</td>
                    <td style=";vertical-align: middle">شورای علمی</td>
                    <td>
                            <?php
                            $a=1;
                            $query = mysqli_query($connection_variables, "select * from mag_festival_scientific_committee order by family asc");
                            foreach ($query as $mag_festival_scientific_committee):
                                ?>
                                    <?php
                                    $subject_id= $mag_festival_scientific_committee['subject'];
                                    $position_id= $mag_festival_scientific_committee['position'];
                                    $query=mysqli_query($connection_variables,"select * from  person_subjects where id='$subject_id'");
                                    foreach ($query as $Subject_Items){}
                                    $query=mysqli_query($connection_variables,"select * from   mag_festival_position where id='$position_id'");
                                    foreach ($query as $Position_Items){}
                                    echo $Subject_Items['subject'].' '.$mag_festival_scientific_committee['name'].' '.$mag_festival_scientific_committee['family'].'<br/>'.$Position_Items['subject'].'<br>'.' با کد کاربری '.$mag_festival_scientific_committee['id'];
                                    if ($mag_festival_scientific_committee['active']==0) {
                                        echo ' (غیرفعال)' . '<hr>';}
                                    else{
                                        echo '<hr>';
                                    }?>
                            <?php endforeach; ?>
                    </td>
                    <td>
                        <form action="build/php/inc/Add_Scientific_Committee.php" method="post" id="Scientific_Committee_Form">
                            <select name="Scientific_Committee_Subject" class="form-control select2" id="Scientific_Committee_Subject" style="width: 100%;">
                                <option disabled selected>عنوان را انتخاب کنید</option>
                                <?php
                                $query = mysqli_query($connection_variables, "select * from  person_subjects order by subject asc");
                                foreach ($query as $person_subjects):
                                    ?>
                                    <option value="<?php echo $person_subjects['id']; ?>">
                                        <?php echo $person_subjects['subject']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <br/><br/>
                            <input name="Scientific_Committee_Name" type="text" class="form-control" id="Scientific_Committee_Name" style="width: 50%;display: inline-block"
                                   placeholder="نام">
                            <input name="Scientific_Committee_Family" type="text" class="form-control" id="Scientific_Committee_Family" style="width: 49%;display: inline-block"
                                   placeholder="نام خانوادگی">
                            <br/><br/>
                            <input name="Scientific_Committee_National_Code" type="text" class="form-control" id="Scientific_Committee_National_Code" style="width: 49%;display: inline-block"
                                   placeholder="کد ملی">
                            <select name="Scientific_Committee_Position" id="Scientific_Committee_Position" class="form-control select2" style="width: 50%;display: inline-block">
                                <option disabled selected>سمت را انتخاب کنید</option>
                                <?php
                                $query = mysqli_query($connection_variables, "select * from mag_festival_position order by subject asc");
                                foreach ($query as $mag_festival_position):
                                    ?>
                                    <option value="<?php echo $mag_festival_position['id']; ?>">
                                        <?php echo $mag_festival_position['subject']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <br/><br/>
                            <center>
                                <button type="submit" class="btn btn-primary" onclick="return confirm('آیا از صحت اطلاعات وارد شده مطمئن هستید؟ پس از ورود قابل حذف نیست')">
                                    ثبت شورای علمی
                                </button>
                            </center>
                        </form>
                        <br/>
                        <form action="build/php/inc/Disable_Scientific_Committee.php" method="post" id="Disable_Scientific_Committee_Form">
                            <select name="Scientific_Committee" id="Disable_Scientific_Committee" class="form-control select2" style="width: 100%;">
                                <option disabled selected>کاربر را انتخاب کنید</option>
                                <?php
                                $query = mysqli_query($connection_variables, "select * from mag_festival_scientific_committee where active=1 order by family asc");
                                foreach ($query as $mag_festival_scientific_committee):
                                    ?>
                                    <option value="<?php echo $mag_festival_scientific_committee['id']; ?>">
                                        <?php echo $mag_festival_scientific_committee['name'].' '.$mag_festival_scientific_committee['family']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <br/><br/>
                            <center>
                                <button type="submit" class="btn btn-danger">غیرفعالسازی شورای علمی</button>
                            </center>
                        </form>
                        <br/>
                        <form action="build/php/inc/Enable_Scientific_Committee.php" method="post" id="Enable_Scientific_Committee_Form">
                            <select name="Scientific_Committee" id="Enable_Scientific_Committee" class="form-control select2" style="width: 100%;">
                                <option disabled selected>کاربر را انتخاب کنید</option>
                                <?php
                                $query = mysqli_query($connection_variables, "select * from mag_festival_scientific_committee where active=0 order by family asc");
                                foreach ($query as $mag_festival_scientific_committee):
                                    ?>
                                    <option value="<?php echo $mag_festival_scientific_committee['id']; ?>">
                                        <?php echo $mag_festival_scientific_committee['name'].' '.$mag_festival_scientific_committee['family']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <br/><br/>
                            <center>
                                <button type="submit" class="btn btn-success">فعالسازی شورای علمی</button>
                            </center>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
</div>

<!-- /.content-wrapper -->
<script src="build/js/Catalogs.js"></script>
<?php
endif;
include_once __DIR__ . '/footer.php'; ?>
