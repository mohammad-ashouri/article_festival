<?php include_once __DIR__ . '/header.php'; ?>
<!-- Main content -->

<!--Ejmali Modal-->
<div class="modal fade" id="ejmaliModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 700px">
            <div class="pt-4 pr-3">
                <h6 class="modal-title" style="padding-bottom: 3px" id="title"></h6>
                <h6 class="modal-title" style="padding-bottom: 3px" id="rater"></h6>
                <h6 class="modal-title" id="rateSubject"></h6>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped" id="myTable">
                    <tbody>
                    <tr>
                        <th style="width: 50px;">ردیف</th>
                        <th style="text-align: center">نام شاخص</th>
                        <th style="width: 50px; text-align: center">امتیاز</th>
                        <th style="width: 150px;text-align: center">راهنمای امتیازدهی</th>
                    </tr>
                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            <p style="font-size: 13px; font-weight: bold">اولویت و روزآمدی مسئله یا موضوع</p>
                        </td>
                        <td style=" text-align: center">
                            <label id="r1Ejmali"></label>
<!--                            <input type="text" class="form-control" name="r1Ejmali" style="width: 100%" step="0.25"-->
<!--                                   id="r1Ejmali" >-->
                        </td>
                        <td style="text-align: center;vertical-align: middle" rowspan="5">
                            <label>
                                عالی: 4
                                <br>
                                <br>
                                خوب: 3
                                <br>
                                <br>
                                متوسط: 2
                                <br>
                                <br>
                                ضعیف: 1
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            2
                        </td>
                        <td>
                            <p style="font-size: 13px; font-weight: bold">ارزش علمی و نو بودن محتوا</p>
                        </td>
                        <td class="text-center" style=" text-align: center">
                            <label id="r2Ejmali"></label>
<!--                            <input type="text" class="form-control" name="r2Ejmali" style="width: 100%" step="0.25"-->
<!--                                   id="r2Ejmali" >-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            3
                        </td>
                        <td>
                            <p style="font-size: 13px; font-weight: bold">استفاده مناسب از منابع معتبر</p>
                        </td>
                        <td class="text-center" style="text-align: center">
                            <label id="r3Ejmali"></label>
<!--                            <input type="text" class="form-control" name="r3Ejmali" style="width: 100%" step="0.25"-->
<!--                                   id="r3Ejmali" >-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            4
                        </td>
                        <td>
                            <p style="font-size: 13px; font-weight: bold">اثربخشی و میزان تاثیر گذاری در حل مشکلات علمی و کاربردی</p>
                        </td>
                        <td class="text-center" style="text-align: center">
                            <label id="r4Ejmali"></label>
<!--                            <input type="text" class="form-control" name="r4Ejmali" style="width: 100%" step="0.25"-->
<!--                                   id="r4Ejmali" >-->
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2" style="text-align: left;font-size: 13px">جمع امتیاز</th>
                        <td style="text-align: center"><label id="sumEjmali">0</label></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger"
                        aria-hidden="true" id="printButton"
                        data-bs-dismiss="modal">چاپ کارنامه
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('printButton').addEventListener('click', function () {
        var printWindow = window.open('', '_blank');
        printWindow.document.write("<html dir='rtl'><head><title>Print</title>");
        printWindow.document.write("<link rel='stylesheet' href='dist/css/custom-style.css'>");
        printWindow.document.write('</head><body>');
        printWindow.document.write(document.getElementById('ejmaliModal').innerHTML);
        printWindow.document.getElementById('printButton').style.display='none';
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    });
</script>

