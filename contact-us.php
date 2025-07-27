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
                        <h1 class="Times">Contact Us </h1>
                    </div>
                    <!-- <ul class="bread-crumb">
                        <li><a href="index.php">Home</a></li>
                        <li>News & Events</li>
                    </ul> -->
                </div>
            </div>
        </div>
        <div class="inner-overlay"></div>
        </section>
        <div class="about-page">
            <div class="container py-5">
                <div class="mb-4 shadow-sm rounded border">
                   
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3493.449675593508!2d78.72932717529883!3d28.884982675527876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390aff00574a6423%3A0xdb1da37a8157938d!2sCreative%20Campus%20by%20CLG!5e0!3m2!1sen!2sin!4v1739593923346!5m2!1sen!2sin" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-100 d-block rounded shadow-sm"></iframe>
                </div>

                <!-- map and forms  -->
                <div class="row pt-3">
                    <div class="col-12 mb-4">
                        <ul class=" list-unstyled row justify-content-around">
                            <li class="col-md-4 mb-2 d-flex">
                                <div>
                                    <i class="fa fa-map-marker bg-theme-primary text-white rounded-circle mb-2 fa-2x contact-icons mr-3 align-top"></i>
                                </div>
                                <div>
                                    <a href="https://maps.app.goo.gl/pFzmgRiJBgP7aaoi6" target="_blank">
                                        <address class="text-dark d-inline-block mb-0">
                                            <b>xyz public school</b> <br>
                                           address here
                                        </address>
                                    </a>
                                </div>
                            </li>

                            <li class="col-md-4 mb-2 d-flex">
                                <div>
                                    <i class="fa fa-envelope bg-theme-primary text-white rounded-circle mb-2 fa-2x contact-icons align-top mr-3"></i>
                                </div>
                                <div>
                                    <b>Email: </b> <br>
                                    <a href=" info@creativecampus.org.in" class="text-dark"> info@xyz.org.in</a>
                                </div>

                            </li>
                            <li class="col-md-4 d-flex">
                                <div>
                                    <i class="fa fa-phone bg-theme-primary text-white rounded-circle mb-2 fa-2x contact-icons align-top mr-3"></i>
                                </div>
                                <div>
                                    <b>Phone: </b> <br>
                                    <a href="tel:+919999999999" class="text-dark">
                                        +91- 9999999999,
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </section>





    <?php require "layout/footer.php"; ?>