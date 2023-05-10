<?php include_once __DIR__ . '/header.php';
if ($_SESSION['head']==3 or $_SESSION['head']==4 or $_SESSION['head']==5):

if (isset($_GET['ArticleWrongFileSize>10485760'])):
    ?>
    <section class="content">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title" style="text-align: center">حجم فایل مقاله بالاتر از 10 مگابایت است</h3>
            </div>
        </div>
    </section>
<?php elseif (isset($_GET['ArticleWrongFileSize0'])): ?>
    <section class="content">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title" style="text-align: center">حجم فایل مقاله نا معتبر می باشد</h3>
            </div>
        </div>
    </section>
<?php elseif (isset($_GET['ArticleWrongExtension'])): ?>
    <section class="content">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title" style="text-align: center">پسوند مقاله نامعتبر است</h3>
            </div>
        </div>
    </section>
<?php elseif (isset($_GET['ArticleSubmitted'])): ?>
    <section class="content">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title" style="text-align: center">مقالات با موفقیت در سیستم ثبت شدند</h3>
            </div>
        </div>
    </section>
<?php elseif (isset($_GET['ArticleFinded'])): ?>
    <section class="content">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title" style="text-align: center">فایل مقاله تکراری می باشد</h3>
            </div>
        </div>
    </section>
<?php elseif (isset($_GET['EmptyArticleFile'])): ?>
    <section class="content">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title" style="text-align: center">فایل مقاله خالی وارد شده است</h3>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- Main content -->
