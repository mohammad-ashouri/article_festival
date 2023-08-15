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
            $query = mysqli_query($connection_maghalat, "select * from article where festival_id='$festival' order by rate_status desc ");
            ?>
            <div class="card-body">
                <?php
                if (mysqli_num_rows($query) < 1) {
                    echo 'مقاله ای پیدا نشد.';
                } else {
                    ?>
                    <table class="table table-bordered table-striped display" id="report_from_rates">
                        <thead>
                        <tr style="text-align: center">
                            <th>ردیف</th>
                            <th>نام اثر</th>
                            <th>نویسنده</th>
                            <th>گروه علمی اول</th>
                            <th>گروه علمی دوم</th>
                            <th>وضعیت</th>
                            <th>رتبه</th>
                            <th>امتیاز نهایی</th>
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
                                <td><?php if ($articles['chosen_status'] == 1) echo $articles['chosen_subject']; ?></td>
                                <td><?php if ($articles['chosen_status'] == 1) echo $articles['grade']; ?></td>
                            </tr>
                        <?php endforeach; ?>
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

<?php include_once __DIR__ . '/footer.php'; ?>
