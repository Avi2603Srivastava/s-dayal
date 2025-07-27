<?php require "layout/header.php"; ?>
<style>
    .about-section h3 {
        color: var(--theme-primary);
        text-align: center;
    }

    .about-section p {
        text-align: justify;
    }

    .about-section ul li::before {
        content: "\2611";
        color: var(--theme-primary);
        font-size: 20px;
        margin-right: 10px;
    }

    .about-section ul li {
        list-style: none;
    }

    .fullwidth {
        width: 100%;
        float: left;
    }

    .testimonial-card {
        height: 22.5rem;
    }
    .testimonial-card .card-info{
        height: 6rem;
    }

    .inside-leftMenu {
        text-align: center;
        position: relative;
        background: transparent linear-gradient(180deg, #0B7C2D 0%, #09461B 100%) 0% 0% no-repeat padding-box;
        border-top: 5px solid var(--warning);
        padding: 10px 15px;
        border-radius: 4px;
    }

    .inside-leftMenu-Box {
        width: 100%;
        position: relative;
    }

    .inside-leftMenu-Box ul li {
        width: 100%;
        float: left;
        margin: 7px 0
    }

    .main-page-menu {
        font-size: 17px;
        margin-bottom: 8px;
        margin-top: 10px;
        font-weight: 600;
        padding: 5px;
        color: #fff;
        text-transform: uppercase;
        text-align: left;
    }

    .inside-leftMenu-Box ul li a {
        display: block;
        padding: 5px;
        line-height: 20px;
        font-size: 15px;
        color: #fff;
        -webkit-transition: all 300ms ease-in-out;
        transition: all 300ms ease-in-out;
        text-align: left
    }

    .inside-leftMenu-Box ul li a:hover,
    .inside-leftMenu-Box ul li.leftMenuBtn.leftMenuBtnActive>a,
    .inside-leftMenu-Box ul li a.active-leftPage {
        color: #173E30;
        font-weight: 500;
        background: #fff;
        border-radius: 3px;
        padding-left: 10px;
    }

    .inside-leftMenu-Box ul li.leftMenuBtn a {
        position: relative
    }

    .inside-leftMenu-Box ul li.leftMenuBtn .sec-levelm:after {
        font-family: FontAwesome;
        content: "\f107";
        display: inline-block;
        vertical-align: middle;
        position: absolute;
        right: 10px;
        font-size: 16px
    }


    .inside-leftMenu-Box ul li.leftMenuBtn .leftMenu-drop {
        display: none
    }

    .footer-section {
        margin-top: 0;
    }

    .form-section {
        /* margin-top: -140px; */
        margin-top: 0;
    }

    .footer-wave {
        display: none !important;
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
                        <h1 class="Times">Voices of Our Community</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="inner-overlay"></div>
        </section>

        <section class="about-section about-inner-section about-page position-relative py-lg-5 py-4" id="content">

            <div class="auto-container" id="wrapperid">
                <div class="row align-items-start justify-content-between">

                    <div class="col-md-12">

                        <div class="content  title-content" style="overflow-y: inherit;">
                            <div class="row">
                                <?php
                                $testi = $WebSettings->getWebServicesData('testimonialData', '', '');
                                $data = $testi['data'];
                                usort($data, [$WebSettings, 'compareAwardsDates']);
                                for ($b = 0; $b <= count($data) - 1; $b++) {
                                ?>
                                    <div class="col-md-4">
                                        <div class="testimonial-card p-3 rounded position-relative mb-4">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="card-info">
                                                        <h5 class="font-bold text-theme-primary mb-3"><?= $data[$b]['title'] ?></h5>
                                                        <p class="font-semiBold mb-0 lh-1 opacity-75">
                                                            <?= $data[$b]['parent_name'] ?></p>
                                                        <p class="font-bold fs-6"><?= $data[$b]['child_name'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <img src="<?= $data[$b]['attachment_path'] ?>" alt="img">
                                                </div>
                                                <div class="col-12 pt-5 pt-md-3">
                                                    <p class="lh-13">
                                                        <?= substr(strip_tags($data[$b]['description']), 0, 350) ?>...
                                                    </p>
                                                    <a class="text-theme-primary font-bold"
                                                        href="testimonial-details.php?id=<?= $data[$b]['id'] ?>">
                                                        Read More &#10093;&#10093;</a>
                                                    <img src="<?= $WebSettings::IMAGESURL ?>/images/comma.png" alt="comma">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--main content end //-->

        <?php require "layout/footer.php"; ?>