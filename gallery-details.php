<?php
require "layout/header.php";
$cat_arr = $WebSettings->getWebServicesData('imageGalleryCategoriesSingle', $_GET['gal_id'], '');
$arrcat = $cat_arr['data'][0];
?>

<style>
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
                        <h1 class="Times"><?= $arrcat['name'] ?></h1>
                    </div>

                </div>
            </div>
        </div>
        <div class="inner-overlay"></div>
        </section>

        <section class="about-inner-section about-page position-relative py-lg-5 py-4" id="content">

            <div class="auto-container" id="wrapperid">
                <!-- <div><?= $arrcat['description'] ?></div> -->
                <div class="row" id="gallery">
                    <?php
                    $imgcat_arrimg = $WebSettings->getWebServicesData('imageGalleries', '', '');
                    $arrimgcatimg = $imgcat_arrimg['gallery_data'];

                    foreach ($arrimgcatimg as $key2 => $val2) {
                        if ($val2['category_id'] == $_GET['gal_id']) {
                            $arrattach = $val2['attachement'];
                            for ($j = 0; $j < count($arrattach); $j++) {
                    ?>
                                <div class="col-md-4 col-sm-6 col-12 mb-4">
                                    <div class="bg-theme-primary border gal-single-image rounded shadow">
                                        <a class="lightbox" href="<?php echo $arrattach[$j]['image_universal_url_900']; ?>">
                                            <img src="<?php echo $arrattach[$j]['image_universal_url_900']; ?>" alt="" class="d-block mx-auto" style="height: 200px" />
                                        </a>
                                    </div>
                                </div>
                    <?php }
                        }
                    } ?>
                </div>
            </div>
        </section>
        <!--main content end //-->

        <?php require "layout/footer.php"; ?>