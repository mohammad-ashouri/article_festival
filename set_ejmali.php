<?php include_once __DIR__ . '/header.php';
if ($_SESSION['head']==4 or $_SESSION['head']==3):
?>


<!-- Main content -->
<section class="content">

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">اختصاص اثر به ارزیاب اجمالی</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped" id="myTable">
                <tbody>
                <tr style="font-size: 15px">
                    <th>ردیف</th>
                    <th style="width: 200px;">عنوان مقاله</th>
                    <th>گروه علمی ۱</th>
                    <th>گروه علمی ۲</th>
                    <th>بخش ویژه</th>
                    <th>نویسنده</th>
                    <th>نوع همکاری</th>
                    <th>همکاران</th>
                    <th>اختصاص به گروه علمی اول</th>
                    <th>اختصاص به گروه علمی دوم</th>
                </tr>
                <?php
                $a = 1;
                $query = mysqli_query($connection_mag, "select * from ssmp_jashnvarehmaghalat.article c inner join ssmp_magbase.mag_articles m on c.article_id = m.id where m.selected_for_jm=1 and c.rate_status='اجمالی' and (c.ejmali1_g1_done=0 or c.ejmali2_g1_done=0 or c.ejmali3_g1_done=0 or c.ejmali1_g2_done=0 or c.ejmali2_g2_done=0 or c.ejmali3_g2_done=0) order by m.id asc");
                foreach ($query as $Ejmali_list):
                    ?>
                    <tr>
                        <td>
                            <?php echo $a;
                            $a++; ?>
                        </td>
                        <td>
                            <a href="Files/Mag_Files/<?php echo $Ejmali_list['file_url'] ?>" target="_blank" id='no-link' style="color: #0a53be">
                                <?php
                                echo $Ejmali_list['subject'];
                                ?>
                            </a>
                        </td>
                        <td>
                            <?php
                            $Group1=$Ejmali_list['scientific_group_1'];
                            $query=mysqli_query($connection_maghalat,"select * from scientific_group where id='$Group1'");
                            foreach ($query as $Group){}
                            echo $Group['name'];
                            $Group['name']=null;
                            ?>
                        </td>
                        <td>
                            <?php
                            $Group2=$Ejmali_list['scientific_group_2'];
                            $query=mysqli_query($connection_maghalat,"select * from scientific_group where id='$Group2'");
                            foreach ($query as $Group){}
                            echo $Group['name'];
                            $Group['name']=null;
                            ?>
                        </td>
                        <td>
                            <?php
                            $special_type = $Ejmali_list['special_type'];
                            $query = mysqli_query($connection_maghalat, "select * from special_type where id='$special_type'");
                            foreach ($query as $Special_Type_Detail) {
                            }
                            echo @$Special_Type_Detail['subject'];
                            ?>
                        </td>
                        <td>
                            <?php
                            $author = explode('|', $Ejmali_list['author']);
                            echo $author[0];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $Ejmali_list['cooperation_type'];
                            ?>
                        </td>
                        <td>
                            <ul>
                                <?php
                                if (isset($Ejmali_list['cooperators'])) {
                                    $cooperators = explode('|', $Ejmali_list['cooperators']);
                                    for ($c = 0, $cMax = count($cooperators); $c < $cMax; $c += 2) {
                                        echo '<li style="margin-right: 5px">' . @$cooperators[$c] . '</li>';
                                    }
                                }
                                ?>
                            </ul>
                        </td>
                        <td>
                            <p style="margin-bottom: -1px;margin-right: 5px;font-size: 14px">- ارزیاب اول</p>
                            <select onchange="SetEjmaliGroup1Rater1(this.value,<?php echo $id = $Ejmali_list['article_id']; ?>)"
                                    id="rater_group_1_1" name="rater_group_1_1" class="form-control select2"
                                    style="width: 100%;display: inline-block;margin-bottom: 8px"
                                    <?php if ($Ejmali_list['ejmali1_g1_done']==1) echo 'disabled'; ?>
                            >
                                <option disabled selected>انتخاب کنید</option>
                                <?php
                                $query = mysqli_query($connection_maghalat, "select * from users where type=1 and approved=1");
                                foreach ($query as $raters_info):
                                    ?>
                                    <option <?php
                                    $rater1 = $raters_info['id'];
                                    $query = mysqli_query($connection_maghalat, "select * from article where article_id='$id'");
                                    foreach ($query as $rater1_info) {
                                    }
                                    if ($raters_info['id'] == @$rater1_info['ejmali1_ratercode_g1']) {
                                        echo 'selected';
                                    }
                                    ?>
                                            value="<?php echo $raters_info['id']; ?>">
                                        <?php echo $raters_info['name'] . ' ' . $raters_info['family'];

                                        ?>
                                    </option>
                                    <script>
                                        //$('#rater_group_1_1').val('<?php //echo @$Ejmali_list['ejmali1_ratercode_g1']; ?>//');
                                    </script>
                                <?php endforeach;
                                ?>
                            </select>
                            <br/>
                            <p style="margin-bottom: -1px;margin-right: 5px;font-size: 14px">- ارزیاب دوم</p>
                            <select onchange="SetEjmaliGroup1Rater2(this.value,<?php echo $id = $Ejmali_list['article_id']; ?>)"
                                    id="rater_group_1_2" name="rater_group_1_2" class="form-control select2"
                                    style="width: 100%;display: inline-block;margin-bottom: 8px" <?php if ($Ejmali_list['ejmali2_g1_done']==1) echo 'disabled'; ?>
                            >
                                <option disabled selected>انتخاب کنید</option>
                                <?php
                                $ej1g1r=@$rater1_info['ejmali1_ratercode_g1'];
                                $query = mysqli_query($connection_maghalat, "select * from users where type=1 and approved=1 and id!='$ej1g1r'");
                                foreach ($query as $raters_info):
                                    ?>
                                    <option <?php
                                    $rater2 = $raters_info['id'];
                                    $query = mysqli_query($connection_maghalat, "select * from article where article_id='$id'");
                                    foreach ($query as $rater2_info) {
                                    }
                                    if ($raters_info['id'] == @$rater2_info['ejmali2_ratercode_g1']) {
                                        echo 'selected';
                                    }
                                    ?>
                                            value="<?php echo $raters_info['id']; ?>">
                                        <?php echo $raters_info['name'] . ' ' . $raters_info['family'];
                                        ?>
                                    </option>
                                    <script>
                                        //$('#rater_group_1_2').val('<?php //echo @$Ejmali_list['ejmali2_ratercode_g1']; ?>//');
                                    </script>
                                <?php endforeach;
                                ?>
                            </select>
                            <br/>
                            <p style="margin-bottom: -1px;margin-right: 5px;font-size: 14px">- ارزیاب سوم</p>
                            <select onchange="SetEjmaliGroup1Rater3(this.value,<?php echo $id = $Ejmali_list['article_id'] ?>)"
                                    id="rater_group_1_3" name="rater_group_1_3" class="form-control select2"
                                    style="width: 100%;display: inline-block;margin-bottom: 8px" <?php if ($Ejmali_list['ejmali3_g1_done']==1) echo 'disabled'; ?>>
                                <option disabled selected>انتخاب کنید</option>
                                <?php
                                $ej1g1r=@$rater1_info['ejmali1_ratercode_g1'];
                                $ej2g1r=@$rater1_info['ejmali2_ratercode_g1'];
                                $query = mysqli_query($connection_maghalat, "select * from users where type=1 and approved=1 and id!='$ej1g1r' and id!='$ej2g1r'");
                                foreach ($query as $raters_info):
                                    ?>
                                    <option <?php
                                    $rater3 = $raters_info['id'];
                                    $query = mysqli_query($connection_maghalat, "select * from article where article_id='$id'");
                                    foreach ($query as $rater3_info) {
                                    }
                                    if ($raters_info['id'] == @$rater3_info['ejmali3_ratercode_g1']) {
                                        echo 'selected';
                                    }
                                    ?>
                                            value="<?php echo $raters_info['id']; ?>">
                                        <?php echo $raters_info['name'] . ' ' . $raters_info['family'];
                                        ?>
                                    </option>
                                    <script>
                                        //$('#rater_group_1_3').val('<?php //echo @$Ejmali_list['ejmali3_ratercode_g1']; ?>//');
                                    </script>
                                <?php endforeach;
                                ?>
                            </select>
                        </td>
                        <td>
                            <?php if ($Ejmali_list['scientific_group_2']!=null or $Ejmali_list['scientific_group_2']!=''): ?>
                            <p style="margin-bottom: -1px;margin-right: 5px;font-size: 14px">- ارزیاب اول</p>
                            <select onchange="SetEjmaliGroup2Rater1(this.value,<?php echo $id = $Ejmali_list['article_id'] ?>)"
                                    id="rater_group_2_1" name="rater_group_2_1" class="form-control select2"
                                    style="width: 100%;display: inline-block;margin-bottom: 8px" <?php if ($Ejmali_list['ejmali1_g2_done']==1) echo 'disabled'; ?>>
                                <option disabled selected>انتخاب کنید</option>
                                <?php
                                $query = mysqli_query($connection_maghalat, "select * from users where type=1 and approved=1");
                                foreach ($query as $raters_info):
                                    ?>
                                    <option <?php
                                    $rater1 = $raters_info['id'];
                                    $query = mysqli_query($connection_maghalat, "select * from article where article_id='$id'");
                                    foreach ($query as $rater1_info) {
                                    }
                                    if ($raters_info['id'] == @$rater1_info['ejmali1_ratercode_g2']) {
                                        echo 'selected';
                                    }
                                    ?>
                                            value="<?php echo $raters_info['id']; ?>">
                                        <?php echo $raters_info['name'] . ' ' . $raters_info['family'];

                                        ?>
                                    </option>
                                    <script>
                                        //$('#rater_group_2_1').val('<?php //echo @$Ejmali_list['ejmali1_ratercode_g2']; ?>//');
                                    </script>
                                <?php endforeach;
                                ?>
                            </select>
                            <br/>
                            <p style="margin-bottom: -1px;margin-right: 5px;font-size: 14px">- ارزیاب دوم</p>
                            <select onchange="SetEjmaliGroup2Rater2(this.value,<?php echo $id = $Ejmali_list['article_id'] ?>)"
                                    id="rater_group_2_2" name="rater_group_2_2" class="form-control select2"
                                    style="width: 100%;display: inline-block;margin-bottom: 8px" <?php if ($Ejmali_list['ejmali2_g2_done']==1) echo 'disabled'; ?>>
                                <option disabled selected>انتخاب کنید</option>
                                <?php
                                $ej1g2r=$rater1_info['ejmali1_ratercode_g2'];
                                $query = mysqli_query($connection_maghalat, "select * from users where type=1 and approved=1 and id!='$ej1g2r'");
                                foreach ($query as $raters_info):
                                    ?>
                                    <option <?php
                                    $rater2 = @$raters_info['id'];
                                    $query = mysqli_query($connection_maghalat, "select * from article where article_id='$id'");
                                    foreach ($query as $rater2_info) {
                                    }
                                    if ($raters_info['id'] == @$rater2_info['ejmali2_ratercode_g2']) {
                                        echo 'selected';
                                    }
                                    ?>
                                            value="<?php echo $raters_info['id']; ?>">
                                        <?php echo $raters_info['name'] . ' ' . $raters_info['family'];
                                        ?>
                                    </option>
                                    <script>
                                        //$('#rater_group_2_2').val('<?php //echo @$Ejmali_list['ejmali2_ratercode_g2']; ?>//');
                                    </script>
                                <?php endforeach;
                                ?>
                            </select>
                            <br/>
                            <p style="margin-bottom: -1px;margin-right: 5px;font-size: 14px">- ارزیاب سوم</p>
                            <select onchange="SetEjmaliGroup2Rater3(this.value,<?php echo $id = $Ejmali_list['article_id'] ?>)"
                                    id="rater_group_2_3" name="rater_group_2_3" class="form-control select2"
                                    style="width: 100%;display: inline-block;margin-bottom: 8px" <?php if ($Ejmali_list['ejmali3_g2_done']==1) echo 'disabled'; ?>>
                                <option disabled selected>انتخاب کنید</option>
                                <?php
                                $ej1g2r=@$rater1_info['ejmali1_ratercode_g2'];
                                $ej2g2r=@$rater1_info['ejmali2_ratercode_g2'];
                                $query = mysqli_query($connection_maghalat, "select * from users where type=1 and approved=1 and id!='$ej1g2r' and id!='$ej2g2r'");
                                foreach ($query as $raters_info):
                                    ?>
                                    <option <?php
                                    $rater3 = $raters_info['id'];
                                    $query = mysqli_query($connection_maghalat, "select * from article where article_id='$id'");
                                    foreach ($query as $rater3_info) {
                                    }
                                    if ($raters_info['id'] == @$rater3_info['ejmali3_ratercode_g2']) {
                                        echo 'selected';
                                    }
                                    ?>
                                            value="<?php echo $raters_info['id']; ?>">
                                        <?php echo $raters_info['name'] . ' ' . $raters_info['family'];
                                        ?>
                                    </option>
                                    <script>
                                        //$('#rater_group_2_3').val('<?php //echo @$Ejmali_list['ejmali3_ratercode_g2']; ?>//');
                                    </script>
                                <?php endforeach;
                                ?>
                            </select>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php
                    $rater1_info = null;
                    $rater2_info = null;
                    $rater3_info = null;
                    $raters_info['id']=null;
                    $query=null;
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

<script src="build/js/Set_Ejmali_Inc.js"></script>

<?php
endif;
include_once __DIR__ . '/footer.php'; ?>
