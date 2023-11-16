<?php include_once __DIR__ . '/header.php'; ?>
<!-- Main content -->
<section class="content">
    <div class="card card-success">
        <form method="post">
            <div class="card-header d-flex ">
                <h3 class="card-title ">گزارش وضعیت ارزیابی آثار جشنواره در دوره</h3>
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
            $query = mysqli_query($connection_maghalat, "select * from article where festival_id='$festival' order by rate_status desc,grade desc ,avg_ejmali_g1 desc ,avg_ejmali_g2 desc");
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
                        <label>وضعیت</label>
                        <select
                                id="searchInput3" class="form-control select2"
                                style="width: 20%;display: inline-block;margin-bottom: 8px">
                            <option value="" selected>بدون فیلتر</option>
                            <option value="اجمالی">اجمالی</option>
                            <option value="تفصیلی">تفصیلی</option>
                            <option value="تفصیلی سوم">تفصیلی سوم</option>
                            <option value="اجمالی ردی">اجمالی ردی</option>
                        </select>
                        <button class="btn btn-primary" onclick="searchTable()">فیلتر کردن</button>

                        <script>
                            function searchTable() {
                                var input1, input2, input3, filter1, filter2, filter3, table, tr, td1, td2, td3, i;
                                input1 = document.getElementById("searchInput1");
                                input2 = document.getElementById("searchInput2");
                                input3 = document.getElementById("searchInput3");
                                filter1 = input1.value.toUpperCase();
                                filter2 = input2.value.toUpperCase();
                                filter3 = input3.value.toUpperCase();
                                table = document.querySelector("table");
                                tr = table.querySelectorAll("tbody tr");

                                for (var i = 0; i < tr.length; i++) {
                                    var td1 = tr[i].getElementsByTagName("td")[3];
                                    var td2 = tr[i].getElementsByTagName("td")[4];
                                    var td3 = tr[i].getElementsByTagName("td")[5];

                                    if (td1 && td2 && td3) {
                                        var showRow = true;

                                        if (filter1 !== "" && td1.textContent.trim().toUpperCase().indexOf(filter1.trim().toUpperCase()) === -1) {
                                            showRow = false;
                                        }

                                        if (filter2 !== "" && td2.textContent.trim().toUpperCase().indexOf(filter2.trim().toUpperCase()) === -1) {
                                            showRow = false;
                                        }

                                        if (filter3 !== "" && td3.textContent.trim().toUpperCase().indexOf(filter3.trim().toUpperCase()) === -1) {
                                            showRow = false;
                                        }

                                        if (filter1 === "" && filter2 === "" && filter3 === "") {
                                            showRow = true;
                                        }

                                        tr[i].style.display = showRow ? "" : "none";
                                    }
                                }

                            }

                        </script>

                    </div>

                    <table class="table table-bordered table-striped display" id="report_from_rates">
                        <thead>
                        <tr style="text-align: center">
                            <th>ردیف</th>
                            <th>نام اثر</th>
                            <th>نویسنده</th>
                            <th>گروه علمی اول</th>
                            <th>گروه علمی دوم</th>
                            <th>وضعیت</th>
                            <th>امتیاز اجمالی</th>
                            <th>امتیاز تفصیلی</th>
                            <th>امتیاز نهایی</th>
                            <th>رتبه</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $a = 1;
                        foreach ($query as $articles):
                            $article_id = $articles['article_id'];
                            $query = mysqli_query($connection_mag, "select * from mag_articles where id='$article_id'");
                            foreach ($query as $articleInfo) {
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
                                <td style="white-space: nowrap"><?php echo $articles['rate_status']; ?></td>
                                <td>
                                    <?php if ($articles['avg_ejmali_g1']) echo 'اجمالی  گروه اول: ' . $articles['avg_ejmali_g1'] . '<br>'; ?>
                                    <?php if ($articles['avg_ejmali_g2']) echo 'اجمالی گروه دوم: ' . $articles['avg_ejmali_g2']; ?>
                                </td>
                                <td>
                                    <?php
                                    if ($articles['tafsili1_done']) {
                                        echo 'تفصیلی اول: ';
                                        $query = mysqli_query($connection_maghalat, "select * from tafsili where type='ta1' and article_id=" . $article_id);
                                        foreach ($query as $ta1) {
                                        }
                                        echo $ta1['sum'];
                                        echo '<br>';
                                    }
                                    if ($articles['tafsili2_done']) {
                                        echo 'تفصیلی دوم: ';
                                        $query = mysqli_query($connection_maghalat, "select * from tafsili where type='ta2' and article_id=" . $article_id);
                                        foreach ($query as $ta2) {
                                        }
                                        echo $ta2['sum'];
                                        echo '<br>';
                                    }
                                    if ($articles['tafsili3_done']) {
                                        echo 'تفصیلی سوم: ';
                                        $query = mysqli_query($connection_maghalat, "select * from tafsili where type='ta3' and article_id=" . $article_id);
                                        foreach ($query as $ta3) {
                                        }
                                        echo $ta3['sum'];
                                        echo '<br>';
                                    }
                                    ?>
                                </td>
                                <td><?php echo $articles['grade']; ?></td>
                                <td><?php if ($articles['chosen_status'] == 1) echo $articles['chosen_subject']; ?></td>
                                <td>
                                    <?php
                                    if ($articles['rate_status'] == 'تفصیلی ردی' and ($ta3['sum'] == null)) {
                                        switch ($author[2]) {
                                            case 'مرد':
                                                $max_sum = 80;
                                                break;
                                            case 'زن':
                                                $max_sum = 75;
                                                break;
                                        }
                                        $difference = abs($ta1['sum'] - $ta2['sum']);
                                        if (($ta1 >= $max_sum and $difference >= 12) or ($ta2 >= $max_sum and $difference >= 12)):
                                            ?>
                                            <form class="change-rate-status"
                                                  data-article-id="<?php echo $articleInfo['id']; ?>"
                                                  data-work="ChangeRateStatus">
                                                <button class="btn btn-danger changeratestatus">ارسال به تفصیلی سوم
                                                </button>
                                            </form>
                                        <?php
                                        endif;
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                            $ta1['sum'] = null;
                            $ta2['sum'] = null;
                            $ta3['sum'] = null;
                        endforeach; ?>
                        </tbody>
                    </table>
                    <script>
                        const table = document.getElementById('report_from_rates');
                        const rows = Array.from(table.tBodies[0].getElementsByTagName('tr'));

                        const getColumnIndex = (headerRow, columnName) => {
                            const headers = Array.from(headerRow.getElementsByTagName('th'));
                            return headers.findIndex(header => header.textContent.trim() === columnName);
                        };

                        const compareText = (a, b, columnIndex) => {
                            const textA = a.cells[columnIndex].textContent.trim();
                            const textB = b.cells[columnIndex].textContent.trim();
                            return textA.localeCompare(textB);
                        };

                        const sortTable = (columnName) => {
                            const columnIndex = getColumnIndex(table.querySelector('thead tr'), columnName);
                            rows.sort((a, b) => compareText(a, b, columnIndex));
                            rows.forEach((row, index) => {
                                table.tBodies[0].appendChild(row);
                                row.cells[0].textContent = index + 1; // Update row number
                            });
                        };

                        table.querySelector('thead tr').addEventListener('click', (event) => {
                            if (event.target.tagName === 'TH') {
                                sortTable(event.target.textContent);
                            }
                        });
                    </script>
                <?php } ?>
            </div>
        <?php endif; ?>
    </div>

</section>
</div>
<script src="build/js/Report_From_Festival_Rates.js"></script>
<?php include_once __DIR__ . '/footer.php'; ?>
