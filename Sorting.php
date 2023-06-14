<?php
include_once __DIR__ . '/header.php';
if ($_SESSION['head'] == 6 or $_SESSION['head'] == 4 or $_SESSION['head'] == 3):
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">فهرست آثار برای گونه بندی (برای دانلود اثر، بر روی عنوان مقاله کلیک فرمایید)</h3>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-striped text-center" id="myTable">
                    <tr>
                        <th>ردیف</th>
                        <th>جشنواره</th>
                        <th>نام اثر</th>
                        <th>گروه علمی اول</th>
                        <th>گروه علمی دوم</th>
                        <th>تایید گونه بندی</th>
                    </tr>
                    <?php
                    $count = 1;
                    $query = mysqli_query($connection_mag, "select * from ssmp_jashnvarehmaghalat.article c inner join ssmp_magbase.mag_articles m on c.article_id = m.id where m.selected_for_jm=1 and c.rate_status='گونه بندی' order by m.id");
                    foreach ($query as $sortingPosts):
                        ?>
                        <tr>
                            <td style="width: 10px"><?php echo $count; ?></td>
                            <td style="width: 100px"><?php
                                $query = mysqli_query($connection_maghalat, "select * from festival where id=" . $sortingPosts['festival_id']);
                                foreach ($query as $festivalInfo) {
                                }
                                echo $festivalInfo['name'];
                                ?></td>
                            <td style="width: 350px">
                                <a href="Files/Mag_Files/<?php echo $sortingPosts['file_url'] ?>" target="_blank"
                                   id='no-link' style="color: #0a53be">
                                    <?php
                                    echo $sortingPosts['subject'];
                                    ?>
                                </a></td>
                            <td>
                                <select class="form-control"
                                        onchange="sortingG1(<?php echo $sortingPosts['article_id']; ?>,this.value)"
                                        title="گروه علمی اول را انتخاب کنید"
                                        id="scientific_group1">
                                    <option selected disabled>انتخاب کنید</option>
                                    <?php
                                    $query = mysqli_query($connection_maghalat, 'select * from scientific_group order by name');
                                    foreach ($query as $group_items):
                                        ?>
                                        <option <?php if ($sortingPosts['scientific_group_1'] == $group_items['id']) echo 'selected'; ?>
                                                value="<?php echo $group_items['id'] ?>"><?php echo $group_items['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-control"
                                        onchange="sortingG2(<?php echo $sortingPosts['article_id']; ?>,this.value)"
                                        title="گروه علمی اول را انتخاب کنید"
                                        id="scientific_group2">
                                    <option value="" selected>بدون گروه دوم</option>
                                    <?php
                                    $query = mysqli_query($connection_maghalat, 'select * from scientific_group order by name');
                                    foreach ($query as $group_items):
                                        ?>
                                        <option <?php if ($sortingPosts['scientific_group_2'] == $group_items['id']) echo 'selected'; ?>
                                                value="<?php echo $group_items['id'] ?>"><?php echo $group_items['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <button class="btn btn-block btn-success forApprove" value="<?php echo $sortingPosts['article_id']; ?>" id="approveSort<?php echo $count++; ?>">تایید گونه بندی</button>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </section>
    </div>
    <script src="build/js/sorting.js"></script>
<?php
endif;
include_once __DIR__ . '/footer.php'; ?>