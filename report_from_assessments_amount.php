<?php include_once __DIR__ . '/header.php'; ?>
    <!-- Main content -->
    </script>
    <section class="content">
        <div class="card card-success">
            <form method="post">
                <div class="card-header d-flex ">
                    <h3 class="card-title ">گزارش عملکرد ارزیابان جشنواره در دوره</h3>
                    <select class="form-control " style="width: 10%" required title="دوره را انتخاب کنید"
                            id="festival_id"
                            name="festival_id">
                        <option value="" selected disabled>انتخاب کنید</option>
                        <?php
                        $query = mysqli_query($connection_maghalat, 'select * from festival order by id ');
                        foreach ($query as $festival) :
                            ?>
                            <option <?php if (@$_POST['festival_id'] == $festival['id']) echo 'selected' ?>
                                    value="<?php echo $festival['id'] ?>"><?php echo $festival['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button name="festival" type="submit" class="btn btn-primary">انتخاب دوره</button>
                </div>
            </form>
            <?php
            if (isset($_POST['festival']) and !empty($_POST['festival_id'])) :
                $festival = $_POST['festival_id'];
                $query = mysqli_query($connection_maghalat, "select * from fees where festival_id=$festival");
                $fee = mysqli_fetch_array($query);
                $query = mysqli_query($connection_maghalat, "select * from article where festival_id='$festival' order by rate_status desc,grade desc ,avg_ejmali_g1 desc ,avg_ejmali_g2 desc");
                ?>
                <div class="card-body">
                    <?php
                    if (mysqli_num_rows($query) < 1) {
                        echo 'مقاله ای پیدا نشد.';
                    } else {
                        ?>
                        <div style="margin-bottom: 20px; overflow-x: auto">
                            <label>ارزیاب</label>
                            <select id="searchInput1" class="form-control select2"
                                    style="width: 20%;display: inline-block;margin-bottom: 8px">
                                <option value="" disabled selected>بدون فیلتر</option>
                                <?php
                                $raters = mysqli_query($connection_maghalat, "select * from users where approved=1 and (type=1 or type=2) order by family");
                                foreach ($raters as $rater) :
                                    ?>
                                    <option value="<?php echo $rater['id'] ?>"><?php echo "$rater[name] $rater[family]"; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <button class="btn btn-primary" onclick="searchTable()">فیلتر کردن</button>
                        </div>
                        <table class="table table-bordered table-striped display" id="report_from_rates">
                            <thead>
                            <tr style="text-align: center">
                                <th>ارزیاب</th>
                                <th>مشخصات اثر</th>
                                <th>تعداد صفحه</th>
                                <th>وضعیت ارزیابی</th>
                                <th>مبلغ</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $totalPagesNumberEjmaliForEndOfPage = $totalPagesNumberTafsiliForEndOfPage = $totalPagesNumberForEndOfPage = null;
                            foreach ($raters as $rater):
                                $rates = mysqli_query($connection_maghalat, "select * from ssmp_jashnvarehmaghalat.article jma inner join ssmp_magbase.mag_articles ssmpa on jma.article_id=ssmpa.id where
                                                                                                                            ssmpa.festival_id=$festival and
                                                                                                                            (jma.ejmali1_ratercode_g1 = $rater[id] or jma.ejmali2_ratercode_g1 = $rater[id] or jma.ejmali3_ratercode_g1 = $rater[id] or jma.ejmali1_ratercode_g2 = $rater[id] or jma.ejmali2_ratercode_g2 = $rater[id] or jma.ejmali3_ratercode_g2 = $rater[id] or jma.tafsili1_ratercode = $rater[id] or jma.tafsili2_ratercode = $rater[id] or jma.tafsili3_ratercode = $rater[id]); ");

                                // Check if the rater has any rates
                                if (mysqli_num_rows($rates) > 0):
                                    ?>
                                    <tr>
                                    <td class="text-center" rowspan="<?php echo mysqli_num_rows($rates) + 3; ?>">
                                        <?php echo "$rater[name] $rater[family]"; ?>
                                        <br>
                                        <?php
                                        if (!empty($rater['shaba'])) {
                                            echo "شماره شبا: $rater[shaba] <br>";
                                        }
                                        ?>
                                        <?php
                                        if (!empty($rater['bank_id'])) {
                                            echo "شماره حساب: $rater[bank_id] <br>";
                                        }
                                        ?>
                                        <?php
                                        if (!empty($rater['bank_name'])) {
                                            echo "نام بانک: $rater[bank_name]";
                                        }
                                        ?>
                                    </td>
                                    <?php
                                    $totalPagesNumberEjmali = $totalPagesNumberTafsili = $totalPagesNumber = null;
                                    $totalFee = $totalPrice = null;
                                    $totalFeeEjmali = $totalFeeTafsili = $totalRaterPrice = null;
                                    foreach ($rates as $rate):
                                        $totalPagesNumber = abs($rate['number_of_page_in_mag_to'] - $rate['number_of_page_in_mag_from']) + $totalPagesNumber;
                                        ?>
                                        <td><?php echo $rate['subject']; ?></td>
                                        <td class="text-center"><?php echo abs($rate['number_of_page_in_mag_to'] - $rate['number_of_page_in_mag_from']); ?></td>
                                        <td class="text-center"><?php
                                            if ($rate['ejmali1_ratercode_g1'] == $rater['id']) {
                                                echo 'اجمالی اول گروه اول';
                                                $totalPagesNumberEjmali += abs($rate['number_of_page_in_mag_to'] - $rate['number_of_page_in_mag_from']);
                                            } elseif ($rate['ejmali2_ratercode_g1'] == $rater['id']) {
                                                echo 'اجمالی دوم گروه اول';
                                                $totalPagesNumberEjmali += abs($rate['number_of_page_in_mag_to'] - $rate['number_of_page_in_mag_from']);
                                            } elseif ($rate['ejmali3_ratercode_g1'] == $rater['id']) {
                                                echo 'اجمالی سوم گروه اول';
                                                $totalPagesNumberEjmali += abs($rate['number_of_page_in_mag_to'] - $rate['number_of_page_in_mag_from']);
                                            } elseif ($rate['ejmali1_ratercode_g2'] == $rater['id']) {
                                                echo 'اجمالی اول گروه دوم';
                                                $totalPagesNumberEjmali += abs($rate['number_of_page_in_mag_to'] - $rate['number_of_page_in_mag_from']);
                                            } elseif ($rate['ejmali2_ratercode_g2'] == $rater['id']) {
                                                echo 'اجمالی دوم گروه دوم';
                                                $totalPagesNumberEjmali += abs($rate['number_of_page_in_mag_to'] - $rate['number_of_page_in_mag_from']);
                                            } elseif ($rate['ejmali3_ratercode_g2'] == $rater['id']) {
                                                echo 'اجمالی سوم گروه دوم';
                                                $totalPagesNumberEjmali += abs($rate['number_of_page_in_mag_to'] - $rate['number_of_page_in_mag_from']);
                                            } elseif ($rate['tafsili1_ratercode'] == $rater['id']) {
                                                echo 'تفصیلی اول';
                                                $totalPagesNumberTafsili += abs($rate['number_of_page_in_mag_to'] - $rate['number_of_page_in_mag_from']);
                                            } elseif ($rate['tafsili2_ratercode'] == $rater['id']) {
                                                echo 'تفصیلی دوم';
                                                $totalPagesNumberTafsili += abs($rate['number_of_page_in_mag_to'] - $rate['number_of_page_in_mag_from']);
                                            } elseif ($rate['tafsili3_ratercode'] == $rater['id']) {
                                                echo 'تفصیلی سوم';
                                                $totalPagesNumberTafsili += abs($rate['number_of_page_in_mag_to'] - $rate['number_of_page_in_mag_from']);
                                            }
                                            ?></td>
                                        <td class="text-center">
                                            <?php
                                            if ($rate['ejmali1_ratercode_g1'] == $rater['id'] or $rate['ejmali2_ratercode_g1'] == $rater['id'] or $rate['ejmali3_ratercode_g1'] == $rater['id'] or
                                                $rate['ejmali1_ratercode_g2'] == $rater['id'] or $rate['ejmali2_ratercode_g2'] == $rater['id'] or $rate['ejmali3_ratercode_g2'] == $rater['id']) {
                                                $priceType = 'ejmali';
                                                $totalFee = abs($rate['number_of_page_in_mag_to'] - $rate['number_of_page_in_mag_from']) * $fee[$priceType];
                                                echo number_format($totalFee);
                                            } elseif ($rate['tafsili1_ratercode'] == $rater['id'] or $rate['tafsili2_ratercode'] == $rater['id'] or $rate['tafsili3_ratercode'] == $rater['id']) {
                                                $priceType = 'tafsili';
                                                 $totalFee = abs($rate['number_of_page_in_mag_to'] - $rate['number_of_page_in_mag_from']) * $fee[$priceType];
                                                echo number_format($totalFee);
                                            }
                                            ?>
                                        </td>
                                        </tr>
                                    <?php
                                    endforeach; ?>
                                    <tr class="bg-dark">
                                        <td class="text-left">مجموع صفحات ارزیابی شده اجمالی</td>
                                        <td class="text-center"><?php
                                            echo $totalPagesNumberEjmali;
                                            $totalPagesNumberEjmaliForEndOfPage += $totalPagesNumberEjmali;
                                            ?></td>
                                        <td class="text-left">مبلغ اجمالی</td>
                                        <td class="text-center">
                                            <?php  $totalFeeEjmali = $totalPagesNumberEjmali * $fee[$priceType];
                                                echo number_format($totalFeeEjmali);
                                            ?></td>
                                    </tr>
                                    <tr class="bg-dark">
                                        <td class="text-left">مجموع صفحات ارزیابی شده تفصیلی</td>
                                        <td class="text-center"><?php echo $totalPagesNumberTafsili;
                                            $totalPagesNumberTafsiliForEndOfPage += $totalPagesNumberTafsili;
                                            ?></td>
                                        <td class="text-left">مبلغ تفصیلی</td>
                                        <td class="text-center">
                                            <?php $totalFeeTafsili = $totalPagesNumberTafsili * $fee[$priceType];
                                            echo number_format($totalFeeTafsili);
                                            ?></td>
                                    </tr>
                                    <tr class="bg-dark">
                                        <td class="text-left">مجموع صفحات ارزیابی شده (اجمالی و تفصیلی)</td>
                                        <td class="text-center"><?php echo $totalPagesNumber;
                                            $totalPagesNumberForEndOfPage += $totalPagesNumber;
                                            ?></td>
                                        <td class="text-left">مبلغ کل</td>
                                        <td class="text-center"><?php
                                            $totalRaterPrice = $totalFeeEjmali + $totalFeeTafsili;
                                            echo number_format($totalRaterPrice);
                                            $totalPrice += $totalRaterPrice;
                                            ?>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo "$rater[name] $rater[family]"; ?>
                                        </td>
                                        <td colspan="3" class="bg-danger">هیچ ارزیابی انجام نشده است.</td>
                                    </tr>
                                <?php endif;
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                        <table class="table table-bordered table-striped display mt-3">
                            <tr class="text-center">
                                <td>تعداد صفحات کل اجمالی</td>
                                <td>تعداد صفحات کل تفصیلی</td>
                                <td>تعداد صفحات کل اجمالی + تفصیلی</td>
                            </tr>
                            <tr class="text-center">
                                <td><?php echo $totalPagesNumberEjmaliForEndOfPage; ?></td>
                                <td><?php echo $totalPagesNumberTafsiliForEndOfPage; ?></td>
                                <td><?php echo $totalPagesNumberForEndOfPage; ?></td>
                            </tr>
                            <tr class="text-center">
                                <td>جمع کل مبلغ حق الزحمه اجمالی</td>
                                <td>تعداد مبلغ حق الزحمه تفصیلی</td>
                                <td>تعداد مبالغ حق الزحمه اجمالی + تفصیلی</td>
                            </tr>
                            <tr class="text-center">
                                <td><?php echo number_format($totalPagesNumberEjmaliForEndOfPage * $fee['ejmali']) . ' ریال'; ?></td>
                                <td><?php echo number_format($totalPagesNumberTafsiliForEndOfPage * $fee['tafsili']) . ' ریال'; ?></td>
                                <td><?php echo number_format(($totalPagesNumberEjmaliForEndOfPage * $fee['ejmali']) + ($totalPagesNumberTafsiliForEndOfPage * $fee['tafsili'])) . ' ریال'; ?></td>
                            </tr>
                        </table>
                    <?php } ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    </div>
    <script src="build/js/Report_From_Points.js"></script>
<?php include_once __DIR__ . '/footer.php'; ?>