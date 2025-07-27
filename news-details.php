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
                $awardsData = $WebSettings->getWebServicesData('awardsSingleData', $_GET['id'], '');
                $arrAwardsData = $awardsData['data'][0];
                ?>
                <div class="col-md-12 col-lg-12">
                    <div class="card pl-3 shadow-sm flex-row align-items-center circular-card">
                        <div class="pl-3 flex-fill">
                            <div class="circular-link h6 text-theme-primary d-flex">
                                <p
                                    class="circular-date bg-theme-secondary p-4 text-center text-theme-primary text-uppercase mb-0 w-50">
                                    <?= $arrAwardsData['name'] ?>
                                </p>
                                <p
                                    class="circular-date bg-theme-primary p-4 text-center text-light text-uppercase mb-0 w-50">
                                    <?= date('M', strtotime($arrAwardsData['date'])) ?>
                                    <?= date('d', strtotime($arrAwardsData['date'])) ?>
                                </p>
                            </div>
                            <div class="circular-card text-dark font-regular mt-0 flex-fill p-2 text-center">
                                <?= $arrAwardsData['description'] ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--main content end //-->

    <?php require "layout/footer.php"; ?>