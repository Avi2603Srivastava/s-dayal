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

    .Times {
        position: absolute;
        left: 50%;
        bottom: 5%;
        transform: translate(-50%, 0%);
        background: var(--theme-secondary);
        color: var(--theme-primary);
        padding: 0px 100px;
        border-left: 4px solid var(--theme-primary);
        border-right: 4px solid var(--theme-primary);
    }

    .fullwidth {
        width: 100%;
        float: left;
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
    .content img{
        height: 20rem !important;
        width: 100% !important;
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
                        <h1 class="Times" id="filteredDataName"></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="inner-overlay"></div>
        </section>

        <section class="about-section about-inner-section about-page position-relative py-lg-5 py-4" id="content">
            <div class="auto-container" id="wrapperid">
                <div class="row align-items-start justify-content-between">

                    <div class="col-lg-3 d-none d-lg-block">
                        <div class="row">
                            <div class="col-12">
                                <div class="leftMenuInnerpage mb-3">
                                    <div class="randomHead mb-4">
                                        <h6 style="border-bottom: 2px dashed #fff;" class="main-page-menu">Lab</h6>
                                    </div>
                                    <ul id="leftSideMenu">
                                        <?php
                                        $labData = $WebSettings->getWebServicesData('awardsData', '', '');
                                        $data = $labData['data'];
                                        usort($data, [$WebSettings, 'compareAwardsDates']);
                                        $ncount = 0;
                                        foreach ($data as $sh) {
                                            if ($sh['categoryname'] == "Labs") {
                                                $ncount++;
                                                $activeClass = $ncount == "1" ? "class='active-leftPage'" : "";
                                                echo "<li class='getLabData' lab-data=" . $WebSettings->encrypt($sh['id']) . "><a " . $activeClass . " href='javascript:void(0)'>" . $sh['name'] . "</a></li>";
                                            }
                                        } ?>
                                    </ul>
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
                                        <span>Dayanand Nagar, Opp. Nehru Stadium, Ghaziabad-201001</span>
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
                        <div id="filteredData" class="content title-content" style="overflow-y: inherit;"></div>
                    </div>
                </div>
            </div>
        </section>
        <!--main content end //-->

        <?php require "layout/footer.php"; ?>
        <script>
            getlabData($('#leftSideMenu').children().first().attr('lab-data'));
        </script>