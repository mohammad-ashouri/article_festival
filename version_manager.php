<?php include_once __DIR__ . '/header.php';
if ($_SESSION['head'] == 4 or $_SESSION['head'] == 3 or $_SESSION['head'] == 5):
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
    <?php elseif (isset($_GET['WrongFileSize>10485760'])): ?>
        <section class="content">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title" style="text-align: center">حجم فایل نسخه نشریه بالاتر از 10 مگابایت می
                        باشد</h3>
                </div>
            </div>
        </section>
    <?php elseif (isset($_GET['WrongFileSize0'])): ?>
        <section class="content">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title" style="text-align: center">حجم فایل نسخه نشریه نامعتبر می باشد</h3>
                </div>
            </div>
        </section>
    <?php elseif (isset($_GET['WrongExtension'])): ?>
        <section class="content">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title" style="text-align: center">پسوند فایل نسخه نشریه معتبر نیست.</h3>
                </div>
            </div>
        </section>
    <?php elseif (isset($_GET['VersionAdded'])): ?>
        <section class="content">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title" style="text-align: center">
                        نسخه نشریه
                        <?php echo $_GET['version_name'] ?>
                        با موفقیت اضافه شد.
                    </h3>
                </div>
            </div>
        </section>
    <?php elseif (isset($_GET['finded'])): ?>
        <section class="content">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title" style="text-align: center">نسخه نشریه تکراری می باشد</h3>
                </div>
            </div>
        </section>
    <?php elseif (isset($_GET['EmptyFile'])): ?>
        <section class="content">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title" style="text-align: center">فایل نسخه نشریه انتخاب نشده است</h3>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- Main content -->
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">ثبت نسخه نشریه</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form role="form" method="post" action="build/php/inc/Add_Version.php" onsubmit="return sub_mag_version();"
                  enctype="multipart/form-data">
                <div class="card-body">
                    <center>
                        <table style="width: 80%" class="table table-bordered">
                            <tr>
                                <th>نام نشریه*</th>
                                <td>
                                    <select class="form-control select2" title="نام نشریه را انتخاب کنید"
                                            style="width: 100%;text-align: right" name="mag_name" id="mag_name">
                                        <option selected disabled>انتخاب کنید</option>

                                        <?php
                                        $query = mysqli_query($connection_mag, 'select * from mag_info where active=1 and deleted=0 order by name asc');
                                        foreach ($query as $mag_items):
                                            ?>
                                            <option
                                                value="<?php echo $mag_items['id'] ?>"><?php echo $mag_items['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>سال انتشار*</th>
                                <td>
                                    <div class="input-group" style="width: 100%">
                                        <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-calendar"></i>
                      </span>
                                        </div>
                                        <input class="publicationYear form-control" name="publication_year"
                                               id="publication_year">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>شماره مسلسل*</th>
                                <td>
                                    <input title="شماره نسخه نشریه" type="text" class="form-control"
                                           id="publication_number"
                                           placeholder="شماره نسخه نشریه را وارد کنید" name="publication_number">
                                </td>
                            </tr>
                            <tr>
                                <th>شماره دوره انتشار (سال)*</th>
                                <td>
                                    <input title="شماره دوره انتشار (سال)" type="number" class="form-control"
                                           id="publication_period_year"
                                           placeholder="شماره دوره انتشار (سال) را وارد کنید. (به عنوان مثال: سال 24)"
                                           name="publication_period_year">
                                </td>
                            </tr>
                            <tr>
                                <th>نوبت انتشار در سال*</th>
                                <td>
                                    <input title="شماره دوره نشریه در سال" type="number" class="form-control"
                                           id="publication_period_number" placeholder="مثلا شماره 2"
                                           name="publication_period_number">
                                </td>
                            </tr>
                            <tr>
                                <th>شمارگان صفحه*</th>
                                <td>
                                    <input title="شمارگان صفحه" type="number" class="form-control" id="number_of_pages"
                                           placeholder="شمارگان صفحه نشریه را وارد کنید" name="number_of_pages">
                                </td>
                            </tr>
                            <tr>
                                <th>تعداد مقالات*</th>
                                <td>
                                    <input title="تعداد مقالات" type="number" class="form-control"
                                           id="number_of_articles"
                                           placeholder="تعداد مقاله نشریه را وارد کنید" name="number_of_articles">
                                </td>
                            </tr>
                            <tr>
                                <th>فایل جلد نشریه*</th>
                                <td>
                                    <div class="custom-file">
                                        <input title="فایل جلد نشریه" accept="application/pdf,.jpg,.jpeg" type="file"
                                               class="custom-file-input" id="cover_url" name="cover_url">
                                        <label id="cover_url_label" class="custom-file-label">انتخاب فایل</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>فایل نشریه*</th>
                                <td>
                                    <div class="custom-file">
                                        <input title="فایل نشریه" accept="application/pdf,.doc,.docx" type="file"
                                               class="custom-file-input" id="file_url" name="file_url">
                                        <label id="file_url_label" class="custom-file-label">انتخاب فایل</label>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <input type="file" id="preview" accept="application/pdf" onchange="previewPDF()">
                        <iframe id="pdf-preview"></iframe>

                        <script>
                            function previewPDF() {
                                const fileInput = document.querySelector('#preview');
                                const file = fileInput.files[0];

                                if (file.type.match('pdf.*')) {
                                    const reader = new FileReader();
                                    reader.onload = function(event) {
                                        const buffer = event.target.result;
                                        const typedArray = new Uint8Array(buffer);

                                        PDFJS.getDocument(typedArray).then(function(pdf) {
                                            pdf.getPage(1).then(function(page) {
                                                const canvas = document.createElement('canvas');
                                                const viewport = page.getViewport({ scale: 1.0 });
                                                const context = canvas.getContext('2d');
                                                canvas.width = viewport.width;
                                                canvas.height = viewport.height;
                                                const renderContext = {
                                                    canvasContext: context,
                                                    viewport: viewport
                                                };
                                                page.render(renderContext).then(function() {
                                                    const previewContainer = document.querySelector('#pdf-preview');
                                                    previewContainer.appendChild(canvas);
                                                });
                                            });
                                        });
                                    };
                                    reader.readAsArrayBuffer(file);
                                }
                            }
                        </script>
                    </center>

                </div>
                <!-- /.card-body -->
                <center>
                    <div class="card-footer">
                        <button name="Sub_Mag_Version" type="submit" class="btn btn-primary">ثبت نسخه جدید</button>
                    </div>
                </center>

            </form>
        </div>
        <div class="row" id="versions_list">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <form action="#versions_list" method="post" id="search_form">
                            <h3 class="card-title">نمایش و مدیریت نسخه های نشریه:

                                <select id="mag_name" name="mag_name" class="form-control select2"
                                        style="width: 450px;display: inline-block">
                                    <option disabled selected>انتخاب کنید</option>
                                    <?php
                                    $query = mysqli_query($connection_mag, "select * from mag_info where active=1 ORDER BY name asc");
                                    foreach ($query as $mag_info):
                                        ?>
                                        <option <?php if (@$_POST['mag_name'] == $mag_info['name']) echo 'selected' ?>
                                            value="<?php echo $mag_info['name'] ?>"><?php echo $mag_info['publication_period'] . ' ' . $mag_info['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <button name="Search_Mag_Version" type="submit" class="btn btn-primary">نمایش</button>

                            </h3>
                        </form>
                    </div>
                    <?php if (isset($_POST['Search_Mag_Version'])): ?>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-bordered table-striped text-center" id="myTable">
                                <tr class="text-center">
                                    <th style="width: 35px;">ردیف</th>
                                    <th style="width: 50px;">سال انتشار</th>
                                    <th style="width: 50px;">شماره مسلسل نشریه</th>
                                    <th style="width: 50px;">دوره انتشار (سال)</th>
                                    <th style="width: 50px;">نوبت انتشار در سال</th>

                                    <th style="width: 45px;">شمارگان صفحه</th>
                                    <th style="width: 50px;">تعداد مقالات</th>
                                    <th>فایل جلد نشریه</th>
                                    <th>فایل نشریه</th>
                                    <th>عملیات</th>
                                </tr>
                                <?php
                                $a = 1;
                                $mag_name = $_POST['mag_name'];
                                $SelectAllMagVersions = mysqli_query($connection_mag, "select mag_versions.id,mag_versions.publication_period_year,mag_versions.publication_period_number,mag_versions.publication_number,
                                                                    mag_versions.publication_year,mag_versions.number_of_pages,mag_versions.number_of_articles,
                                                                    mag_versions.cover_url,mag_versions.file_url,mag_versions.article_submitted 
                                                                    from mag_versions inner join mag_info on mag_versions.mag_info_id = mag_info.id
                                                                    where mag_info.name='$mag_name' and (mag_versions.active=1 or mag_versions.deleted=0)
                                                                    order by mag_versions.publication_year,mag_versions.publication_number desc");
                                foreach ($SelectAllMagVersions as $Mag_Version):
                                    ?>
                                    <tr>
                                        <th><?php echo $a;
                                            $a++; ?>
                                        </th>
                                        <td>
                                            <?php
                                            echo $Mag_Version['publication_year'];
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $Mag_Version['number_of_pages'];
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $Mag_Version['publication_period_year'];
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $Mag_Version['publication_period_number'];
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $Mag_Version['publication_number'];
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $Mag_Version['number_of_articles'];
                                            ?>
                                        </td>
                                        <td>
                                            <a id='no-link' style="color: #0a53be" target="_blank" href="<?php
                                            echo $Mag_Version['cover_url'];
                                            ?>">
                                                دانلود
                                            </a>
                                        </td>
                                        <td>
                                            <a id='no-link' style="color: #0a53be" target="_blank" href="<?php
                                            echo $Mag_Version['file_url'];
                                            ?>">
                                                دانلود
                                            </a>
                                        </td>
                                        <td>
                                            <?php if ($Mag_Version['article_submitted'] != 1): ?>
                                                <button type="button" class="btn btn-primary d-inline-block"
                                                        data-toggle="modal"
                                                        onclick="getInfo(<?php echo $Mag_Version['id'] ?>)"
                                                        data-target="#editModal">
                                                    جزئیات و ویرایش
                                                </button>
                                                <button type="button" class="btn btn-danger d-inline-block"
                                                        data-toggle="modal"
                                                        data-version-id="<?php echo $Mag_Version['id'] ?>"
                                                        data-target="#deleteVersionModal" id="deleteVersion">
                                                    حذف
                                                </button>
                                                <form id="editVersionForm">
                                                    <div class="modal fade" id="editModal" tabindex="-1"
                                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content" style="width: 800px">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                        ویرایش
                                                                        اطلاعات نسخه نشریه</h1>
                                                                    <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table style="width: 100%"
                                                                           class="table table-bordered">
                                                                        <tr>
                                                                            <th>نام نشریه*</th>
                                                                            <td>
                                                                                <select disabled
                                                                                        class="form-control select2"
                                                                                        title="نام نشریه را انتخاب کنید"
                                                                                        style="width: 100%;text-align: right"
                                                                                        name="mag_name"
                                                                                        id="editedMagInfoId">
                                                                                    <?php
                                                                                    $query = mysqli_query($connection_mag, 'select * from mag_info');
                                                                                    foreach ($query as $mag_items):
                                                                                        ?>
                                                                                        <option
                                                                                            value="<?php echo $mag_items['id'] ?>"><?php echo $mag_items['name']; ?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>شماره دوره انتشار (سال)*</th>
                                                                            <td>
                                                                                <input title="شماره دوره انتشار (سال)"
                                                                                       type="number"
                                                                                       class="form-control"
                                                                                       id="editedPublicationPeriodYear"
                                                                                       placeholder="شماره دوره انتشار (سال) را وارد کنید. (به عنوان مثال: سال 24)"
                                                                                       name="publication_period_year">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>شماره دوره نشریه در سال*</th>
                                                                            <td>
                                                                                <input title="شماره دوره نشریه در سال"
                                                                                       type="number"
                                                                                       class="form-control"
                                                                                       id="editedPublicationPeriodNumber"
                                                                                       placeholder="مثلا شماره 2"
                                                                                       name="publication_period_number">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>شماره نسخه نشریه*</th>
                                                                            <td>
                                                                                <input title="شماره نسخه نشریه"
                                                                                       type="text"
                                                                                       class="form-control"
                                                                                       id="editedPublicationNumber"
                                                                                       placeholder="شماره نسخه نشریه را وارد کنید"
                                                                                       name="publication_number">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>سال انتشار*</th>
                                                                            <td>
                                                                                <div class="input-group"
                                                                                     style="width: 100%">
                                                                                    <div class="input-group-prepend">
                                                                                  <span class="input-group-text">
                                                                                    <i class="fa fa-calendar"></i>
                                                                                  </span>
                                                                                    </div>
                                                                                    <input
                                                                                        class="publicationYear form-control"
                                                                                        name="publication_year"
                                                                                        id="editedPublicationYear">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>شمارگان صفحه*</th>
                                                                            <td>
                                                                                <input title="شمارگان صفحه"
                                                                                       type="number"
                                                                                       class="form-control"
                                                                                       id="editedNumberOfPages"
                                                                                       placeholder="شمارگان صفحه نشریه را وارد کنید"
                                                                                       name="number_of_pages">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>تعداد مقالات*</th>
                                                                            <td>
                                                                                <input title="تعداد مقالات"
                                                                                       type="number"
                                                                                       class="form-control"
                                                                                       id="editedNumberOfArticles"
                                                                                       placeholder="تعداد مقاله نشریه را وارد کنید"
                                                                                       name="number_of_articles">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th rowspan="2">فایل جلد نشریه*</th>
                                                                            <td>
                                                                                <a href="" id='no-link'
                                                                                   style="color: #0a53be"
                                                                                   class="editedCoverUrl"
                                                                                   target="_blank">
                                                                                    دانلود فایل بارگذاری شده
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>

                                                                            <td>
                                                                                <div class="custom-file">
                                                                                    <input title="فایل جلد نشریه"
                                                                                           accept="application/pdf,.jpg,.jpeg"
                                                                                           type="file"
                                                                                           class="custom-file-input"
                                                                                           id="editedCoverUrl2"
                                                                                           name="cover_url">
                                                                                    <label id="editedCoverUrl2_label"
                                                                                           class="custom-file-label">انتخاب
                                                                                        فایل</label>
                                                                                </div>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <th rowspan="2">فایل نشریه*</th>
                                                                            <td>
                                                                                <a href="" id='no-link'
                                                                                   style="color: #0a53be"
                                                                                   class="editedFileUrl"
                                                                                   target="_blank">
                                                                                    دانلود فایل بارگذاری شده
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <div class="custom-file">
                                                                                    <input title="فایل نشریه"
                                                                                           accept="application/pdf,.doc,.docx"
                                                                                           type="file"
                                                                                           class="custom-file-input"
                                                                                           id="editedFileUrl2"
                                                                                           name="file_url">
                                                                                    <label id="editedFileUrl2_label"
                                                                                           class="custom-file-label">انتخاب
                                                                                        فایل</label>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <input type="hidden" id="editedVersionID">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            aria-hidden="true" id="closeModal"
                                                                            data-bs-dismiss="modal">بستن
                                                                    </button>
                                                                    <button type="button" id="updateVersion"
                                                                            class="btn btn-primary">
                                                                        ذخیره تغییرات
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            <?php else: ?>
                                                <div
                                                    title="به دلیل ثبت مقاله برای این نسخه، امکان ویرایش اطلاعات وجود ندارد."
                                                    class="alert alert-danger d-inline-block" role="alert">
                                                    امکان ویرایش وجود ندارد
                                                </div>
                                            <?php endif; ?>
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
    <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
    <!--not completed-->
    <script>
        $(document).ready(function () {
            $('.modal-toggle').click(function () {
                $('#editModal').modal('toggle');
            });
        });
    </script>
    <script src="build/js/Set_Mag_Version_Scripts.js"></script>
    <script src="build/js/GetVersionInfo.js"></script>
    <script src="build/js/UpdateVersionInfo.js"></script>
    <script src="build/js/Delete_Version.js"></script>
<?php
endif;
include_once __DIR__ . '/footer.php'; ?>
