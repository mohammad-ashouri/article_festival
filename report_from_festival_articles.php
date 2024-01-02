<?php include_once __DIR__ . '/header.php'; ?>
<!-- Main content -->
<section class="content">
    <div class="card card-success">
        <form method="post">
            <div class="card-header d-flex ">
                <h3 class="card-title ">فهرست تمامی آثار جشنواره در دوره</h3>
                <select class="form-control w-25 " required title="دوره را انتخاب کنید" id="festival_id"
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
                    
                    <div style="margin-bottom: 20px; overflow-x: auto">
                        <label>گروه علمی اول</label>
                        <select
                                id="searchInput1" class="form-control select2"
                                style="width: 20%;display: inline-block;margin-bottom: 8px">
                            <option value="" selected>بدون فیلتر</option>
                            <?php
                            $groups = mysqli_query($connection_maghalat, "select * from scientific_group order by name asc");
                            foreach ($groups as $Group) {
                                ?>
                                <option value="<?php echo $Group['name'] ?>"><?php echo $Group['name']; ?></option>
                            <?php } ?>
                        </select>
                        <label>گروه علمی دوم</label>
                        <select
                                id="searchInput2" class="form-control select2"
                                style="width: 20%;display: inline-block;margin-bottom: 8px">
                            <option value="" selected>بدون فیلتر</option>
                            <?php
                            $groups = mysqli_query($connection_maghalat, "select * from scientific_group order by name asc");
                            foreach ($groups as $Group) {
                                ?>
                                <option value="<?php echo $Group['name'] ?>"><?php echo $Group['name']; ?></option>
                            <?php } ?>
                        </select>
                        <button class="btn btn-primary" onclick="searchTable()">فیلتر کردن</button>

                        <script>
                            function searchTable() {
                                var input1, input2, input3, filter1, filter2, filter3, table, tr, td1, td2, td3, i;
                                input1 = document.getElementById("searchInput1");
                                input2 = document.getElementById("searchInput2");
                                filter1 = input1.value.toUpperCase();
                                filter2 = input2.value.toUpperCase();
                                table = document.querySelector("table");
                                tr = table.querySelectorAll("tbody tr");

                                for (var i = 0; i < tr.length; i++) {
                                    var td1 = tr[i].getElementsByTagName("td")[3];
                                    var td2 = tr[i].getElementsByTagName("td")[4];

                                    if (td1 && td2) {
                                        var showRow = true;

                                        if (filter1 !== "" && td1.textContent.trim().toUpperCase().indexOf(filter1.trim().toUpperCase()) === -1) {
                                            showRow = false;
                                        }

                                        if (filter2 !== "" && td2.textContent.trim().toUpperCase().indexOf(filter2.trim().toUpperCase()) === -1) {
                                            showRow = false;
                                        }

                                        if (filter1 === "" && filter2 === "") {
                                            showRow = true;
                                        }

                                        tr[i].style.display = showRow ? "" : "none";
                                    }
                                }

                            }

                        </script>

                    </div>
                    <table class="table table-bordered table-striped" id="myTable">
                        <tr style="text-align: center">
                            <th>ردیف</th>
                            <th>نام اثر</th>
                            <th>نویسنده</th>
                            <th>گروه علمی اول</th>
                            <th>گروه علمی دوم</th>
                            <th>نشریه</th>
                            <th>تعداد صفحه</th>
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
                            $mag_version_id = $articleInfo['mag_version_id'];
                            $query = mysqli_query($connection_mag, "select * from mag_versions where id='$mag_version_id'");
                            foreach ($query as $versionInfo) {
                            }
                            $mag_info_id = $versionInfo['mag_info_id'];
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
                                    $sg1 = $articleInfo['scientific_group_1'];
                                    $query = mysqli_query($connection_maghalat, "select * from scientific_group where id='$sg1'");
                                    foreach ($query as $sg1Info) {
                                    }
                                    echo $sg1Info['name'];
                                    $sg1Info['name'] = null;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $sg2 = $articleInfo['scientific_group_2'];
                                    $query = mysqli_query($connection_maghalat, "select * from scientific_group where id='$sg2'");
                                    foreach ($query as $sg2Info) {
                                    }
                                    echo @$sg2Info['name'];
                                    $sg2Info['name'] = null;
                                    ?>
                                </td>
                                <td><?php echo $magInfo['name']; ?></td>
                                <td><?php echo $articleInfo['number_of_page_in_mag_to'] - $articleInfo['number_of_page_in_mag_from']; ?></td>
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
