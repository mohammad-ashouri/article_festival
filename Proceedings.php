<?php include_once __DIR__ . '/header.php';
if ($_SESSION['head'] == 4 or $_SESSION['head'] == 3):

    ?>


    <!-- Main content -->
    <section class="content">

        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">صورتجلسه هیئت داوری و شورای علمی</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="post" id="Proceedings_Search">
                    <label>دوره</label>
                    <select class="form-control select2"
                            data-placeholder="گروه علمی را انتخاب کنید"
                            style="width: 20%;text-align: right" name="festival_id"
                            id="festival_id">
                        <option selected disabled>انتخاب کنید</option>
                        <?php
                        $query = mysqli_query($connection_maghalat, 'select distinct (festival_id) from article order by festival_id asc');
                        foreach ($query as $article_items):
                            $festival = $article_items['festival_id'];
                            $query = mysqli_query($connection_maghalat, "select * from festival where id='$festival'");
                            foreach ($query as $Festival_Info) {
                            }
                            ?>
                            <option <?php if ($Festival_Info['id'] == @$_POST['festival_id']) echo 'selected'; ?>
                                    value="<?php echo $Festival_Info['id']; ?>"><?php echo $Festival_Info['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label>گروه علمی</label>
                    <select class="form-control select2"
                            data-placeholder="گروه علمی را انتخاب کنید"
                            style="width: 30%;text-align: right" name="scientific_group"
                            id="scientific_group">
                        <option selected disabled>انتخاب کنید</option>
                        <?php
                        $query = mysqli_query($connection_maghalat, 'select * from scientific_group order by name asc');
                        foreach ($query as $group_items):
                            ?>
                            <option <?php if ($group_items['id'] == @$_POST['scientific_group']) echo 'selected'; ?>
                                    value="<?php echo $group_items['id']; ?>"><?php echo $group_items['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="submit" class="btn btn-block btn-success" id="submit"
                           style="width: 10%;display: inline-block"
                           value="نمایش" name="submit">
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
    <?php
    if (@$_POST['festival_id'] and @$_POST['scientific_group']):
        $festival_id = $_POST['festival_id'];
        $scientific_group = $_POST['scientific_group'];
        $query = mysqli_query($connection_maghalat, "select * from festival where id='$festival_id'");
        foreach ($query as $Festival_Items) {
        }
        $query = mysqli_query($connection_maghalat, "select * from scientific_group where id='$scientific_group'");
        foreach ($query as $Group_Items) {
        }
        ?>
        <section class="content">

            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">صورتجلسه هیئت داوری و شورای علمی
                        <?php
                        echo 'دوره ' . $Festival_Items['name'] . ' گروه علمی ' . $Group_Items['name'];
                        ?>
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="myTable">
                        <tr style="text-align: center">
                            <th>ردیف</th>
                            <th>کد اثر</th>
                            <th>عنوان اثر</th>
                            <th>پدیدآورنده</th>
                            <th>کد محور ویژه</th>
                            <th>امتیاز ویژه</th>
                            <th>امتیاز نهایی</th>
                            <th>نوع برگزیدگی</th>
                            <th>نظر هیئت داوری</th>
                            <th>نوع کاندیداتوری</th>
                            <th>نظر شورای علمی</th>
                        </tr>
                        <?php
                        $a = 1;
                        $query = mysqli_query($connection_maghalat, "select * from ssmp_jashnvarehmaghalat.article c inner join ssmp_magbase.mag_articles m on c.article_id = m.id where m.festival_id='$festival_id' and c.rate_status='منتظر تایید' and (m.scientific_group_1='$scientific_group' or m.scientific_group_2='$scientific_group') order by m.id asc");
                        foreach ($query as $Articles):
                            ?>
                            <tr>
                                <td><?php echo $a;
                                    $a++; ?></td>
                                <td><?php echo $Articles['id']; ?></td>
                                <td><?php echo $Articles['subject']; ?></td>
                                <td><?php
                                    $Author = explode('|', $Articles['author']);
                                    echo $Author[0];
                                    ?>
                                </td>
                                <td></td>
                                <td></td>
                                <td><?php echo $Articles['grade']; ?></td>
                                <td><?php echo $Articles['chosen_subject']; ?></td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                    <div class="flex text-center mt-2">
                        <button class="btn btn-success" type="button" id="showingJury">نمایش اسامی هیئت داوری</button>
                        <button class="btn btn-success" type="button" id="showingCommittee">نمایش اسامی شورای علمی</button>
                    </div>
                    <div class=" pt-3" style="display: none" id="jury">
                        <div id="pro1DIV">
                            <label for="pro1">هیئت داوری اول</label>
                            <select class="form-control select2" id="pro1" style="font-size: 13px">
                                <option selected>انتخاب کنید</option>
                                <?php
                                $query = mysqli_query($connection_variables, "select * from mag_festival_scientific_committee where active=1 order by family asc");
                                foreach ($query as $mag_festival_scientific_committee):
                                    $subjects = mysqli_query($connection_variables, "select * from person_subjects where id=" . $mag_festival_scientific_committee['subject']);
                                    foreach ($subjects as $subject) {
                                    }
                                    ?>
                                    <option><?php echo $subject['subject'] . ' ' . $mag_festival_scientific_committee['name'] . ' ' . $mag_festival_scientific_committee['family']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div id="pro2DIV">
                            <label for="pro2">هیئت داوری دوم</label>
                            <select class="form-control select2" id="pro2" style="font-size: 13px">
                                <option selected>انتخاب کنید</option>
                                <?php
                                $query = mysqli_query($connection_variables, "select * from mag_festival_scientific_committee where active=1 order by family asc");
                                foreach ($query as $mag_festival_scientific_committee):
                                    $subjects = mysqli_query($connection_variables, "select * from person_subjects where id=" . $mag_festival_scientific_committee['subject']);
                                    foreach ($subjects as $subject) {
                                    }
                                    ?>
                                    <option><?php echo $subject['subject'] . ' ' . $mag_festival_scientific_committee['name'] . ' ' . $mag_festival_scientific_committee['family']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div id="pro3DIV">
                            <label for="pro3">هیئت داوری سوم</label>
                            <select class="form-control select2" id="pro3" style="font-size: 13px">
                                <option selected>انتخاب کنید</option>
                                <?php
                                $query = mysqli_query($connection_variables, "select * from mag_festival_scientific_committee where active=1 order by family asc");
                                foreach ($query as $mag_festival_scientific_committee):
                                    $subjects = mysqli_query($connection_variables, "select * from person_subjects where id=" . $mag_festival_scientific_committee['subject']);
                                    foreach ($subjects as $subject) {
                                    }
                                    ?>
                                    <option><?php echo $subject['subject'] . ' ' . $mag_festival_scientific_committee['name'] . ' ' . $mag_festival_scientific_committee['family']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div id="pro4DIV">
                            <label for="pro4">هیئت داوری چهارم</label>
                            <select class="form-control select2" id="pro4" style="font-size: 13px">
                                <option selected>انتخاب کنید</option>
                                <?php
                                $query = mysqli_query($connection_variables, "select * from mag_festival_scientific_committee where active=1 order by family asc");
                                foreach ($query as $mag_festival_scientific_committee):
                                    $subjects = mysqli_query($connection_variables, "select * from person_subjects where id=" . $mag_festival_scientific_committee['subject']);
                                    foreach ($subjects as $subject) {
                                    }
                                    ?>
                                    <option><?php echo $subject['subject'] . ' ' . $mag_festival_scientific_committee['name'] . ' ' . $mag_festival_scientific_committee['family']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="committee pt-3" style="display: none">
                        <div id="com1DIV">
                            <label for="com1">شورای علمی اول</label>
                            <select class="form-control select2" id="com1" style="font-size: 13px">
                                <option selected>انتخاب کنید</option>
                                <?php
                                $query = mysqli_query($connection_variables, "select * from mag_festival_scientific_committee where active=1 order by family asc");
                                foreach ($query as $mag_festival_scientific_committee):
                                    $subjects = mysqli_query($connection_variables, "select * from person_subjects where id=" . $mag_festival_scientific_committee['subject']);
                                    foreach ($subjects as $subject) {
                                    }
                                    ?>
                                    <option><?php echo $subject['subject'] . ' ' . $mag_festival_scientific_committee['name'] . ' ' . $mag_festival_scientific_committee['family']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div id="com2DIV">
                            <label for="com2">شورای علمی دوم</label>
                            <select class="form-control select2" id="com2" style="font-size: 13px">
                                <option selected>انتخاب کنید</option>
                                <?php
                                $query = mysqli_query($connection_variables, "select * from mag_festival_scientific_committee where active=1 order by family asc");
                                foreach ($query as $mag_festival_scientific_committee):
                                    $subjects = mysqli_query($connection_variables, "select * from person_subjects where id=" . $mag_festival_scientific_committee['subject']);
                                    foreach ($subjects as $subject) {
                                    }
                                    ?>
                                    <option><?php echo $subject['subject'] . ' ' . $mag_festival_scientific_committee['name'] . ' ' . $mag_festival_scientific_committee['family']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div id="com3DIV">
                            <label for="com3">شورای علمی سوم</label>
                            <select class="form-control select2" id="com3" style="font-size: 13px">
                                <option selected>انتخاب کنید</option>
                                <?php
                                $query = mysqli_query($connection_variables, "select * from mag_festival_scientific_committee where active=1 order by family asc");
                                foreach ($query as $mag_festival_scientific_committee):
                                    $subjects = mysqli_query($connection_variables, "select * from person_subjects where id=" . $mag_festival_scientific_committee['subject']);
                                    foreach ($subjects as $subject) {
                                    }
                                    ?>
                                    <option><?php echo $subject['subject'] . ' ' . $mag_festival_scientific_committee['name'] . ' ' . $mag_festival_scientific_committee['family']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div id="com4DIV">
                            <label for="com4">شورای علمی چهارم</label>
                            <select class="form-control select2" id="com4" style="font-size: 13px">
                                <option selected>انتخاب کنید</option>
                                <?php
                                $query = mysqli_query($connection_variables, "select * from mag_festival_scientific_committee where active=1 order by family asc");
                                foreach ($query as $mag_festival_scientific_committee):
                                    $subjects = mysqli_query($connection_variables, "select * from person_subjects where id=" . $mag_festival_scientific_committee['subject']);
                                    foreach ($subjects as $subject) {
                                    }
                                    ?>
                                    <option><?php echo $subject['subject'] . ' ' . $mag_festival_scientific_committee['name'] . ' ' . $mag_festival_scientific_committee['family']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="committee pt-3" style="display: none">
                        <div id="com5DIV">
                            <label for="com5">شورای علمی پنجم</label>
                            <select class="form-control select2" id="com5" style="font-size: 13px">
                                <option selected>انتخاب کنید</option>
                                <?php
                                $query = mysqli_query($connection_variables, "select * from mag_festival_scientific_committee where active=1 order by family asc");
                                foreach ($query as $mag_festival_scientific_committee):
                                    $subjects = mysqli_query($connection_variables, "select * from person_subjects where id=" . $mag_festival_scientific_committee['subject']);
                                    foreach ($subjects as $subject) {
                                    }
                                    ?>
                                    <option><?php echo $subject['subject'] . ' ' . $mag_festival_scientific_committee['name'] . ' ' . $mag_festival_scientific_committee['family']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div id="com6DIV">
                            <label for="com6">شورای علمی ششم</label>
                            <select class="form-control select2" id="com6" style="font-size: 13px">
                                <option selected>انتخاب کنید</option>
                                <?php
                                $query = mysqli_query($connection_variables, "select * from mag_festival_scientific_committee where active=1 order by family asc");
                                foreach ($query as $mag_festival_scientific_committee):
                                    $subjects = mysqli_query($connection_variables, "select * from person_subjects where id=" . $mag_festival_scientific_committee['subject']);
                                    foreach ($subjects as $subject) {
                                    }
                                    ?>
                                    <option><?php echo $subject['subject'] . ' ' . $mag_festival_scientific_committee['name'] . ' ' . $mag_festival_scientific_committee['family']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div id="com7DIV">
                            <label for="com7">شورای علمی هفتم</label>
                            <select class="form-control select2" id="com7" style="font-size: 13px">
                                <option selected>انتخاب کنید</option>
                                <?php
                                $query = mysqli_query($connection_variables, "select * from mag_festival_scientific_committee where active=1 order by family asc");
                                foreach ($query as $mag_festival_scientific_committee):
                                    $subjects = mysqli_query($connection_variables, "select * from person_subjects where id=" . $mag_festival_scientific_committee['subject']);
                                    foreach ($subjects as $subject) {
                                    }
                                    ?>
                                    <option><?php echo $subject['subject'] . ' ' . $mag_festival_scientific_committee['name'] . ' ' . $mag_festival_scientific_committee['family']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div id="com8DIV">
                            <label for="com8">شورای علمی هشتم</label>
                            <select class="form-control select2" id="com8" style="font-size: 13px">
                                <option selected>انتخاب کنید</option>
                                <?php
                                $query = mysqli_query($connection_variables, "select * from mag_festival_scientific_committee where active=1 order by family asc");
                                foreach ($query as $mag_festival_scientific_committee):
                                    $subjects = mysqli_query($connection_variables, "select * from person_subjects where id=" . $mag_festival_scientific_committee['subject']);
                                    foreach ($subjects as $subject) {
                                    }
                                    ?>
                                    <option><?php echo $subject['subject'] . ' ' . $mag_festival_scientific_committee['name'] . ' ' . $mag_festival_scientific_committee['family']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label style="width: 23%;text-align: center" id="forPro1"></label>
                        <label style="width: 23%;text-align: center" id="forPro2"></label>
                        <label style="width: 23%;text-align: center" id="forPro3"></label>
                        <label style="width: 23%;text-align: center" id="forPro4"></label>
                    </div>
                    <div class="mt-5">
                        <label style="width: 23%;text-align: center" id="forPro5"></label>
                        <label style="width: 23%;text-align: center" id="forPro6"></label>
                        <label style="width: 23%;text-align: center" id="forPro7"></label>
                        <label style="width: 23%;text-align: center" id="forPro8"></label>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
    <?php
    endif;
    ?>
    <!-- /.content -->
    </div>
    <script src="build/js/Proceedings.js"></script>

    <!-- /.content-wrapper -->
<?php
endif;
include_once __DIR__ . '/footer.php'; ?>
