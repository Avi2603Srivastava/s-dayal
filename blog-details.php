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
                        <h1 class="Times">Blog</h1>
                    </div>

                </div>
            </div>
        </div>
        <div class="inner-overlay"></div>
        </section>

        <section class="about-page about-inner-section position-relative py-lg-5 py-4 " id="content">

            <div class="container" id="wrapperid">
                <div class="row align-items-center justify-content-center">
                    <?php
                    $awardsData = $WebSettings->getWebServicesData('awardsSingleData', $_GET['id'], '');
                    $arrAwardsData = $awardsData['data'][0];
                    ?>
                    <div class="col-12">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-images position-relative h-100">
                                        <img src="<?= $arrAwardsData['attachment'] ?>" class="card-img-top w-100 h-100 img-fluid rounded" alt="card-img">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title opacity-75"><?= $arrAwardsData['name'] ?></h5>
                                        <p class="card-text opacity-75 lh-13"><?= $arrAwardsData['description'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </section>
        <!--main content end //-->

        <?php require "layout/footer.php"; ?>