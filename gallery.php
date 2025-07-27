<?php require 'layout/header.php'; ?>
<style>
    .about-section {
        background: #fff !important;
    }

    .footer-container {
        padding-top: 2rem;
    }

    input:focus {
        outline: none;
        border: none;
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
                        <h1 class="Times">Gallery</h1>
                    </div>

                </div>
            </div>
        </div>
        <div class="inner-overlay"></div>
        </section>

        <section class="about-page about-inner-section position-relative py-lg-5 py-4 " id="content">
            <div class="container" id="wrapperid">
                <div class="row align-items-start justify-content-between">
                    <?php
                    $leftmenuData = $WebSettings->GET_SINGLE_MENU_INTERNAL($pageData['MAINMENUEID']);
                    if (isset($leftmenuData) && $leftmenuData != "<ul id='leftSideMenu'></ul>") {
                    ?>
                        <div class="col-md-3 d-none d-md-block">
                            <div class="row">
                                <div class="col-12">

                                    <div class="leftMenuInnerpage mb-3">
                                        <div class="randomHead">
                                            <h6 class="main-page-menu"><?= $pageData['PARENT_MENU_NAME'] ?></h6>
                                        </div>

                                        <?= $leftmenuData ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="inner-menuBottom p-3 rounded">
                                        <h6 class="text-theme-primary mb-1">
                                            Shambhu Dayal Global School
                                        </h6>
                                        <p class="text-theme-primary mb-0 fw-bold">Ghaziabad, Uttar Pradesh</p>
                                        <a href="https://maps.app.goo.gl/UvZ3iUzCbSY8mvHo9">
                                            <span>
                                                <i class="fa-solid fa-location-dot"></i>
                                            </span>
                                            <span>
                                                Dayanand Nagar, Opp. Nehru Stadium,
                                                Ghaziabad-201001
                                            </span>
                                        </a>
                                        <a href="tel:9870436213">
                                            <span>
                                                <i class="fa-solid fa-phone"></i>
                                            </span>
                                            <span>
                                                +91-9870436213
                                            </span>
                                        </a>
                                        <a href="mailto:sdgsoff@gmail.com">
                                            <span>
                                                <i class="fa-solid fa-envelope"></i>
                                            </span>
                                            <span>
                                                sdgsoff@gmail.com
                                            </span>
                                        </a>
                                        <a class="btn mt-3 font-bold text-white bg-theme-primary d-flex justify-content-between align-items-center"
                                            href="https://maps.app.goo.gl/UvZ3iUzCbSY8mvHo9">
                                            <span>Get Direction</span>
                                            <span class="btn bg-theme-secondary rounded-circle">&#8594;
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-12 my-4">
                                    <div class="data d-flex justify-content-between align-items-center">
                                        <h4 class="text-bold text-theme-primary">Gallery</h4>
                                        <span class="content d-flex align-items-center justify-content-center">
                                            <div class="position-relative btn">
                                                <input type="text" placeholder="Search" class="px-2 py-1">
                                                <span class="icon btn position-absolute py-2">
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </span>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                                <?php
                                $imgcat_arr = $WebSettings->getWebServicesData('imageGalleryCategories', '', '');
                                $arrimgcat = $imgcat_arr['data'];
                                $i = 0;
                                for ($arrcat = 0; $arrcat <= count($arrimgcat) - 1; $arrcat++) {
                                    if ($arrimgcat[$arrcat]['wingid'] == 1) {
                                        $i++;
                                ?>
                                        <div class="col-md-4 col-sm-6 col-12 mb-4">
                                            <a href="gallery-details.php?gal_id=<?php echo $arrimgcat[$arrcat]['id'] ?>">
                                                <div class="activity-gal-card">
                                                    <div class="activity-gal-img"> <img
                                                            src="<?php echo $arrimgcat[$arrcat]['attachment_path']; ?>" alt=""
                                                            class="img-fluid"></div>
                                                    <div class="activity-gal-content">
                                                        <h6 class="mb-0 act-name text-center">
                                                            <?php echo substr($arrimgcat[$arrcat]['name'], 0, 40); ?>...
                                                        </h6>

                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                <?php }
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-12 my-4">
                                    <div class="data d-flex justify-content-end align-items-center">
                                        <!-- <h4 class="text-bold text-theme-primary">Gallery</h4> -->
                                        <span class="searchBox d-flex align-items-center justify-content-center">
                                            <div class="position-relative btn searchBorder">
                                                <input name="search" type="text" placeholder="Search" from="gallery" class="px-2 searchInput py-1">
                                                <span class="icon btn position-absolute galSearch">
                                                    <i class="fa-solid fa-magnifying-glass"></i>
                                                </span>
                                                <div class="searchDiv searchBox" style="display: none;">
                                                    <ul class="SearchUl finalSearchData">
                                                        <li><a href="javascript:void(0)">Searching...</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </span>
                                    </div>
                                </div>

                                <?php
                                $imgcat_arr = $WebSettings->getWebServicesData('imageGalleryCategories', '', '');
                                $arrimgcat = $imgcat_arr['data'];
                                $i = 0;
                                for ($arrcat = 0; $arrcat <= count($arrimgcat) - 1; $arrcat++) {
                                    if ($arrimgcat[$arrcat]['wingid'] == 1) {
                                        $i++;
                                ?>
                                        <div class="col-md-6 col-lg-4 mb-3">
                                            <a href="gallery-details.php?gal_id=<?php echo $arrimgcat[$arrcat]['id'] ?>">
                                                <div class="news-cards rounded position-relative">
                                                    <img src="<?php echo $arrimgcat[$arrcat]['attachment_path']; ?>" alt="card-img"
                                                        class="img-fluid w-100 rounded">
                                                    <span class="news-text">
                                                        <p class="text-center mb-0 w-100 text-white py-2 fs-6">
                                                            <?php echo substr($arrimgcat[$arrcat]['name'], 0, 40); ?>...</p>
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                <?php }
                                }
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!--main content end //-->

        <?php require "layout/footer.php"; ?>