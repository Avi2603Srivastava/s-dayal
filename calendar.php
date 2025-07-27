<?php require "layout/header.php"; ?>
<style>
    .about-section {
        background: #fff !important;
    }

    .footer-container {
        padding-top: 2rem;
    }

    .calendar {
        height: 125vh;
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
                        <h1 class="Times">Calendar</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="inner-overlay"></div>
        </section>

        <section class="about-page about-inner-section position-relative py-lg-5 py-4 bg-light" id="content">

            <div class="container" id="wrapperid">

                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 text-center">
                        <div class="calendar">
                            <iframe src="calendar-internal/index.php" class="w-100" frameborder="0" height="100%"
                                width="100%"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--main content end //-->

        <?php require "layout/footer.php"; ?>