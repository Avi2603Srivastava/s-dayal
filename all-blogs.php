<?php require 'layout/header.php'; ?>
<style>
    .about-section {
        background: #fff !important;
    }

    .card-images img:first-child {
        height: 15rem;
        object-fit: cover;
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
                        <h1 class="Times">Blogs</h1>
                    </div>

                </div>
            </div>
        </div>
        <div class="inner-overlay"></div>
        </section>

        <section class="about-page about-inner-section position-relative py-lg-5 py-4 " id="content">

            <div class="container" id="wrapperid">
                <div class="row innerBlog">
                    <?php
                    $awardsData = $WebSettings->getWebServicesData('awardsData', '', '');
                    $arrAwardsData = $awardsData['data'];
                    usort($arrAwardsData, [$WebSettings, 'compareAwardsDates']);
                    foreach ($arrAwardsData as $sh) {
                        if ($sh['categoryname'] == "Blogs") {

                    ?>
                            <div class="col-lg-4">
                                <div class="card mb-3">
                                    <div class="card-images position-relative">
                                        <img src="<?= $sh['attachment'] ?>" class="card-img-top" alt="card-img">
                                        <img src="<?= $WebSettings::IMAGESURL ?>/images/white-logo.png" alt="logo"
                                            class="card-img-top">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title opacity-75"><?= $sh['name'] ?></h5>
                                        <p class="card-text opacity-75 lh-13">
                                            <?= substr(strip_tags($sh['description']), 0, 175) ?>...</p>
                                        <a href="blog-details.php?id=<?= $sh['id'] ?>"
                                            class="bg-white text-theme-primary mb-3 text-white btn px-3 font-semiBold">
                                            Know More &#10093;&#10093;</a>
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