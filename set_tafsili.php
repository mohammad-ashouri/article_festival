<?php include_once __DIR__ . '/header.php';
if ($_SESSION['head']==4 or $_SESSION['head']==3):
?>
    <!-- Main content -->
    <section class="content">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">اختصاص اثر به ارزیاب تفصیلی</h3>
            </div>
            <style>
                #myTable td {
                    vertical-align: middle
                }

                #myTable th {
                    vertical-align: middle
                }
            </style>
            <!-- /.card-header -->
            <div class="card-body">
                <div style="margin-bottom: 20px; overflow-x: auto">
                    <label>گروه علمی اول</label>
                    <select
                            id="searchInput1" class="form-control select2"
                            style="width: 20%;display: inline-block;margin-bottom: 8px">
                        <option value=""  selected>بدون فیلتر</option>
                        <?php
                        $query = mysqli_query($connection_maghalat, "select * from scientific_group order by name asc");
                        foreach ($query as $Group) {
                            ?>
                            <option value="<?php echo $Group['name']?>"><?php echo $Group['name'];?></option>
                        <?php } ?>
                    </select>
                    <label>گروه علمی دوم</label>
                    <select
                            id="searchInput2" class="form-control select2"
                            style="width: 20%;display: inline-block;margin-bottom: 8px">
                        <option value=""  selected>بدون فیلتر</option>
                        <?php
                        $query = mysqli_query($connection_maghalat, "select * from scientific_group order by name asc");
                        foreach ($query as $Group) {
                            ?>
                            <option value="<?php echo $Group['name']?>"><?php echo $Group['name'];?></option>
                        <?php } ?>
                    </select>
                    <button class="btn btn-primary" onclick="searchTable()">فیلتر کردن</button>
                </div>
                <table class="table table-bordered table-striped" id="myTable">
                    <tbody>
                    <tr style="font-size: 15px;" class="text-center">
                        <th>ردیف</th>
                        <th style="width: 200px;">عنوان مقاله</th>
                        <th>نشریه</th>
                        <th>گروه علمی ۱</th>
                        <th>گروه علمی ۲</th>
                        <th>زبان</th>
                        <th>بخش ویژه</th>
                        <th>نویسنده</th>
                        <th>نوع همکاری</th>
                        <th>همکاران</th>
                        <th>اختصاص به ارزیاب</th>
                    </tr>
                    <?php
                    $a = 1;
                    $query = mysqli_query($connection_maghalat, "select * from ssmp_jashnvarehmaghalat.article c inner join ssmp_magbase.mag_articles m on c.article_id = m.id where m.selected_for_jm=1 and (c.rate_status='تفصیلی' or c.rate_status='تفصیلی سوم') and (c.avg_ejmali_g1>=34 or c.avg_ejmali_g2>=34) order by m.id asc");
                    foreach ($query as $Tafsili_list):
                        ?>
                        <tr>
                            <td class="text-center">
                                <?php echo $a;
                                $a++; ?>
                            </td>
                            <td>
                                <a href="Files/Mag_Files/<?php echo $Tafsili_list['file_url'] ?>" target="_blank"
                                   id='no-link' style="color: #0a53be">
                                    <?php
                                    echo $Tafsili_list['subject'];
                                    ?>
                                </a>
                            </td>
                            <td>
                                <?php
                                $magVersion = $Tafsili_list['mag_version_id'];
                                $query = mysqli_query($connection_mag, "select * from mag_versions where id='$magVersion'");
                                foreach ($query as $versionInfo) {
                                }
                                $magInfoID=$versionInfo['mag_info_id'];
                                $query = mysqli_query($connection_mag, "select * from mag_info where id='$magInfoID'");
                                foreach ($query as $magInfo) {
                                }
                                echo $magInfo['name'];
                                ?>
                            </td>
                            <td>
                                <?php
                                $Group1 = $Tafsili_list['scientific_group_1'];
                                $query = mysqli_query($connection_maghalat, "select * from scientific_group where id='$Group1'");
                                foreach ($query as $Group1) {
                                }
                                echo $Group1['name'];
                                $Group1['name'] = null;
                                ?>
                            </td>
                            <td>
                                <?php
                                $Group2 = $Tafsili_list['scientific_group_2'];
                                if ($Group2) {
                                    $query = mysqli_query($connection_maghalat, "select * from scientific_group where id='$Group2'");
                                    foreach ($query as $Group2) {
                                    }
                                    echo $Group2['name'];
                                    $Group2['name'] = null;
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $Tafsili_list['language'];
                                ?>
                            </td>
                            <td>
                                <?php
                                $special_type = $Tafsili_list['special_type'];
                                if ($special_type) {
                                    $query = mysqli_query($connection_maghalat, "select * from special_type where id='$special_type'");
                                    foreach ($query as $Special_Type_Detail) {
                                    }
                                    echo $Special_Type_Detail['subject'];
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $author = explode('|', $Tafsili_list['author']);
                                echo $author[0];
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $Tafsili_list['cooperation_type'];
                                ?>
                            </td>
                            <td>
                                <ul>
                                    <?php
                                    if (isset($Tafsili_list['cooperators'])) {
                                        $cooperators = explode('|', $Tafsili_list['cooperators']);
                                        for ($c = 0, $cMax = count($cooperators); $c < $cMax; $c += 2) {
                                            echo '<li style="margin-right: 5px">' . @$cooperators[$c] . '</li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </td>
                            <td>
                                <p style="font-size: 14px;margin-bottom: -12px">
                                    امتیاز اجمالی:
                                    <?php echo $Tafsili_list['avg_ejmali_g1'];
                                    if ($Tafsili_list['avg_ejmali_g2'] != null and $Tafsili_list['avg_ejmali_g2'] != ''):
                                        ?>
                                        <br/>
                                        امتیاز اجمالی دوم:
                                        <?php
                                        echo $Tafsili_list['avg_ejmali_g2'];
                                    endif;
                                    $article_id = $Tafsili_list['id'];
                                    $query = mysqli_query($connection_maghalat, "select * from article where article_id='$article_id'");
                                    foreach ($query as $Article_info) {
                                    }
                                    $Article_id = $Article_info['id'];
                                    $query = mysqli_query($connection_maghalat, "select * from tafsili where article_id='$Article_id' and type='ta1'");
                                    if (mysqli_num_rows($query) > 0) {
                                        foreach ($query as $ta1) {

                                        }
                                    }
                                    if (mysqli_num_rows($query) > 0) {
                                        $query = mysqli_query($connection_maghalat, "select * from tafsili where article_id='$Article_id' and type='ta2'");
                                        foreach ($query as $ta2) {

                                        }
                                    }
                                    ?>
                                </p>
                                <hr>
                                <p style="margin-bottom: -1px;margin-right: 5px;font-size: 14px">
                                    - تفصیلی اول
                                <?php
                                if (@$ta1) echo ' - امتیاز: ' . $ta1['sum'];
                                ?>
                                </p>
                                <select onchange="SetTafsiliRater1(this.value,<?php echo $id = $Article_id; ?>)"
                                        id="rater_1" class="form-control select2"
                                    <?php
                                    if ($Tafsili_list['tafsili1_done'] == 1) {
                                        echo 'disabled';
                                    }
                                    ?>
                                        style="width: auto;display: inline-block;margin-bottom: 8px">
                                    <option disabled selected>انتخاب کنید</option>
                                    <?php
                                    $query = mysqli_query($connection_maghalat, "select * from users where type=1 and approved=1");
                                    foreach ($query as $raters_info):
                                        ?>
                                        <option <?php
                                        $rater1 = $raters_info['id'];
                                        $query = mysqli_query($connection_maghalat, "select * from article where id='$id'");
                                        foreach ($query as $rater1_info) {
                                        }
                                        if ($raters_info['id'] == @$rater1_info['tafsili1_ratercode']) {
                                            echo 'selected';
                                        }
                                        ?>
                                                value="<?php echo $raters_info['id'] ?>">
                                            <?php echo $raters_info['name'] . ' ' . $raters_info['family'];

                                            ?>
                                        </option>
                                    <?php endforeach;
                                    ?>

                                </select>
                                <br/>
                                <p style="margin-bottom: -1px;margin-right: 5px;font-size: 14px">- تفصیلی دوم
                                    <?php
                                    if (@$ta2) echo ' - امتیاز: ' . $ta2['sum'];
                                    ?>
                                </p>
                                <select onchange="SetTafsiliRater2(this.value,<?php echo $id = $Article_id; ?>)"
                                        id="rater_2" class="form-control select2"
                                    <?php
                                    if ($Tafsili_list['tafsili2_done'] == 1) {
                                        echo 'disabled';
                                    }
                                    ?>
                                        style="width: auto;display: inline-block;margin-bottom: 8px">
                                    <option disabled selected>انتخاب کنید</option>
                                    <?php
                                    $rater1code = $Tafsili_list['tafsili1_ratercode'];
                                    $query = mysqli_query($connection_maghalat, "select * from users where type=1 and approved=1 and id!='$rater1code'");
                                    foreach ($query as $raters_info):
                                        ?>
                                        <option <?php
                                        $rater2 = $raters_info['id'];
                                        $query = mysqli_query($connection_maghalat, "select * from article where id='$id'");
                                        foreach ($query as $rater2_info) {
                                        }
                                        if ($raters_info['id'] == @$rater2_info['tafsili2_ratercode']) {
                                            echo 'selected';
                                        }
                                        ?>
                                                value="<?php echo $raters_info['id'] ?>">
                                            <?php echo $raters_info['name'] . ' ' . $raters_info['family'];
                                            ?>
                                        </option>
                                    <?php endforeach;
                                    ?>
                                </select>
                                <?php
                                $query = mysqli_query($connection_maghalat, "select * from tafsili where article_id='$article_id' and type='ta1'");
                                foreach ($query as $ta1) {

                                }
                                $query = mysqli_query($connection_maghalat, "select * from tafsili where article_id='$article_id' and type='ta2'");
                                foreach ($query as $ta2) {

                                }
                                if (!empty($ta1) and !empty($ta2)){
//                                if (abs($ta1['sum'] - $ta2['sum']) >= 12):
                                ?>
                                <br/>
                                <p style="margin-bottom: -1px;margin-right: 5px;font-size: 14px">- تفصیلی سوم</p>
                                <select onchange="SetTafsiliRater3(this.value,<?php echo $id = $Article_id; ?>)"
                                        id="rater_3" class="form-control select2"
                                    <?php
                                    if ($Tafsili_list['tafsili3_done'] == 1) {
                                        echo 'disabled';
                                    }
                                    ?>
                                        style="width: auto;display: inline-block;margin-bottom: 8px">
                                    <option disabled selected>انتخاب کنید</option>
                                    <?php
                                    $rater1code = $Tafsili_list['tafsili1_ratercode'];
                                    $rater2code = $Tafsili_list['tafsili2_ratercode'];
                                    $query = mysqli_query($connection_maghalat, "select * from users where type=1 and approved=1 and id!='$rater1code' and id!='$rater2code'");
                                    foreach ($query as $raters_info):
                                        ?>
                                        <option <?php
                                        $rater3 = $raters_info['id'];
                                        $query = mysqli_query($connection_maghalat, "select * from article where id='$id'");
                                        foreach ($query as $rater3_info) {
                                        }
                                        if ($raters_info['id'] == @$rater3_info['tafsili3_ratercode']) {
                                            echo 'selected';
                                        }
                                        ?>
                                                value="<?php echo $raters_info['id'] ?>">
                                            <?php echo $raters_info['name'] . ' ' . $raters_info['family'];
                                            ?>
                                        </option>
                                    <?php endforeach;
                                    ?>
                                </select>
                            </td>

                            <?php
//                            endif;
                            }
                            ?>
                        </tr>
                        <?php
                        $rater1_info = null;
                        $rater2_info = null;
                        $rater3_info = null;
                        $ta1 = null;
                        $ta2 = null;
                        $ta3 = null;
                        $raters_info['id'] = null;
                        $id = null;
                    endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->

    <script src="build/js/Set_Tafsili_Inc.js"></script>
<?php
    endif;
    include_once __DIR__ . '/footer.php'; ?>