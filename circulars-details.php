<?php require "layout/header.php"; ?>
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
                        <h1 class="Times"> Bulletin Board</h1>
                    </div>

                </div>
            </div>
        </div>
        <div class="inner-overlay"></div>
        </section>

        <section class="about-page about-inner-section position-relative py-lg-5 py-4 " id="content">

            <div class="container" id="wrapperid">

                <div class="row justify-content-center">
                    <?php
                    $json = $WebSettings->getWebServicesData('circularServices', '', '');
                    $arrcnt = count($json['studentcircular']);
                    for ($i = 0; $i < $arrcnt; $i++) {
                        if ($_GET['id'] == $json['studentcircular'][$i]['id']) {

                    ?>
                            <div class="col-md-8 mb-3">
                                <div class="card px-3 py-2 shadow-sm lh-13">
                                    <p class="text-theme-primary mb-1 font-aleo font-weight-bold fs-5 font-bold"> <?= date("d M Y", strtotime($json['studentcircular'][$i]['date'])) ?> </p>
                                    <p class="mb-0 fw-bold mt-1"><?php echo $json['studentcircular'][$i]['name']; ?></p>
                                    <div class="card-text div_card_text mt-0 border-0 shadow-none">
                                        <?php echo $json['studentcircular'][$i]['description']; ?>
                                        <!-- <a href="circular-single.php?id=<?= $json['studentcircular'][$i]['id'] ?>">Read more</a> -->
                                        <?php if (count($json['studentcircular'][$i]['attachment_array']) > 0) { ?>
                                            <a class="btn btn-outline-success mb-md-0 mb-3 mr-3 mt-2 d-block" href="<?php echo $json['studentcircular'][$i]['attachment_array'][0]['cloud_front_serving_url'];   ?>"><span class="mr-1 text-small"><i class="fa fa-link"></i></span>
                                                Download Attachment</a>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                    <?php }
                    }
                    ?>
                </div>
            </div>
        </section>
        <!--main content end //-->


        <?php require "layout/footer.php"; ?>