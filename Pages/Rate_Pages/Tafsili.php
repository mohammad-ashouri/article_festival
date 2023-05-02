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
<form method="post" action="build/php/inc/Tafsili_Rate_Inc.php" onsubmit="return CheckTafsiliForm(
    <?php
    $query = mysqli_query($connection_variables, "select * from mag_festival_tafsili_options where special_type=0");
    foreach ($query as $Tafsili_Form) {
        echo $Tafsili_Form['point_period_from'].','.$Tafsili_Form['point_period_to'].',';
    }
    ?>
)">
    <section class="content">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">ثبت ارزیابی تفصیلی</h3>
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
                            if ($item['tafsili1_ratercode'] == $Me or $item['tafsili2_ratercode'] == $Me or $item['tafsili3_ratercode'] == $Me) {
                                $groupID = $art_info['scientific_group_1'];
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
                        <th style="text-align: center;width: 10%">بازه امتیاز</th>
                        <th style="width: 15%;text-align: center">امتیاز</th>
                    </tr>
                    <?php
                    $query = mysqli_query($connection_variables, "select * from mag_festival_tafsili_options where special_type=0");
                    foreach ($query as $Tafsili_Form):
                        ?>
                        <tr>
                            <td>
                                <?php echo $Tafsili_Form['id']; ?>
                            </td>
                            <td>
                                <?php echo $Tafsili_Form['subject']; ?>
                            </td>
                            <td style="text-align: center;vertical-align: middle">
                                <label>
                                    از
                                    <?php echo $Tafsili_Form['point_period_from']; ?>
                                    تا
                                    <?php echo $Tafsili_Form['point_period_to']; ?>
                                </label>
                            </td>
                            <td style="width: 150px;">
                                <input class="form-control" name="r<?php echo $Tafsili_Form['id']; ?>"
                                       style="width: 100%"
                                       id="r<?php echo $Tafsili_Form['id']; ?>"
                                       onchange="sum(<?php echo $Tafsili_Form['point_period_from']; ?>,<?php echo $Tafsili_Form['point_period_to']; ?>)"
                                       value="0">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                توضیحات
                            </th>
                            <td colspan="3" style="width: 150px;">
                                <textarea title="چکیده" class="form-control" rows="3" placeholder="توضیحات خود را در مورد شاخص <?php echo $Tafsili_Form['subject']; ?> وارد کنید" id="description_<?php echo $Tafsili_Form['id']; ?>" name="description_<?php echo $Tafsili_Form['id']; ?>"></textarea>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                    <tr>
                        <th colspan="4" style="text-align: center">
                            امتیاز ویژه: امتیاز این شاخص جزء 100 امتیاز فرم نیست؛ ولی امتیازی که در این شاخص کسب می شود،
                            به جمع امتیازات افزوده خواهد شد.
                        </th>
                    </tr>
                    <?php
                    $query = mysqli_query($connection_variables, "select * from mag_festival_tafsili_options where special_type=1");
                    foreach ($query as $Tafsili_Form):
                        ?>
                        <tr>
                            <td>
                                <?php echo $Tafsili_Form['id']; ?>
                            </td>
                            <td>
                                <?php echo $Tafsili_Form['subject']; ?>
                            </td>
                            <td style="text-align: center;vertical-align: middle">
                                <label>
                                    از
                                    <?php echo $Tafsili_Form['point_period_from']; ?>
                                    تا
                                    <?php echo $Tafsili_Form['point_period_to']; ?>
                                </label>
                            </td>
                            <td style="width: 150px;">
                                <input type="number" class="form-control" name="r<?php echo $Tafsili_Form['id']; ?>"
                                       style="width: 100%"
                                       id="r<?php echo $Tafsili_Form['id']; ?>"
                                       onchange="sum(<?php echo $Tafsili_Form['point_period_from']; ?>,<?php echo $Tafsili_Form['point_period_to']; ?>)"
                                       value="0">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                توضیحات
                            </th>
                            <td colspan="3" style="width: 150px;">
                                <textarea title="چکیده" class="form-control" rows="3" placeholder="توضیحات خود را در مورد شاخص <?php echo $Tafsili_Form['subject']; ?> وارد کنید" id="description_<?php echo $Tafsili_Form['id']; ?>" name="description_<?php echo $Tafsili_Form['id']; ?>"></textarea>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                    <tr>
                        <th colspan="3" style="text-align: left">جمع امتیاز</th>
                        <td style="text-align: center"><label id="sum">0</label></td>
                    </tr>
                    <tr>
                        <th>
                            اظهار نظر کلی
                        </th>
                        <td colspan="3" style="width: 80%;">
                            <textarea title="چکیده" class="form-control" rows="3" placeholder="به نظر شما این مقاله شرایط لازم را برای معرفی «مقاله برتر علمی پژوهشی حوزه» دارد؟ (با توضیح)" id="general_comment" name="general_comment"></textarea>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <center>
                <input type="hidden" value="<?php
                echo $id = $_POST['id'];
                ?>"
                       name="article_id"
                >
                <button type="submit" class="btn btn-block btn-success" style="width:20%" name="subject"
                        value="<?php echo $_POST['rate_status'] ?>">
                    ثبت ارزیابی
                </button>
            </center>
        </div>
    </section>
</form>
</div>
<script src="build/js/Rate_Tafsili_Incs.js"></script>