<!--Tafsili Modal-->
<div class="modal fade" id="tafsiliModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 800px">
            <div class="pt-4 pr-3">
                <h5 id="titleTafsili"></h5>
                <hr/>
                <h5 id="raterTafsili"></h5>
                <hr/>
                <h5 id="rateSubjectTafsili"></h5>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped" id="myTable">
                    <tbody>
                    <tr>
                        <th style="width: 50px;">ردیف</th>
                        <th style="text-align: center">نام شاخص</th>
                        <th style="text-align: center;width: 10%">بازه امتیاز</th>
                        <th style="width: 15%;text-align: center">امتیاز</th>
                    </tr>
                    <?php
                    $query = mysqli_query($connection_variables, "select * from mag_festival_tafsili_options where special_type=0");
                    foreach ($query as $Tafsili_Form):
                        ?>
                        <tr>
                            <td>
                                <?php echo $Tafsili_Form['id']; ?>
                            </td>
                            <td>
                                <?php echo $Tafsili_Form['subject']; ?>
                            </td>
                            <td style="text-align: center;vertical-align: middle">
                                <label>
                                    از
                                    <?php echo $Tafsili_Form['point_period_from']; ?>
                                    تا
                                    <?php echo $Tafsili_Form['point_period_to']; ?>
                                </label>
                            </td>
                            <td style="width: 150px;">
                                <input class="form-control" name="r<?php echo $Tafsili_Form['id']; ?>"
                                       style="width: 100%" step="0.25"
                                       disabled
                                       id="r<?php echo $Tafsili_Form['id']; ?>Tafsili"
                                       value="0">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                توضیحات
                            </th>
                            <td colspan="3" style="width: 150px;">
                                <textarea title="چکیده" class="form-control" rows="3"
                                          disabled
                                          placeholder="توضیحات خود را در مورد شاخص <?php echo $Tafsili_Form['subject']; ?> وارد کنید"
                                          id="description_<?php echo $Tafsili_Form['id']; ?>Tafsili"
                                          name="description_<?php echo $Tafsili_Form['id']; ?>"></textarea>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                    <tr>
                        <th colspan="4" style="text-align: center">
                            امتیاز ویژه: امتیاز این شاخص جزء 100 امتیاز فرم نیست؛ ولی امتیازی که در این شاخص کسب می شود،
                            به جمع امتیازات افزوده خواهد شد.
                        </th>
                    </tr>
                    <?php
                    $query = mysqli_query($connection_variables, "select * from mag_festival_tafsili_options where special_type=1");
                    foreach ($query as $Tafsili_Form):
                        ?>
                        <tr>
                            <td>
                                <?php echo $Tafsili_Form['id']; ?>
                            </td>
                            <td>
                                <?php echo $Tafsili_Form['subject']; ?>
                            </td>
                            <td style="text-align: center;vertical-align: middle">
                                <label>
                                    از
                                    <?php echo $Tafsili_Form['point_period_from']; ?>
                                    تا
                                    <?php echo $Tafsili_Form['point_period_to']; ?>
                                </label>
                            </td>
                            <td style="width: 150px;">
                                <input type="number" class="form-control" name="r<?php echo $Tafsili_Form['id']; ?>"
                                       style="width: 100%" step="0.25"
                                       id="r<?php echo $Tafsili_Form['id']; ?>Tafsili"
                                       disabled>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                توضیحات
                            </th>
                            <td colspan="3" style="width: 150px;">
                                <textarea title="چکیده" class="form-control" rows="3" disabled
                                          placeholder="توضیحات خود را در مورد شاخص <?php echo $Tafsili_Form['subject']; ?> وارد کنید"
                                          id="description_<?php echo $Tafsili_Form['id']; ?>Tafsili"
                                          name="description_<?php echo $Tafsili_Form['id']; ?>"></textarea>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                    <tr>
                        <th colspan="3" style="text-align: left">جمع امتیاز</th>
                        <td style="text-align: center"><label id="sumTafsili">0</label></td>
                    </tr>
                    <tr>
                        <th>
                            اظهار نظر کلی
                        </th>
                        <td colspan="3" style="width: 80%;">
                            <textarea title="چکیده" class="form-control" rows="3" disabled
                                      placeholder="به نظر شما این مقاله شرایط لازم را برای معرفی «مقاله برتر علمی پژوهشی حوزه» دارد؟ (با توضیح)"
                                      id="general_commentTafsili" name="general_comment"></textarea>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!--            <div class="modal-footer">-->
            <!--                <button type="button" class="btn btn-secondary"-->
            <!--                        aria-hidden="true" id="closeModal"-->
            <!--                        data-bs-dismiss="modal">بستن-->
            <!--                </button>-->
            <!--            </div>-->
        </div>
    </div>
