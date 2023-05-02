<?php
$Me = $_SESSION['id'];
$id = $_POST['id'];
$query = mysqli_query($connection_maghalat, "select * from article where id='$id'");
foreach ($query as $item) {

}
$art_id = $item['article_id'];
$query = mysqli_query($connection_mag, "select * from mag_articles where id='$art_id'");
foreach ($query as $art_info) {
}
?>
<!-- Main content -->
<form method="post" action="build/php/inc/Ejmali_Rate_Inc.php" onsubmit="return CheckEjmaliForm()">
    <section class="content">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">ثبت ارزیابی اجمالی</h3>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-striped" id="myTable">
                    <tbody>
                    <tr>
                        <th>جشنواره</th>
                        <th>نام اثر</th>
                        <th>نوع اثر</th>
                        <th>گروه علمی</th>
                        <th>زبان</th>
                        <th>فایل مقاله</th>
                    </tr>
                    <tr>
                        <td>
                            <?php
                            $festival_id = $art_info['festival_id'];
                            $query = mysqli_query($connection_maghalat, "select * from festival where id='$festival_id'");
                            foreach ($query as $festival_info) {
                            }
                            echo $festival_info['name'];
                            ?>
                        </td>
                        <td>
                            <?php echo $art_info['subject']; ?>
                        </td>
                        <td>
                            <?php echo $art_info['type'] ?>
                        </td>
                        <td>
                            <?php
                            if (($item['ejmali1_ratercode_g1'] == $Me and $item['ejmali1_g1_done'] == 0) or ($item['ejmali2_ratercode_g1'] == $Me and $item['ejmali2_g1_done'] == 0) or ($item['ejmali3_ratercode_g1'] == $Me and $item['ejmali3_g1_done'] == 0)) {
                                $groupID = $art_info['scientific_group_1'];
                                $query = mysqli_query($connection_maghalat, "Select * from scientific_group where id='$groupID'");
                                foreach ($query as $groupInfo) {
                                }
                                echo $groupInfo['name'];
                            } elseif (($item['ejmali1_ratercode_g2'] == $Me and $item['ejmali1_g2_done'] == 0) or ($item['ejmali2_ratercode_g2'] == $Me and $item['ejmali2_g2_done'] == 0) or ($item['ejmali3_ratercode_g2'] == $Me and $item['ejmali3_g2_done'] == 0)) {
                                $groupID = $art_info['scientific_group_2'];
                                $query = mysqli_query($connection_maghalat, "Select * from scientific_group where id='$groupID'");
                                foreach ($query as $groupInfo) {
                                }
                                echo $groupInfo['name'];
                            }
                            ?>
                        </td>
                        <td>
                            <?php echo $art_info['language'] ?>
                        </td>
                        <td>
                            <a id='no-link' style="color: #0a53be" target="_blank" href="<?php
                            echo 'Files/Mag_Files/' . $art_info['file_url'];
                            ?>">
                                نمایش
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>چکیده</th>
                        <td colspan="5">
                            <textarea disabled
                                      style="width: 100%;height: 200px"><?php echo $art_info['body']; ?></textarea>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-body">
                <center>
                    <div style="background-color: #59981A;padding: 8px;border-radius: 5px 5px 0 0">
                        <label style="text-align: center;font-size: large;color:whitesmoke">فرم ارزیابی</label>
                    </div>
                </center>
                <table class="table table-bordered table-striped" id="myTable">
                    <tbody>
                    <tr>
                        <th style="width: 50px;">ردیف</th>
                        <th style="text-align: center">نام شاخص</th>
                        <th style="text-align: center">امتیاز</th>
                        <th style="width: 250px;text-align: center">راهنمای امتیازدهی</th>
                    </tr>
                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            اولویت و روزآمدی مسئله یا موضوع
                        </td>
                        <td style="width: 150px;">
                            <input type="number" class="form-control" name="r1" style="width: 100%"
                                   id="r1" onchange="sum()" value="0">
                        </td>
                        <td style="text-align: center;vertical-align: middle" rowspan="5">
                            <label>
                                عالی: 4
                                <br>
                                <br>
                                خوب: 3
                                <br>
                                <br>
                                متوسط: 2
                                <br>
                                <br>
                                ضعیف: 1
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            2
                        </td>
                        <td>
                            ارزش علمی و نو بودن محتوا
                        </td>
                        <td style="width: 150px;">
                            <input type="number" class="form-control" name="r2" style="width: 100%"
                                   id="r2" onchange="sum()" value="0">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            3
                        </td>
                        <td>
                            استفاده مناسب از منابع معتبر
                        </td>
                        <td style="width: 150px;">
                            <input type="number" class="form-control" name="r3" style="width: 100%"
                                   id="r3" onchange="sum()" value="0">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            4
                        </td>
                        <td>
                            اثربخشی و میزان تاثیر گذاری در حل مشکلات علمی و کاربردی
                        </td>
                        <td style="width: 150px;">
                            <input type="number" class="form-control" name="r4" style="width: 100%"
                                   id="r4" onchange="sum()" value="0">
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2" style="text-align: left">جمع امتیاز</th>
                        <td style="text-align: center"><label id="sum">0</label></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <center>
                <input type="hidden" value="<?php
                echo $_POST['id'];
                ?>"
                       name="article_id"
                >
                <button type="submit" class="btn btn-block btn-success" style="width:20%" name="subject"
                        onclick="return confirm('آیا از امتیازات وارد شده اطمینان دارید؟');"
                        value="<?php echo $_POST['rate_status'] ?>">
                    ثبت ارزیابی
                </button>
            </center>
        </div>
    </section>
</form>
</div>
<script src="build/js/Rate_Ejmali_Incs.js"></script>


