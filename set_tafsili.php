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
                <table class="table table-bordered table-striped" id="myTable">
                    <tbody>
                    <tr style="font-size: 15px;">
                        <th>ردیف</th>
                        <th style="width: 200px;">عنوان مقاله</th>
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
                    $query = mysqli_query($connection_maghalat, "select * from jashnvareh_maghalat.article c inner join mag_base.mag_articles m on c.article_id = m.id where m.selected_for_jm=1 and c.rate_status='تفصیلی' and (c.avg_ejmali_g1>=34 or c.avg_ejmali_g2>=34) order by m.id asc");
                    foreach ($query as $Tafsili_list):
                        ?>
                        <tr>
                            <td>
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
                                $query = mysqli_query($connection_maghalat, "select * from scientific_group where id='$Group2'");
                                foreach ($query as $Group2) {
                                }
                                echo $Group2['name'];
                                $Group2['name'] = null;
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
                                $query = mysqli_query($connection_maghalat, "select * from special_type where id='$special_type'");
                                foreach ($query as $Special_Type_Detail) {
                                }
                                echo $Special_Type_Detail['subject'];
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
                                    - تفصیلی اول</p>
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
                                        <script>
                                            //$('#rater_group_1_1').val('<?php //echo @$Tafsili_list['tafsili1_ratercode_g1']; ?>//');
                                        </script>
                                    <?php endforeach;
                                    ?>

                                </select>
                                <?php
                                if ($Tafsili_list['tafsili1_ratercode']==null or $Tafsili_list['tafsili1_ratercode']==''):
                                ?>
                                <br/>
                                <p style="margin-bottom: -1px;margin-right: 5px;font-size: 14px">- تفصیلی دوم</p>
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
                                        <script>
                                            //$('#rater_group_1_2').val('<?php //echo @$Tafsili_list['tafsili2_ratercode_g1']; ?>//');
                                        </script>
                                    <?php endforeach;
                                    ?>
                                </select>
                                <?php
                                    endif;
                                $query = mysqli_query($connection_maghalat, "select * from tafsili where article_id='$article_id' and type='ta1'");
                                foreach ($query as $ta1) {

                                }
                                $query = mysqli_query($connection_maghalat, "select * from tafsili where article_id='$article_id' and type='ta2'");
                                foreach ($query as $ta2) {

                                }
                                if (!empty($ta1) and !empty($ta2)){
                                if (abs($ta1['sum'] - $ta2['sum']) >= 12):
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
                                        <script>
                                            //$('#rater_group_1_3').val('<?php //echo @$Tafsili_list['tafsili3_ratercode_g1']; ?>//');
                                        </script>
                                    <?php endforeach;
                                    ?>
                                </select>
                            </td>

                            <?php
                            endif;
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