</div>

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
                        <button class="btn btn-primary" onclick="searchTable()">فیلتر کردن</button>
                    </div>

                    <script>
                        function searchTable() {
                            var input1, input2, filter1, filter2, table, tr, td1, td2, i;
                            input1 = document.getElementById("searchInput1");
                            input2 = document.getElementById("searchInput2");
                            filter1 = input1.value.toUpperCase();
                            filter2 = input2.value.toUpperCase();
                            table = document.getElementById("report_from_rates");
                            tr = table.querySelectorAll("tbody tr");

                            for (i = 0; i < tr.length; i++) {
                                td1 = tr[i].getElementsByTagName("td")[2];
                                td2 = tr[i].getElementsByTagName("td")[3];
                                if (td1 && td2) {
                                    var showRow = true;

                                    if (filter1 !== "" && td1.textContent.toUpperCase().indexOf(filter1) === -1) {
                                        showRow = false;
                                    }

                                    if (filter2 !== "" && td2.textContent.toUpperCase().indexOf(filter2) === -1) {
                                        showRow = false;
                                    }

                                    if (filter1 === "" && filter2 === "") {
                                        showRow = true;
                                    }

                                    if (showRow) {
                                        tr[i].style.display = "";
                                    } else {
                                        tr[i].style.display = "none";
                                    }
                                }
                            }
                        }
                    </script>
                    <table class="table table-bordered table-striped display" id="report_from_rates">
                        <thead>
                        <tr style="text-align: center">
                            <th>ردیف</th>
                            <th>نام اثر و نویسنده</th>
                            <th>گروه علمی اول</th>
                            <th>گروه علمی دوم</th>
                            <th>وضعیت</th>
                            <th>کارنامه های اجمالی</th>
                            <th>کارنامه های تفصیلی</th>
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
                                <td><?php
                                    $author = explode('|', $articleInfo['author']);
                                    echo $articleInfo['subject'] . '<br>' . 'نوشته ' . $author[0];; ?></td>
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
                                    <?php
                                    if ($articles['ejmali1_g1_done'] == 1):
                                        ?>
                                        <div class="flex-1 mb-1">
                                            <button type="button" class="btn btn-primary d-inline-block getEjmaliPoint"
                                                    data-toggle="modal"
                                                    data-post-id="<?php echo $articles['id'] ?>"
                                                    data-rate-level="ej1g1"
                                                    data-rate-type="ejmali"
                                                    data-target="#ejmaliModal">
                                                اجمالی اول گروه اول
                                            </button>
                                        </div>
                                    <?php
                                    endif;
                                    if ($articles['ejmali2_g1_done'] == 1):
                                        ?>
                                        <div class="flex-1 mb-1">
                                            <button type="button" class="btn btn-primary d-inline-block getEjmaliPoint"
                                                    data-toggle="modal"
                                                    data-post-id="<?php echo $articles['id'] ?>"
                                                    data-rate-level="ej2g1"
                                                    data-rate-type="ejmali"
                                                    data-target="#ejmaliModal">
                                                اجمالی دوم گروه اول
                                            </button>
                                        </div>
                                    <?php
                                    endif;
                                    if ($articles['ejmali3_g1_done'] == 1):
                                        ?>
                                        <div class="flex-1 mb-1">
                                            <button type="button" class="btn btn-primary d-inline-block getEjmaliPoint"
                                                    data-toggle="modal"
                                                    data-post-id="<?php echo $articles['id'] ?>"
                                                    data-rate-level="ej3g1"
                                                    data-rate-type="ejmali"
                                                    data-target="#ejmaliModal">
                                                اجمالی سوم گروه اول
                                            </button>
                                        </div>
                                    <?php
                                    endif;
                                    if ($articles['ejmali1_g2_done'] == 1):
                                        ?>
                                        <div class="flex-1 mb-1">
                                            <button type="button" class="btn btn-primary d-inline-block getEjmaliPoint"
                                                    data-toggle="modal"
                                                    data-post-id="<?php echo $articles['id'] ?>"
                                                    data-rate-level="ej1g2"
                                                    data-rate-type="ejmali"
                                                    data-target="#ejmaliModal">
                                                اجمالی اول گروه دوم
                                            </button>
                                        </div>
                                    <?php
                                    endif;
                                    if ($articles['ejmali2_g2_done'] == 1):
                                        ?>
                                        <div class="flex-1 mb-1">
                                            <button type="button" class="btn btn-primary d-inline-block getEjmaliPoint"
                                                    data-toggle="modal"
                                                    data-post-id="<?php echo $articles['id'] ?>"
                                                    data-rate-level="ej2g2"
                                                    data-rate-type="ejmali"
                                                    data-target="#ejmaliModal">
                                                اجمالی دوم گروه دوم
                                            </button>
                                        </div>
                                    <?php
                                    endif;
                                    if ($articles['ejmali3_g2_done'] == 1):
                                        ?>
                                        <div class="flex-1 mb-1">
                                            <button type="button" class="btn btn-primary d-inline-block getEjmaliPoint"
                                                    data-toggle="modal"
                                                    data-post-id="<?php echo $articles['id'] ?>"
                                                    data-rate-level="ej3g2"
                                                    data-rate-type="ejmali"
                                                    data-target="#ejmaliModal">
                                                اجمالی سوم گروه دوم
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php
                                    if ($articles['tafsili1_done'] == 1):
                                        ?>
                                        <button type="button"
                                                class="btn btn-primary d-inline-block mb-1 getTafsiliPoint"
                                                data-toggle="modal"
                                                data-post-id="<?php echo $articles['id'] ?>"
                                                data-rate-level="ta1"
                                                data-rate-type="tafsili"
                                                data-target="#tafsiliModal">
                                            تفصیلی اول
                                        </button>
                                    <?php
                                    endif;
                                    if ($articles['tafsili2_done'] == 1) : ?>
                                        <button type="button"
                                                class="btn btn-primary d-inline-block mb-1 getTafsiliPoint"
                                                data-toggle="modal"
                                                data-post-id="<?php echo $articles['id'] ?>"
                                                data-rate-level="ta2"
                                                data-rate-type="tafsili"
                                                data-target="#tafsiliModal">
                                            تفصیلی دوم
                                        </button>
                                    <?php
                                    endif;
                                    if ($articles['tafsili3_done'] == 1) :
                                        ?>
                                        <button type="button"
                                                class="btn btn-primary d-inline-block mb-1 getTafsiliPoint"
                                                data-toggle="modal"
                                                data-post-id="<?php echo $articles['id'] ?>"
                                                data-rate-level="ta3"
                                                data-rate-type="tafsili"
                                                data-target="#tafsiliModal">
                                            تفصیلی سوم
                                        </button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
        <?php endif; ?>
    </div>
</section>
</div>
<script src="build/js/Report_From_Points.js"></script>
<?php include_once __DIR__ . '/footer.php'; ?>