<section class="content">

    <div class="card card-primary" id="article">
        <div class="card-header">
            <h3 class="card-title">ثبت مقالات</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="#article" role="form" method="post" onsubmit="return countWords()">
            <div class="card-body">
                <center>
                    <table class="table table-bordered">
                        <tr>
                            <th width="20%">نسخه نشریه*</th>
                            <td>
                                <select required class="form-control select2" title="نسخه نشریه را انتخاب کنید"
                                        style="width: 100%;text-align: right" name="mag_version" id="mag_version">
                                    <option selected disabled>انتخاب کنید</option>
                                    <?php
                                    $query = mysqli_query($connection_mag, 'select mag_versions.id,mag_info.name,mag_info.publication_period,mag_versions.publication_number,mag_versions.publication_year from mag_versions inner join mag_info on mag_versions.mag_info_id=mag_info.id where mag_versions.article_submitted=0 and (mag_versions.active=1 or mag_versions.deleted=0) order by mag_info.name asc');
                                    foreach ($query as $mag_items):
                                        ?>
                                        <option <?php if (@$_POST['mag_version'] == $mag_items['id']) echo 'selected'; ?>
                                                value="<?php echo $mag_items['id'] ?>"><?php echo $mag_items['name']; ?>
                                            - <?php echo $mag_items['publication_period']; ?> -
                                            شماره <?php echo $mag_items['publication_number']; ?> -
                                            سال <?php echo $mag_items['publication_year']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td width="10%">
                                <button name="Select_Mag_Version" type="submit" class="btn btn-primary">ثبت مقاله
                                </button>
                            </td>
                        </tr>
                    </table>
                </center>
            </div>
        </form>
    </div>
    <?php if (isset($_POST['Select_Mag_Version'])): ?>
        <form role="form" method="post" action="build/php/inc/Add_Article.php" onsubmit="return ValidateForm()"
              enctype="multipart/form-data">
            <?php
            @$mag_version = $_POST['mag_version'];
            $query = mysqli_query($connection_mag, "select * from mag_versions where id='$mag_version' and article_submitted=0");
            foreach ($query as $version_items) {
            }
            @$number_of_articles = $version_items['number_of_articles'];
            for ($i = 1; $i <= $number_of_articles; $i++):
                ?>
                <center>
                    <p style="background-color: #007bff;color: white;padding: 8px;font-size: 20px"><?php echo 'مقاله ' . $i; ?></p>
                    <table style="width: 80%" class="table table-bordered">
                        <tr>
                            <th>عنوان مقاله*</th>
                            <td>
                                <input title="عنوان مقاله" type="text" class="form-control"
                                       id="subject_<?php echo $i; ?>"
                                       placeholder="عنوان مقاله را وارد کنید" name="subject_<?php echo $i; ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>نوع مقاله*</th>
                            <td>
                                <select class="form-control select2" title="نوع مقاله را انتخاب کنید"
                                        id="type_<?php echo $i; ?>"
                                        name="type_<?php echo $i; ?>">
                                    <option disabled selected>انتخاب کنید</option>
                                    <option>علمی پژوهشی</option>
                                    <option>علمی ترویجی</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>گروه علمی 1*</th>
                            <td>
                                <select class="form-control select2" title="گروه علمی مقاله را انتخاب کنید"
                                        name="scientific_group1_<?php echo $i; ?>"
                                        id="scientific_group_1_<?php echo $i; ?>">
                                    <option disabled selected>انتخاب کنید</option>
                                    <?php
                                    $query = mysqli_query($connection_maghalat, 'select * from scientific_group order by name asc');
                                    foreach ($query as $group_items):
                                        ?>
                                        <option value="<?php echo $group_items['id'] ?>"><?php echo $group_items['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>گروه علمی 2</th>
                            <td>
                                <select class="form-control select2" title="گروه علمی مقاله را انتخاب کنید"
                                        name="scientific_group2_<?php echo $i; ?>"
                                        id="scientific_group_2_<?php echo $i; ?>">
                                    <option disabled selected>انتخاب کنید</option>
                                    <?php
                                    $query = mysqli_query($connection_maghalat, 'select * from scientific_group order by name asc');
                                    foreach ($query as $group_items):
                                        ?>
                                        <option value="<?php echo $group_items['id'] ?>"><?php echo $group_items['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>بخش ویژه</th>
                            <td>
                                <select class="form-control select2"
                                        title='اگر این اثر بخش ویژه است، لطفا عنوان بخش ویژه را انتخاب نمایید'
                                        name="special_type_<?php echo $i; ?>"
                                        id="special_type_<?php echo $i; ?>">
                                    <option>انتخاب کنید</option>
                                    <?php
                                    $query = mysqli_query($connection_maghalat, 'select * from special_type where active=1 order by subject asc');
                                    foreach ($query as $special_type):
                                        ?>
                                        <option value="<?php echo $special_type['id'] ?>"><?php echo $special_type['subject']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>شماره صفحه در نشریه (از)*</th>
                            <td>
                                <input title="شماره صفحه در نشریه (از)" type="number" class="form-control"
                                       id="number_of_page_in_mag_from_<?php echo $i; ?>"
                                       placeholder="شماره صفحه در نشریه (از) را وارد کنید"
                                       name="number_of_page_in_mag_from_<?php echo $i; ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>شماره صفحه در نشریه (تا)*</th>
                            <td>
                                <input title="شماره صفحه در نشریه (تا)" type="number" class="form-control"
                                       id="number_of_page_in_mag_to_<?php echo $i; ?>"
                                       placeholder="شماره صفحه در نشریه (تا) را وارد کنید"
                                       name="number_of_page_in_mag_to_<?php echo $i; ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>زبان*</th>
                            <td>
                                <select class="form-control select2" title="زبان نشریه را انتخاب کنید"
                                        id="language_<?php echo $i; ?>" name="language_<?php echo $i; ?>">
                                    <option disabled selected>انتخاب کنید</option>
                                    <option>فارسی</option>
                                    <option>عربی</option>
                                    <option>انگلیسی</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>فایل مقاله (PDF)*</th>
                            <td>
                                <div class="custom-file">
                                    <input title="فایل جلد نشریه" accept="application/pdf" type="file"
                                           class="custom-file-input" id="article_file_url_<?php echo $i; ?>"
                                           name="article_file_url_<?php echo $i; ?>"
                                           onchange="showname(<?php echo $i; ?>)">
                                    <label id="article_file_url_Name_<?php echo $i; ?>" class="custom-file-label">انتخاب
                                        فایل (دقت داشته باشید که نام فایل های مقاله نباید با هم برابر باشند)</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>چکیده*</th>
                            <td>
                                <textarea title="چکیده" onkeyup="countWords(this.value,<?php echo $i; ?>)"
                                          class="form-control"
                                          rows="3" placeholder="حداکثر 250 کلمه" id="article_body_<?php echo $i; ?>"
                                          name="body_<?php echo $i; ?>"></textarea>
                                <p style="text-align: left" id="show_<?php echo $i; ?>">0/250</p>
                            </td>
                        </tr>
                        <tr>
                            <th>نویسنده</th>
                            <td>
                                <input type="text" style="width: 49%; display: inherit" class="form-control"
                                       id="author_name_<?php echo $i; ?>"
                                       placeholder="نام و نام خانوادگی"
                                       name="author_name_<?php echo $i; ?>">
                                <input type="number" style="width: 50%; display: inherit" class="form-control"
                                       id="author_national_code_<?php echo $i; ?>"
                                       placeholder="کد ملی"
                                       name="author_national_code_<?php echo $i; ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>نوع همکاری</th>
                            <td>
                                <select class="form-control select2" title="نوع همکاری را انتخاب کنید"
                                        onchange="displayrow(this.value,<?php echo $i; ?>)"
                                        id="cooperation_type_<?php echo $i; ?>"
                                        name="cooperation_type_<?php echo $i; ?>">
                                    <option disabled selected>انتخاب کنید</option>
                                    <option>فردی</option>
                                    <option>گروهی</option>
                                </select>
                            </td>
                        </tr>
                        <tr style="display: none" id="display_row_<?php echo $i; ?>">
                            <th>همکاران</th>
                            <td>
                                <?php
                                for ($j = 1; $j <= 6; $j++):
                                    ?>
                                    <input type="text" style="width: 49%; display: inherit" class="form-control"
                                           id="info_cooperator_<?php echo $i . '_' . $j; ?>"
                                           placeholder="نام و نام خانوادگی"
                                           name="info_cooperator_<?php echo $i . '_' . $j; ?>">
                                    <input type="number" style="width: 50%; display: inherit" class="form-control"
                                           id="national_code_cooperator_<?php echo $i . '_' . $j; ?>"
                                           placeholder="کد ملی"
                                           name="national_code_cooperator_<?php echo $i . '_' . $j; ?>">
                                    <br/><br/>
                                <?php endfor; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>انتخاب اثر برای شرکت در جشنواره</th>
                            <td>
                                <select class="form-control select2" title="دوره مورد نظر را انتخاب کنید"
                                        id="select_for_jm_<?php echo $i; ?>"
                                        name="select_for_jm_<?php echo $i; ?>">
                                    <option disabled selected>انتخاب کنید</option>
                                    <?php
                                    $query=mysqli_query($connection_maghalat,"select * from festival order by id asc");
                                    foreach ($query as $festivals):
                                    ?>
                                    <option value="<?php echo $festivals['id'] ?>"><?php echo $festivals['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </center>
            <?php endfor; ?>
            <!-- /.card-body -->
            <center>
                <div class="card-footer">
                    <input type="hidden" value="<?php echo $mag_version ?>" name="mag_version">
                    <input type="hidden" value="<?php echo $number_of_articles ?>" name="number_of_articles">
                    <button name="Sub_Articles"
                            onclick="return confirm('آیا از صحت اطلاعات وارد شده مطمئن هستید؟ مقالات وارد شده پس از ثبت، به نشریه انتخاب شده اختصاص می یابند. این عملیات قابل بازگشت نیست!');"
                            type="submit" class="btn btn-primary">ثبت مقالات در نشریه
                    </button>
                </div>
            </center>
        </form>
    <?php else: ?>
        <p style="background-color: #dc3545;color: white;padding: 8px;font-size: 20px;text-align: center"><?php echo 'نشریه ای برای ثبت انتخاب نشده است '; ?></p>
    <?php endif; ?>

    <!-- /.card -->
</section>
<section class="content">
    <script>
        function versionshow(str) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("version_id").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "build/ajax/showversions.php?magid=" + str, true);
            xmlhttp.send();
        }
    </script>
    <div class="row" id="article_list">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form action="#article_list" method="post" id="search_form" onsubmit="return Check_Search_Submit()">
                        <h3 class="card-title">نمایش و مدیریت مقالات در نشریه:

                            <select id="mag_id" name="mag_id" class="form-control select2"
                                    onchange="versionshow(this.value)"
                                    style="width: 30%;display: inline-block">
                                <option disabled selected>انتخاب کنید</option>
                                <?php
                                $query = mysqli_query($connection_mag, "select * from mag_info inner join mag_versions on mag_info.id=mag_versions.mag_info_id");
                                foreach ($query as $mag_info):
                                    ?>
                                    <option <?php if (@$_POST['mag_id'] == $mag_info['id']) echo 'selected' ?>
                                            value="<?php echo $mag_info['id'] ?>"><?php echo $mag_info['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <select id="version_id" name="version_id" class="form-control select2"
                                    style="width: 30%;display: inline-block">
                                <?php if (isset($_POST['Search_Articles'])) {
                                    $mag_id = $_POST['mag_id'];
                                    $query = mysqli_query($connection_mag, "select * from mag_versions where mag_info_id='$mag_id' order by id desc");
                                    foreach ($query as $version_info) {
                                        if ($version_info['id'] == $mag_id) {
                                            echo "<option selected value=" . $version_info['id'] . ">" . 'شماره' . $version_info['publication_number'] . ' - سال' . $version_info['publication_year'] . "</option>";
                                        } else {
                                            echo "<option value=" . $version_info['id'] . ">" . 'شماره' . $version_info['publication_number'] . ' - سال' . $version_info['publication_year'] . "</option>";
                                        }
                                    }
                                } ?>
                            </select>
                            <button name="Search_Articles" type="submit" class="btn btn-primary">نمایش</button>

                        </h3>
                    </form>
                </div>
                <?php if (isset($_POST['Search_Articles'])): ?>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered table-striped" id="myTable">
                            <tr>
                                <th>ردیف</th>
                                <th>عنوان مقاله</th>
                                <th>نوع مقاله</th>
                                <th>گروه علمی 1</th>
                                <th>گروه علمی 2</th>
                                <th>بخش ویژه</th>
                                <th>شماره صفحه در نشریه (از)*</th>
                                <th>شماره صفحه در نشریه (تا)*</th>
                                <th>زبان</th>
                                <th>چکیده</th>
                                <th>نویسنده</th>
                                <th>نوع همکاری</th>
                                <th>همکاران</th>
                                <th>انتخاب اثر برای شرکت در جشنواره</th>
                                <th>فایل مقاله</th>
                            </tr>
                            <?php
                            $a = 1;
                            $version_id = $_POST['version_id'];
                            $SelectAllArticles = mysqli_query($connection_mag, "select * from mag_articles where mag_version_id='$version_id' order by id asc");
                            foreach ($SelectAllArticles as $Mag_Articles):
                                ?>
                                <tr>
                                    <td><?php echo $a;
                                        $a++; ?></td>
                                    <td>
                                        <?php
                                        echo $Mag_Articles['subject'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $Mag_Articles['type'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $Mag_Articles['scientific_group_1'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $Mag_Articles['scientific_group_2'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $special_type=$Mag_Articles['special_type'];
                                        $query=mysqli_query($connection_maghalat,"select * from special_type where id='$special_type'");
                                        foreach ($query as $Special_Type_Detail){}
                                        echo @$Special_Type_Detail['subject'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $Mag_Articles['number_of_page_in_mag_from'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $Mag_Articles['number_of_page_in_mag_to'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $Mag_Articles['language'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $Mag_Articles['body'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $author=explode('|',$Mag_Articles['author']);
                                        echo $author[0];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $Mag_Articles['cooperation_type'];
                                        ?>
                                    </td>
                                    <td>
                                        <ul>
                                        <?php
                                        if (isset($Mag_Articles['cooperators'])){
                                            $cooperators=explode('|',$Mag_Articles['cooperators']);
                                            for ($c=0;$c<count($cooperators);$c+=2){
                                                echo '<li style="margin-right: 5px">' . @$cooperators[$c] . '</li>';
                                            }
                                        }
                                        ?>
                                        </ul>
                                    </td>
                                    <td <?php
                                        if ($Mag_Articles['selected_for_jm']==1){
                                            echo "style='background-color:green;color:white'";
                                        }
                                            ?>>
                                        <?php
                                        if ($Mag_Articles['selected_for_jm']==1){
                                            $festival_id=$Mag_Articles['festival_id'];
                                            $query=mysqli_query($connection_maghalat,"select * from festival where id='$festival_id'");
                                            foreach ($query as $festival_detail){}
                                            echo 'انتخاب شده برای شرکت در دوره '.$festival_detail['name'];
                                        }
                                        $Mag_Articles['selected_for_jm']=null;
                                        $query=null;
                                        ?>
                                    </td>
                                    <td>
                                        <a id='no-link' style="color: #0a53be" target="_blank" href="<?php
                                        echo 'Files/Mag_Files/'.$Mag_Articles['file_url'];
                                        ?>">
                                            دانلود
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <!-- /.card-body -->
                <?php endif; ?>
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>
</div>


<!-- /.content -->

<!-- /.content-wrapper -->
<!--not completed-->
<script>
    function Check_Search_Submit(){
        var version_id=document.getElementById('version_id').value;
        if (version_id==null || version_id=='' || version_id=='انتخاب کنید'){
            alert ("لطفا نسخه مجله را انتخاب کنید.");
            return false;
        }
    }
</script>
<script src="build/js/CountWords_In_article_manager.js"></script>
<script src="build/js/ShowNameOfFiles_In_article_manager.js"></script>
<script>
    function ValidateForm() {
        <?php for ($i = 1;$i <= $number_of_articles;$i++): ?>
        var subject_<?php echo $i ?> = document.getElementById("subject_<?php echo $i ?>").value;
        var type_<?php echo $i ?> = document.getElementById("type_<?php echo $i ?>").value;
        var scientific_group_1_<?php echo $i ?> = document.getElementById("scientific_group_1_<?php echo $i ?>").value;
        var scientific_group_2_<?php echo $i ?> = document.getElementById("scientific_group_2_<?php echo $i ?>").value;
        var number_of_page_in_mag_from_<?php echo $i ?> = document.getElementById("number_of_page_in_mag_from_<?php echo $i ?>").value;
        var number_of_page_in_mag_to_<?php echo $i ?> = document.getElementById("number_of_page_in_mag_to_<?php echo $i ?>").value;
        var language_<?php echo $i ?> = document.getElementById("language_<?php echo $i ?>").value;
        var article_file_url_<?php echo $i ?> = document.getElementById("article_file_url_<?php echo $i ?>").value;
        var article_body_<?php echo $i ?> = document.getElementById("article_body_<?php echo $i ?>").value;
        var author_name_<?php echo $i ?> = document.getElementById("author_name_<?php echo $i ?>").value;
        var author_national_code_<?php echo $i ?> = document.getElementById("author_national_code_<?php echo $i ?>").value;
        var cooperation_type_<?php echo $i ?> = document.getElementById("cooperation_type_<?php echo $i ?>").value;
        <?php endfor; ?>

        <?php for ($i = 1;$i <= $number_of_articles;$i++): ?>
        document.getElementById("subject_<?php echo $i ?>").style.backgroundColor = 'white';
        document.getElementById("type_<?php echo $i ?>").style.backgroundColor = 'white';
        document.getElementById("scientific_group_1_<?php echo $i ?>").style.backgroundColor = 'white';
        document.getElementById("scientific_group_2_<?php echo $i ?>").style.backgroundColor = 'white';
        document.getElementById("number_of_page_in_mag_from_<?php echo $i ?>").style.backgroundColor = 'white';
        document.getElementById("number_of_page_in_mag_to_<?php echo $i ?>").style.backgroundColor = 'white';
        document.getElementById("language_<?php echo $i ?>").style.backgroundColor = 'white';
        document.getElementById("article_file_url_<?php echo $i ?>").style.backgroundColor = 'white';
        document.getElementById("article_body_<?php echo $i ?>").style.backgroundColor = 'white';
        document.getElementById("author_name_<?php echo $i ?>").style.backgroundColor = 'white';
        document.getElementById("author_national_code_<?php echo $i ?>").style.backgroundColor = 'white';
        document.getElementById("cooperation_type_<?php echo $i ?>").style.backgroundColor = 'white';
        <?php endfor; ?>


        if (subject_1 == '') {
            alert('عنوان مقاله خالی است');
            document.getElementById("subject_1").style.backgroundColor = 'yellow';
            return false;
        } else if (type_1 == 'انتخاب کنید') {
            alert('نوع مقاله انتخاب نشده است');
            document.getElementById("type_1").style.backgroundColor = 'yellow';
            return false;
        } else if (scientific_group_1_1 == 'انتخاب کنید') {
            alert('گروه علمی اول انتخاب نشده است');
            document.getElementById("scientific_group_1_1").style.backgroundColor = 'yellow';
            return false;
        } else if (scientific_group_2_1 == scientific_group_1_1) {
            alert('گروه علمی اول با دوم است');
            document.getElementById("scientific_group_1_1").style.backgroundColor = 'yellow';
            document.getElementById("scientific_group_2_1").style.backgroundColor = 'yellow';
            return false;
        } else if (number_of_page_in_mag_from_1 == '') {
            alert('شماره صفحه در نشریه (از) وارد نشده است');
            document.getElementById("number_of_page_in_mag_from_1").style.backgroundColor = 'yellow';
            return false;
        } else if (number_of_page_in_mag_to_1 == '') {
            alert('شماره صفحه در نشریه (تا) وارد نشده است');
            document.getElementById("number_of_page_in_mag_to_1").style.backgroundColor = 'yellow';
            return false;
        } else if (language_1 == 'انتخاب کنید') {
            alert('زبان انتخاب نشده است');
            document.getElementById("language_1").style.backgroundColor = 'yellow';
            return false;
        } else if (article_file_url_1 == '') {
            alert('فایل مقاله انتخاب نشده است');
            document.getElementById("article_file_url_1").style.backgroundColor = 'yellow';
            return false;
        } else if (article_body_1 == '') {
            alert('چکیده مقاله وارد نشده است');
            document.getElementById("article_body_1").style.backgroundColor = 'yellow';
            return false;
        } else if (author_name_1 == '') {
            alert('نام و نام خانوادگی نویسنده وارد نشده است');
            document.getElementById("author_name_1").style.backgroundColor = 'yellow';
            return false;
        }
        // else if (author_national_code_1 == '') {
        //     alert('کد ملی نویسنده وارد نشده است');
        //     document.getElementById("author_national_code_1").style.backgroundColor = 'yellow';
        //     return false;
        // }
        else if (cooperation_type_1 == 'انتخاب کنید') {
            alert('نوع همکاری وارد نشده است');
            document.getElementById("cooperation_type_1").style.backgroundColor = 'yellow';
            return false;
        }
<!--        --><?php //for ($i = 2;$i <= $number_of_articles;$i++): ?>
//        else if (subject_<?php //echo $i ?>//== '') {
//            alert('عنوان مقاله خالی است');
//            document.getElementById("subject_<?php //echo $i ?>//").style.backgroundColor = 'yellow';
//            return false;
//        } else if (type_<?php //echo $i ?>//== 'انتخاب کنید') {
//            alert('نوع مقاله انتخاب نشده است');
//            document.getElementById("type_<?php //echo $i ?>//").style.backgroundColor = 'yellow';
//            return false;
//        } else if (scientific_group_1_<?php //echo $i ?>//== 'انتخاب کنید') {
//            alert('گروه علمی اول انتخاب نشده است');
//            document.getElementById("scientific_group_1_<?php //echo $i ?>//").style.backgroundColor = 'yellow';
//            return false;
//        } else if (scientific_group_1_<?php //echo $i ?>//== scientific_group_2_<?php //echo $i ?>//) {
//            alert('گروه علمی اول با دوم برابر است');
//            document.getElementById("scientific_group_1_<?php //echo $i ?>//").style.backgroundColor = 'yellow';
//            document.getElementById("scientific_group_2_<?php //echo $i ?>//").style.backgroundColor = 'yellow';
//            return false;
//        } else if (number_of_page_in_mag_from_<?php //echo $i ?>//== '') {
//            alert('شماره صفحه در نشریه (از) وارد نشده است');
//            document.getElementById("number_of_page_in_mag_from_<?php //echo $i ?>//").style.backgroundColor = 'yellow';
//            return false;
//        } else if (number_of_page_in_mag_to_<?php //echo $i ?>//== '') {
//            alert('شماره صفحه در نشریه (تا) وارد نشده است');
//            document.getElementById("number_of_page_in_mag_to_<?php //echo $i ?>//").style.backgroundColor = 'yellow';
//            return false;
//        } else if (language_<?php //echo $i ?>//== 'انتخاب کنید') {
//            alert('زبان انتخاب نشده است');
//            document.getElementById("language_<?php //echo $i ?>//").style.backgroundColor = 'yellow';
//            return false;
//        } else if (article_file_url_<?php //echo $i ?>//== '') {
//            alert('فایل مقاله انتخاب نشده است');
//            document.getElementById("article_file_url_<?php //echo $i ?>//").style.backgroundColor = 'yellow';
//            return false;
//        } else if (article_body_<?php //echo $i ?>//== '') {
//            alert('چکیده مقاله وارد نشده است');
//            document.getElementById("article_body_<?php //echo $i ?>//").style.backgroundColor = 'yellow';
//            return false;
//        } else if (author_name_<?php //echo $i ?>// == '') {
//            alert('نام و نام خانوادگی نویسنده وارد نشده است');
//            document.getElementById("author_name_<?php //echo $i ?>//").style.backgroundColor = 'yellow';
//            return false;
//        } else if (author_national_code_<?php //echo $i ?>// == '') {
//            alert('کد ملی نویسنده وارد نشده است');
//            document.getElementById("author_national_code_<?php //echo $i ?>//").style.backgroundColor = 'yellow';
//            return false;
//        } else if (cooperation_type_<?php //echo $i ?>// == 'انتخاب کنید') {
//            alert('نوع همکاری وارد نشده است');
//            document.getElementById("cooperation_type_<?php //echo $i ?>//").style.backgroundColor = 'yellow';
//            return false;
//        }
//        <?php //endfor; ?>

    }
</script>
<script src="build/js/DisplayRow_In_article_manager.js"></script>

<?php
endif;
include_once __DIR__ . '/footer.php'; ?>
