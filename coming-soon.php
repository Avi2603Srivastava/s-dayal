<?php require "layout/header.php"; ?>
<style>
    .contact-icons {
        width: 35px;
        height: 35px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        font-size: 1.1rem;
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

<!-- Breadcrumbs Start -->
<?php if (isset($pageData['IMAGE']) && $pageData['IMAGE'] != '') { ?>
    <section class="page-title mt-1" style="background-image: url(<?= $pageData['IMAGE'] ?>);">
    <?php } else { ?>
        <section class="page-title mt-1">
        <?php } ?>
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1 class="Times"><?= $pageData['PAGE_TITLE'] ?> </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="inner-overlay"></div>
        </section>
        <div class="about-page">
            <div class="container py-5 text-center">
                <img src="https://resources.edunexttechnologies.com/web-data/modern-academy/images/coming-soon.png" alt="" style="width: 90%; max-width: 320px;">
            </div>

        </div>
    </section>





    <?php require "layout/footer.php"; ?>