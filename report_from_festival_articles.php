<?php include_once __DIR__ . '/header.php'; ?>
<!-- Main content -->
<section class="content">
    <div class="card card-success">
        <form method="post">
            <div class="card-header d-flex ">
                <h3 class="card-title ">فهرست تمامی آثار جشنواره در دوره</h3>
                <select class="form-control w-25 " required title="مدرک مدیر اجرایی را انتخاب کنید" id="festival_id"
                        name="festival_id">
                    <option value="" selected disabled>انتخاب کنید</option>
                    <?php
                    $query = mysqli_query($connection_maghalat, 'select * from festival order by id ');
                    foreach ($query as $festival):
                        ?>
                        <option <?php if (@$_POST['festival_id'] == $festival['id']) echo 'selected' ?>
                                value="<?php echo $festival['id'] ?>"><?php echo $festival['name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <button name="festival" type="submit" class="btn btn-primary">انتخاب دوره</button>
            </div>
        </form>
        <?php
        if (isset($_POST['festival']) and !empty($_POST['festival_id'])):
            $festival = $_POST['festival_id'];
            $query = mysqli_query($connection_maghalat, "select * from article where festival_id='$festival' order by article_id");
            ?>
            <div class="card-body">
                <?php
                if (mysqli_num_rows($query) < 1) {
                    echo 'مقاله ای پیدا نشد.';
                } else {
                    ?>
                    <table class="table table-bordered table-striped" id="myTable">
                        <tr style="text-align: center">
                            <th>ردیف</th>
                            <th>نام اثر</th>
                            <th>نویسنده</th>
                            <th>گروه علمی اول</th>
                            <th>گروه علمی دوم</th>
                            <th>نشریه</th>
                            <th>سال انتشار</th>
                            <th>دوره انتشار (سال)</th>
                            <th>نوبت انتشار در سال</th>
                            <th>شماره مسلسل نشریه</th>
                        </tr>
                        <?php
                        $a = 1;
                        foreach ($query as $articles):
                            $article_id = $articles['article_id'];
                            $query = mysqli_query($connection_mag, "select * from mag_articles where id='$article_id'");
                            foreach ($query as $articleInfo) {
                            }
                            $mag_version_id=$articleInfo['mag_version_id'];
                            $query = mysqli_query($connection_mag, "select * from mag_versions where id='$mag_version_id'");
                            foreach ($query as $versionInfo) {
                            }
                            $mag_info_id=$versionInfo['mag_info_id'];
                            $query = mysqli_query($connection_mag, "select * from mag_info where id='$mag_info_id'");
                            foreach ($query as $magInfo) {
                            }
                            ?>
                            <tr>
                                <td><?php echo $a++; ?></td>
                                <td><?php echo $articleInfo['subject']; ?></td>
                                <td><?php
                                    $author = explode('|', $articleInfo['author']);
                                    echo $author[0]; ?>
                                </td>
                                <td>
                                    <?php
                                    $sg1=$articleInfo['scientific_group_1'];
                                    $query=mysqli_query($connection_maghalat,"select * from scientific_group where id='$sg1'");
                                    foreach ($query as $sg1Info){}
                                    echo $sg1Info['name'];
                                    $sg1Info['name']=null;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $sg2=$articleInfo['scientific_group_2'];
                                    $query=mysqli_query($connection_maghalat,"select * from scientific_group where id='$sg2'");
                                    foreach ($query as $sg2Info){}
                                    echo @$sg2Info['name'];
                                    $sg2Info['name']=null;
                                    ?>
                                </td>
                                <td><?php echo $magInfo['name']; ?></td>
                                <td><?php echo $versionInfo['publication_year']; ?></td>
                                <td><?php echo $versionInfo['publication_period_year']; ?></td>
                                <td><?php echo $versionInfo['publication_period_number']; ?></td>
                                <td><?php echo $versionInfo['publication_number']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php } ?>
            </div>
        <?php endif; ?>
    </div>
</section>
</div>

<?php include_once __DIR__ . '/footer.php'; ?>
