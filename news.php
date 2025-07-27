<?php require 'layout/header.php'; ?>
<style>
    .about-section {
        background: #fff !important;
    }

    .footer-container {
        padding-top: 2rem;
    }
</style>

<!-- Page Title -->
<?php if (isset($pageData['IMAGE']) && $pageData['IMAGE'] != '') { ?>
    <section class="page-title mt-1" style="background-image: url(<?= $pageData['IMAGE'] ?>);">
    <?php } else { ?>
        <section class="page-title mt-1">
        <?php } ?>
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1 class="Times">Latest News</h1>
                    </div>

                </div>
            </div>
        </div>
        <div class="inner-overlay"></div>
        </section>

        <section class="about-page about-inner-section position-relative py-lg-5 py-4 " id="content">

            <div class="container" id="wrapperid">
                <div class="row">
                    <?php
                    $awardsData = $WebSettings->getWebServicesData('awardsData', '', '');
                    $arrAwardsData = $awardsData['data'];
                    usort($arrAwardsData, [$WebSettings, 'compareAwardsDates']);
                    for ($o = 0; $o <= count($arrAwardsData) - 1; $o++) {
                        if ($arrAwardsData[$o]['categoryname'] == "Maruqee News") {
                    ?>
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card pl-3 shadow-sm flex-row align-items-center circular-card">
                                    <p class="circular-date bg-theme-primary p-4 text-center text-light text-uppercase mb-0">
                                        <span class="circular-month mb-0 fs-5"><?= date('M', strtotime($arrAwardsData[$o]['date'])) ?></span>
                                        <br>
                                        <span class="circular_date text-orange pt-1 mb-0 fs-6"><?= date('d', strtotime($arrAwardsData[$o]['date'])) ?> </span>
                                    </p>
                                    <div class="pl-3 flex-fill px-3">
                                        <div class="text-dark circular-link h6 text-theme-primary">
                                            <p class="mb-0 font-weight-bold fs-6 mb-2">
                                                <?= substr(strip_tags($arrAwardsData[$o]['name']), 0, 20) ?>... </p>
                                        </div>
                                        <div class="circular-desc text-dark font-regular mt-0 border-0 shadow-none flex-fill">
                                            <?= substr(strip_tags($arrAwardsData[$o]['description']), 0, 50) ?>...
                                            <a class="text-theme-primary"
                                                href="news-details.php?id=<?= $arrAwardsData[$o]['id'] ?>">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>
        </section>
        <!--main content end //-->

        <?php require "layout/footer.php"; ?>