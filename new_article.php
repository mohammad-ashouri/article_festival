<?php include_once __DIR__.'/header.php';
if ($_SESSION['head']==4 or $_SESSION['head']==3 or $_SESSION['head']==5):
?>
<!-- Main content -->
<section class="content">

<form>
    <div class="card card-success">

        <div class="card-header">
            <h3 class="card-title">ثبت اثر جدید</h3>
        </div>
        <div style="width: 100%; height: 20px; border-bottom: 2px solid #F3F5F6; text-align: center">
          <span style="font-size: 25px; background-color: #F3F5F6; padding: 0 10px;">
            اطلاعات اثر <!--Padding is optional-->
          </span>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <label>نام کامل مقاله</label>
            <input type="text" class="form-control" placeholder="" name="name">
        </div>
        <center>
        <div class="card-body">
            <table style="width: 100%">
                <tr>
                    <td style="padding: 10px">
                        <label>نوع تحقیق</label>
                        <select class="form-control" id="research_type" name="research_type">
                            <option>تک رشته ای</option>
                            <option>میان رشته ای</option>
                        </select>
                    </td>
                    <td style="padding: 10px">
                        <label>گروه علمی 1</label>
                        <select class="form-control" id="scientific_group1" name="scientific_group1">
                            <option selected disabled>انتخاب کنید</option>
                            <?php
                            $query=mysqli_query($connection_maghalat, "Select * from scientific_group");
                            foreach ($query as $groups):
                            ?>
                            <option value="<?php echo $groups['id'] ?>"><?php echo $groups['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td style="padding: 10px">
                        <label>گروه علمی 2</label>
                        <select class="form-control" id="scientific_group2" name="scientific_group2">
                            <option selected disabled>انتخاب کنید</option>
                            <?php
                            $query=mysqli_query($connection_maghalat, "Select * from scientific_group");
                            foreach ($query as $groups):
                                ?>
                                <option value="<?php echo $groups['id'] ?>"><?php echo $groups['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
            </table>
            <br/>
            <table style="width: 80%">
                <tr>
                    <td style="padding: 10px">
                        <label>شمارگان صفحه</label>
                        <input type="number" class="form-control" placeholder="" name="number_of_pages">
                    </td>
                    <td style="padding: 10px">
                        <label>تعداد کلمات</label>
                        <input type="number" class="form-control" placeholder="" name="number_of_words">
                    </td>
                    <td style="padding: 10px">
                        <label>نوع مقاله</label>
                        <select class="form-control" id="article_type" name="article_type" >
                            <option>پژوهشی</option>
                            <option>ترویجی</option>
                        </select>
                    </td>
                    <td style="padding: 10px">
                        <label>زبان اثر</label>
                        <input type="text" class="form-control" value="فارسی" name="language">
                    </td>
                </tr>
            </table>
            <br/>
            <table style="width: 100%">
                <tr>
                    <td>
                        <label>ویژگی های اثر</label>
                        <input type="text" class="form-control" value="" name="properties">
                    </td>
                </tr>
            </table>
        </div>
        <div style="width: 100%; height: 20px; border-bottom: 2px solid #F3F5F6; text-align: center">
          <span style="font-size: 25px; background-color: #F3F5F6; padding: 0 10px;">
            اطلاعات نشریه <!--Padding is optional-->
          </span>
        </div>
        <div class="card-body">
            <table>
                <tr>
                    <td style="padding: 10px">
                        <label>نام نشریه</label>
                        <select class="form-control" id="mag_id" name="mag_id">
                        </select>
                    </td>
                    <td style="padding: 10px">
                        <label>شماره صفحه مقاله در نشریه (از)</label>
                        <input type="number" class="form-control" placeholder="" name="number_of_page_in_mag_from">
                    </td>
                    <td style="padding: 10px">
                        <label>شماره صفحه مقاله در نشریه (تا)</label>
                        <input type="number" class="form-control" placeholder="" name="number_of_page_in_mag_to">
                    </td>
                </tr>
            </table>
        </div>
        <!-- /.card-body -->
        <div style="width: 100%; height: 20px; border-bottom: 2px solid #F3F5F6; text-align: center">
          <span style="font-size: 25px; background-color: #F3F5F6; padding: 0 10px;">
            همکاری در نگارش اثر <!--Padding is optional-->
          </span>
        </div>
    </center>
        <div class="card-body">
            <table>
                <tr>
                    <td style="padding: 10px">
                        <label>نوع همکاری</label>
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label for="cooperation_type1">فردی</label>
                        <input checked type="radio" id="cooperation_type1" name="cooperation_type">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label for="cooperation_type2">مشترک</label>
                        <input type="radio" id="cooperation_type2" name="cooperation_type">
                    </td>
                </tr>
            </table>
            <br>
            <table class="cooperation_table">
                <tr style="text-align: center">
                    <th>ردیف</th>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>کد ملی/شماره گذرنامه</th>
                    <th>شماره پرونده حوزوی</th>
                    <th>درصد همکاری</th>
                    <th>تلفن همراه</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>
                        <input name="fname1" type="text" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="lname1" type="text" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="national_code1" type="number" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="HFN1" type="number" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="CP1" type="number" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="mobile1" type="tel" class="form-control" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>
                        <input name="fname2" type="text" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="lname2" type="text" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="national_code2" type="number" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="HFN2" type="number" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="CP2" type="number" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="mobile2" type="tel" class="form-control" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>
                        <input name="fname3" type="text" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="lname3" type="text" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="national_code3" type="number" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="HFN3" type="number" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="CP3" type="number" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="mobile3" type="tel" class="form-control" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>
                        <input name="fname4" type="text" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="lname4" type="text" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="national_code4" type="number" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="HFN4" type="number" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="CP4" type="number" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="mobile4" type="tel" class="form-control" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>
                        <input name="fname5" type="text" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="lname5" type="text" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="national_code5" type="number" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="HFN5" type="number" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="CP5" type="number" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="mobile5" type="tel" class="form-control" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>
                        <input name="fname6" type="text" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="lname6" type="text" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="national_code6" type="number" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="HFN6" type="number" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="CP6" type="number" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="mobile6" type="tel" class="form-control" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>
                        <input name="fname7" type="text" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="lname7" type="text" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="national_code7" type="number" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="HFN7" type="number" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="CP7" type="number" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="mobile7" type="tel" class="form-control" placeholder="">
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>
                        <input name="fname8" type="text" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="lname8" type="text" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="national_code8" type="number" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="HFN8" type="number" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="CP8" type="number" class="form-control" placeholder="">
                    </td>
                    <td>
                        <input name="mobile8" type="tel" class="form-control" placeholder="">
                    </td>
                </tr>
            </table>
            <br>
            <div style="width: 100%; height: 20px; border-bottom: 2px solid #F3F5F6; text-align: center">
          <span style="font-size: 25px; background-color: #F3F5F6; padding: 0 10px;">
            بارگذاری فایل <!--Padding is optional-->
          </span>
            </div>
            <div class="card-body">
                <center>
                            <div class="input-group mb-3">
                                <label>PDF</label>
                                <input style="width: 300px" type="file" class="form-control" accept="application/pdf">
                            </div>

                            <div class="input-group mb-3">
                                <label>WORD</label>
                                <input style="width: 300px" type="file" class="form-control" accept="application/msword">
                            </div>
                </center>
            </div>
            <center>
                <button type="submit" class="btn btn-block btn-outline-info btn-lg">بارگذاری اثر</button>
            </center>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
</form>

<?php
endif;
include_once __DIR__.'/footer.php'; ?>
