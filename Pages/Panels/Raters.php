<!-- Main content -->
<section class="content">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">فهرست آثار برای ارزیابی (برای نمایش اثر، بر روی عنوان مقاله کلیک نمایید)</h3>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped" id="myTable">
                <tr style="font-size: 15px;">
                    <th>ردیف</th>
                    <th>عنوان مقاله</th>
                    <th>گروه علمی</th>
                    <th>زبان</th>
                    <th>عملیات ارزیابی</th>
                </tr>
                <?php
                $a = 1;
                $MyGroup = $_SESSION['group'];
                $Me = $_SESSION['id'];
                $query = mysqli_query($connection_maghalat, "select * from article where rate_status like 'اجمالی' and ((ejmali1_ratercode_g1='$Me' and ejmali1_g1_done!=1) or (ejmali2_ratercode_g1='$Me' and ejmali2_g1_done!=1) or (ejmali3_ratercode_g1='$Me' and ejmali3_g1_done!=1) or (ejmali1_ratercode_g2='$Me' and ejmali1_g2_done!=1) or (ejmali2_ratercode_g2='$Me' and ejmali2_g2_done!=1) or (ejmali3_ratercode_g2='$Me' and ejmali3_g2_done!=1)) order by festival_id asc ");
                foreach ($query as $Ejmali_list):
                    $id = $Ejmali_list['article_id'];
                    $query = mysqli_query($connection_mag, "select * from mag_articles where id='$id'");
                    foreach ($query as $article) {
                    }
                    ?>
                    <tr>
                        <td>
                            <?php echo $a;
                            $a++; ?>
                        </td>
                        <td>
                            <a href="Files/Mag_Files/<?php echo $article['file_url'] ?>" target="_blank"
                               id='no-link' style="color: #0a53be">
                                <?php
                                echo $article['subject'];
                                ?>
                            </a>
                        </td>
                        <td>
                            <?php
                            if (($Ejmali_list['ejmali1_ratercode_g1'] == $Me and $Ejmali_list['ejmali1_g1_done'] == 0) or ($Ejmali_list['ejmali2_ratercode_g1'] == $Me and $Ejmali_list['ejmali2_g1_done'] == 0) or ($Ejmali_list['ejmali3_ratercode_g1'] == $Me and $Ejmali_list['ejmali3_g1_done'] == 0)) {
                                $groupID = $article['scientific_group_1'];
                                $query = mysqli_query($connection_maghalat, "Select * from scientific_group where id='$groupID'");
                                foreach ($query as $groupInfo) {
                                }
                                echo $groupInfo['name'];
                            } elseif (($Ejmali_list['ejmali1_ratercode_g2'] == $Me and $Ejmali_list['ejmali1_g2_done'] == 0) or ($Ejmali_list['ejmali2_ratercode_g2'] == $Me and $Ejmali_list['ejmali2_g2_done'] == 0) or ($Ejmali_list['ejmali3_ratercode_g2'] == $Me and $Ejmali_list['ejmali3_g2_done'] == 0)) {
                                $groupID = $article['scientific_group_2'];
                                $query = mysqli_query($connection_maghalat, "Select * from scientific_group where id='$groupID'");
                                foreach ($query as $groupInfo) {
                                }
                                echo $groupInfo['name'];
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $article['language'];
                            ?>
                        </td>
                        <td>
                            <form action="Rate.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
                                <input type="hidden" name="rate_status"
                                       value="<?php
                                       if ($Ejmali_list['ejmali1_ratercode_g1'] == $Me and $Ejmali_list['ejmali1_g1_done'] == 0) {
                                           echo 'ej1g1';
                                       } elseif ($Ejmali_list['ejmali2_ratercode_g1'] == $Me and $Ejmali_list['ejmali2_g1_done'] == 0) {
                                           echo 'ej2g1';
                                       } elseif ($Ejmali_list['ejmali3_ratercode_g1'] == $Me and $Ejmali_list['ejmali3_g1_done'] == 0) {
                                           echo 'ej3g1';
                                       } elseif ($Ejmali_list['ejmali1_ratercode_g2'] == $Me and $Ejmali_list['ejmali1_g2_done'] == 0) {
                                           echo 'ej1g2';
                                       } elseif ($Ejmali_list['ejmali2_ratercode_g2'] == $Me and $Ejmali_list['ejmali2_g2_done'] == 0) {
                                           echo 'ej2g2';
                                       } elseif ($Ejmali_list['ejmali3_ratercode_g2'] == $Me and $Ejmali_list['ejmali3_g2_done'] == 0) {
                                           echo 'ej3g2';
                                       }
                                       ?>"
                                >
                                <button class="btn btn-primary" name="ej">
                                    ارزیابی اجمالی
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php
                endforeach;
                $query = mysqli_query($connection_maghalat, "select * from article where rate_status='تفصیلی' and ((tafsili1_ratercode='$Me' and tafsili1_done!=1) or (tafsili2_ratercode='$Me' and tafsili2_done!=1) or (tafsili3_ratercode='$Me' and tafsili3_done!=1)) order by festival_id asc ");
                foreach ($query as $Tafsili_list):
                    $id = $Tafsili_list['article_id'];
                    $query = mysqli_query($connection_mag, "select * from mag_articles where id='$id'");
                    foreach ($query as $article) {
                    }
                    ?>
                    <tr>
                        <td>
                            <?php echo $a;
                            $a++; ?>
                        </td>
                        <td>
                            <a href="Files/Mag_Files/<?php echo $article['file_url'] ?>" target="_blank"
                               id='no-link' style="color: #0a53be">
                                <?php
                                echo $article['subject'];
                                ?>
                            </a>
                        </td>
                        <td>
                            <?php
                            $GroupArray=explode('||',$_SESSION['group']);
                            if (in_array($article['scientific_group_1'],$GroupArray)) {
                                $groupID = $article['scientific_group_1'];
                                $query = mysqli_query($connection_maghalat, "Select * from scientific_group where id='$groupID'");
                                foreach ($query as $groupInfo) {
                                }
                                echo $groupInfo['name'];
                            }elseif ($_SESSION['group']==$article['scientific_group_2']) {
                                $groupID = $article['scientific_group_1'];
                                $query = mysqli_query($connection_maghalat, "Select * from scientific_group where id='$groupID'");
                                foreach ($query as $groupInfo) {
                                }
                                echo $groupInfo['name'];
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $article['language'];
                            ?>
                        </td>
                        <td>
                            <form action="Rate.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $Tafsili_list['id']; ?>">
                                <input type="hidden" name="rate_status"
                                       value="<?php
                                       if ($Tafsili_list['tafsili1_ratercode'] == $Me) {
                                           echo 'ta1';
                                       } elseif ($Tafsili_list['tafsili2_ratercode'] == $Me) {
                                           echo 'ta2';
                                       } elseif ($Tafsili_list['tafsili3_ratercode'] == $Me) {
                                           echo 'ta3';
                                       }
                                       ?>"
                                >
                                <button class="btn btn-primary" name="ta">
                                    ارزیابی تفصیلی
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->