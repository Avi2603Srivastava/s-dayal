<?php require "layout/header.php"; ?>
<link rel="stylesheet" href="assets/css/page.css?v=<?= time() ?>">

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
                        <h1 class="Times"><?= $pageData['PAGE_HEADING'] ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="inner-overlay"></div>
    </section>

    <section class="about-section about-inner-section about-page position-relative py-lg-5 py-4" id="content">

        <div class="auto-container" id="wrapperid">
            <div class="row align-items-start justify-content-between">
                <?php $leftmenuData = $WebSettings->GET_SINGLE_MENU_INTERNAL($pageData['MAINMENUEID']);
                if (isset($leftmenuData) && $leftmenuData != "<ul id='leftSideMenu'></ul>") {
                    ?>
                    <div class="col-lg-3 d-none d-lg-block">
                        <div class="row">
                            <div class="col-12">
                                <div class="leftMenuInnerpage mb-3">
                                    <div class="randomHead mb-4">
                                        <h6 style="border-bottom: 2px dashed #fff;" class="main-page-menu"><?= $pageData['PARENT_MENU_NAME'] ?></h6>
                                    </div>
                                    <?= $leftmenuData ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="inner-menuBottom p-3 rounded">
                                    <h6 class="text-theme-primary mb-3 fs-5">
                                        Shambhu Dayal Global School
                                    </h6>
                                    <p class="text-theme-primary mb-0 fw-bold">Ghaziabad</p>
                                    <a href="https://maps.app.goo.gl/6RL8tKF4ttquWU9w5">
                                        <span>
                                            <img style="height:3.25rem;"
                                                src="<?= $WebSettings::IMAGESURL ?>/images/location.svg" alt="img">
                                        </span>
                                        <span class="lh-sm">Dayanand Nagar, Opp. Nehru Stadium, Ghaziabad-201001</span>
                                    </a>
                                    <a href="tel:9870436213">
                                        <span>
                                            <img src="<?= $WebSettings::IMAGESURL ?>/images/call.svg" alt="img">
                                        </span>
                                        <span>
                                            +91-9870436213
                                        </span>
                                    </a>
                                    <a href="mailto:sdgsoff@gmail.com">
                                        <span>
                                            <img src="<?= $WebSettings::IMAGESURL ?>/images/mail.svg" alt="img">
                                        </span>
                                        <span>
                                            sdgsoff@gmail.com
                                        </span>
                                    </a>
                                    <a class="btn mt-3 font-bold text-white bg-theme-primary d-flex justify-content-between align-items-center"
                                        href="https://maps.app.goo.gl/6RL8tKF4ttquWU9w5">
                                        <span>Get Direction</span>
                                        <span class="btn bg-theme-secondary rounded-circle getdirectionArrow"><span
                                                class="fa fa-long-arrow-up"></span></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="content title-content" style="overflow-y: inherit;">
                            <?= $pageData['PAGE_CONTENT'] ?>
                        </div>
                    </div>
                </div>
                <?php
                } else {
                    ?>
                <div class="col-md-12">

                    <div class="content title-content" style="overflow-y: inherit;">
                        <?= $pageData['PAGE_CONTENT'] ?>
                    </div>
                </div>
                <?php
                }
                ?>
        </div>
        </div>
    </section>
    <!--main content end //-->

    <?php require "layout/footer.php"; ?>