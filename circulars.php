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
                        <h1 class="Times">Bulletin Board</h1>
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
                    $json = $WebSettings->getWebServicesData('circularServices', '', '');
                    $arrcnt = count($json['studentcircular']);
                    for ($i = 0; $i < $arrcnt; $i++) {


                    ?><div class="col-md-6 col-lg-4 mb-3">
                            <div class="bg-light px-3 py-2 rounded shadow-sm lh-13 border">
                                <a href="circulars-details.php?id=<?php echo $json['studentcircular'][$i]['id'] ?>">
                                    <p class="text-theme-primary mb-1 font-aleo font-bold fs-5">
                                        <?= date("d M Y", strtotime($json['studentcircular'][$i]['date'])) ?>
                                    </p>
                                    <p class="mb-0 fs-6">
                                        <?php echo $json['studentcircular'][$i]['name'] ?>
                                    </p>
                                </a>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </section>
        <!--main content end //-->

        <?php require "layout/footer.php"; ?>