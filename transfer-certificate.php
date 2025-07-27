<?php require "layout/header.php"; ?>
<style>
    .about-section {
        background: #fff !important;
    }

    .footer-container {
        padding-top: 2rem;
    }

    .calendar {
        height: 100vh;
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
                        <h1 class="Times">Transfer Certificate</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="inner-overlay"></div>
        </section>

        <section class="about-page about-inner-section position-relative py-lg-5 py-4 " id="content">

            <div class="container" id="wrapperid">
                <div class="row align-items-center justify-content-center">
                    <div class="col-8 mb-3 text-center">
                        <a class="btn text-center text-white bg-theme-primary border border-1 rounded-3" href="https://resources.edunexttechnologies.com/web-data/s-dayal/transfer-certificate.pdf" target="_blank">Click here to download the Transfer Certificate Template</a>
                    </div>
                    <div class="col-8">
                        <div class="tc border border-1 border-dark rounded-3 p-4">
                            <form action="#" class="tcGetContainer" method="post">
                                <p class="text-muted">Kindly fill all details to download your TC.</p>
                                <div class="mb-3 text-theme-primary font-bold">
                                    <label for="admissionNo">Admission No.:<span>*</span></label> <input
                                        class="form-control text-muted" id="admissionNo"
                                        placeholder="Enter Your Admission No." type="text" />
                                </div>

                                <div class="mb-3 text-theme-primary font-bold"><label for="dob">Date of
                                        Birth:<span>*</span></label>
                                    <input class="form-control  datepicker text-muted" id="dob" placeholder="YYYY-MM-DD"
                                        readonly="readonly" type="text" />
                                </div>
                                <button
                                    class="btn bg-theme-secondary text-theme-primary getTc font-segoe fw-medium px-3 py-1 shadow-sm font-bold"
                                    type="button">Submit</button>
                            </form>

                            <div class="row tcContainer" style="display: none;">
                                <div class="mb-3 col-6"><label for="stuName">Name:</label> <input
                                        class="form-control text-muted" disabled="disabled" id="getstuName"
                                        readonly="readonly" type="text" /></div>

                                <div class="mb-3 col-6"><label for="classname">Class:</label> <input
                                        class="form-control text-muted" disabled="disabled" id="getclassname"
                                        readonly="readonly" type="text" /></div>

                                <div class="mb-3 col-6"><label for="fathername">Father Name:</label> <input
                                        class="form-control text-muted" disabled="disabled" id="getfathername"
                                        readonly="readonly" type="texr" /></div>

                                <div class="mb-3 col-6"><label for="mothername">Mother Name:</label> <input
                                        class="form-control text-muted" disabled="disabled" id="getmothername"
                                        readonly="readonly" type="text" /></div>

                                <div class="col-4"><button
                                        class="downloadBtn btn bg-theme-secondary text-theme-primary font-segoe fw-medium px-3 py-1 shadow-sm font-bold">Download</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--main content end //-->

        <?php require "layout/footer.php"; ?>