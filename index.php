<?php require 'layout/header.php'; ?>



<!-- popup section  -->

<?php
$pop_arr = $WebSettings->getWebServicesData('popupData', '', '');
$arrpop = $pop_arr['data'];
$popupcount = count($arrpop);
if ($popupcount < 0) {
?>

    <div class="modal fade" id="newmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center bg-light p-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            $j = 0;
                            //  echo count($arrpop); die;
                            for ($i = (count($arrpop) - 1); $i >= 0; $i--) {
                            ?>
                                <div class="carousel-item  <?php if ($j == 0) {
                                                                echo 'active';
                                                            } ?>">
                                    <a href="<?= $arrpop[$i]['popup_web_url'] ?>" target="_blank"> <img
                                            src="<?= $arrpop[$i]['attachment'] ?>" class="d-block w-100" alt=""></a>
                                </div>
                            <?php $j++;
                            } ?>

                        </div>
                        <!--<a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- Main Slider ------------------ -->
<div class="mainSlider position-relative">
    <!-- <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $slide = $WebSettings->getWebServicesData('websiteSliders', '', '');
            $sdata = $slide['data'];
            usort($sdata, [$WebSettings, 'compareSeq']);
            $mi = 0;
            foreach ($sdata as $sh) {
                $mi++;
            ?>
                <div class="carousel-item <?= $mi == 1 ? "active" : "" ?>">
                    <img src="<?= $sh['attachment'] ?>" class="d-block w-100" alt="img-slider">
                    <span class="text-center text-nowrap"><?= $sh['name'] ?></span>
                </div>
            <?php } ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> -->
    <div class="embed-responsive embed-responsive-16by9">
        <video autoplay loop muted class="embed-responsive-item w-100">
            <source src="https://resources.edunexttechnologies.com/web-data/s-dayal/video/s-dayal-video.mp4" type="video/mp4">
        </video>
    </div>
    <div class="marquee w-75 rounded-pill">
        <div class="container-fluid p-0">
            <a href="news.php"
                class="d-none d-sm-inline marquee-title font-semiBold rounded-top bg-theme-primary-light text-theme-primary px-2 py-1">
                <i class="fa-solid fa-globe"></i> Latest News
            </a>
            <div class="text-light rounded-pill d-flex align-items-center">
                <marquee behavior="scroll" onmouseover="this.stop();" onmouseout="this.start();" scrollamount="5"
                    direction="left" class="py-2">
                    <?php
                    $awardsData = $WebSettings->getWebServicesData('awardsData', '', '');
                    $arrAwardsData = $awardsData['data'];
                    usort($arrAwardsData, [$WebSettings, 'compareAwardsDates']);
                    for ($o = 0; $o <= count($arrAwardsData) - 1; $o++) {
                        if ($arrAwardsData[$o]['categoryname'] == "Maruqee News") {
                    ?>
                            <a href="news-details.php?id=<?= $arrAwardsData[$o]['id'] ?>" class="marquee-main pe-4 text-dark">
                                <span><?= date('d', strtotime($arrAwardsData[$o]['date'])) ?></span>
                                <span class="px-1"><?= date('M', strtotime($arrAwardsData[$o]['date'])) ?></span>
                                <span>|</span>
                                <span
                                    class="ps-1 font-medium"><?= substr(strip_tags($arrAwardsData[$o]['name']), 0, 200) ?>...</span>
                            </a>
                    <?php }
                    } ?>
                </marquee>
            </div>
        </div>
    </div>
</div>

<div class="menuLogin d-block d-lg-none">
    <div class="container-fluid">
        <div class="row text-nowrap py-4">
            <div class="col-6">
                <a class="bg-theme-primary mb-2 text-light btn rounded-1 w-100" target="_blank"
                    href="https://sdgsg.edunexttechnologies.com/DirectStudentOnlineFeeInstallmentwise">
                    Online Fee Payment
                </a>
            </div>
            <div class="col-6">
                <a class="bg-theme-primary mb-2 text-light btn rounded-1 w-100" class="d-none d-sm-inline"
                    target="_blank" href="https://sdgsg.edunexttechnologies.com/mvc/std/DynamicEnquiryForm">
                    Admission Enquiry
                </a>
            </div>
            <div class="col-6">
                <a class="bg-theme-primary mb-2 text-light btn rounded-1 w-100" class="d-none d-sm-inline"
                    target="_blank" href="mandatory-disclosure">Mandatory Disclosure
                </a>
            </div>
            <div class="col-6">
                <a class="bg-theme-primary mb-2 text-light btn rounded-1 w-100" target="_blank"
                    href="https://sdgsg.edunexttechnologies.com/Index">
                    ERP<sup>TM</sup>
                    Login
                </a>
            </div>
        </div>
    </div>
</div>

<!-- About Section ----------------- -->
<section class="aboutPart py-0 px-lg-5">
    <div class="container-fluid px-lg-5">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6">
                <div class="about-us position-relative p-0 p-lg-5 wow fadeInRightBig" data-wow-duration="2s">
                    <h5 class="topHead font-bold">About</h5>
                    <h4 class="font-bold">SHAMBHU DAYAL GLOBAL SCHOOL</h4>
                    <p>
                        For over 105 years since 1917, SHAMBHU DAYAL HIGH SCHOOL ASSOCIATION has been recognized as the
                        top best CBSE school in Ghaziabad. It has touched the lives of young people from all corners of
                        the city and from all walks of life who come to this esteemed institution to live and learn
                        together. As a top CBSE affiliated school in Ghaziabad, the school boasts a well-constructed
                        campus with diverse learning spaces designed to deliver outstanding and world-class education,
                        catering to every possible interest and talent.
                    </p>
                    <a class="bg-theme-primary mb-3 text-white btn px-3 font-semiBold" href="about-school">Know More
                        &#10093;&#10093;</a>
                    <div class="about-img">
                        <img src="<?= $WebSettings::IMAGESURL ?>/images/logo-transp.png" alt="logo">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 p-0 py-1">
                <img src="<?= $WebSettings::IMAGESURL ?>/images/shambhu.png" alt="school" class="img-fluid wow fadeInLeftBig" data-wow-duration="2s">
            </div>
        </div>
    </div>
</section>

<!-- Education Section ------------------ -->
<section class="education py-3 py-md-5">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center mb-3">
                <h5 class="topHead font-bold">Educational</h5>
                <h4>ALLIANCES</h4>
            </div>
            <div class="col-12">
                <div class="education-owl owl-carousel owl-theme owl-loaded wow bounceInRight" data-wow-duration="2s">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">
                            <div class="owl-item">
                                <div class="education-card bg-white py-4 px-5 rounded-3 d-inline-block">
                                    <img src="<?= $WebSettings::IMAGESURL ?>/images/edu.png" alt="logo">
                                </div>
                            </div>
                            <div class="owl-item">
                                <div class="education-card bg-white py-4 px-5 rounded-3 d-inline-block">
                                    <img src="<?= $WebSettings::IMAGESURL ?>/images/ero.png" alt="logo">
                                </div>
                            </div>
                            <div class="owl-item">
                                <div class="education-card bg-white py-4 px-5 rounded-3 d-inline-block">
                                    <img src="<?= $WebSettings::IMAGESURL ?>/images/Microsoft.png" alt="logo">
                                </div>
                            </div>
                            <div class="owl-item">
                                <div class="education-card bg-white py-4 px-5 rounded-3 d-inline-block">
                                    <img src="<?= $WebSettings::IMAGESURL ?>/images/CBSE-Color.png" alt="logo">
                                </div>
                            </div>
                            <div class="owl-item">
                                <div class="education-card bg-white py-4 px-5 rounded-3 d-inline-block">
                                    <img src="<?= $WebSettings::IMAGESURL ?>/images/ib-school.png" alt="logo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Message Section ----------------- -->
<section class="message py-3 py-md-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="message-owl owl-carousel owl-theme owl-loaded">
                    <div class="owl-stage-outer py-2">
                        <div class="owl-stage">
                            <div class="owl-item">
                                <div class="message-card d-flex align-items-center position-relative wow fadeInLeftBig" data-wow-duration="2s">
                                    <img src="<?= $WebSettings::IMAGESURL ?>/images/president.png" alt="president">
                                    <div class="message-inner px-3 text-light bg-theme-primary w-100">
                                        <h5>Mr.Dharampal Garg</h5>
                                        <h6 class="topHead font-bold text-light opacity-75 position-relative">President
                                        </h6>
                                        <p class="fs-6 opacity-75 w-100">We inspire and Educate Children to wards
                                            achievement.</p>
                                        <a class="bg-theme-secondary text-theme-primary btn px-3 font-semiBold"
                                            href="president-message">Read More
                                            &#10093;&#10093;</a>
                                        <img src="<?= $WebSettings::IMAGESURL ?>/images/comma.png" alt="comma">
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item">
                                <div class="message-card d-flex align-items-center position-relative wow fadeInLeftBig" data-wow-duration="2s">
                                    <img src="<?= $WebSettings::IMAGESURL ?>/images/manager.png" alt="president">
                                    <div class="message-inner px-3 text-light bg-theme-primary w-100">
                                        <h5>Mr. Rakesh Garg</h5>
                                        <h6 class="topHead font-bold text-light opacity-75 position-relative">Manager
                                        </h6>
                                        <p class="fs-6 opacity-75 w-100">We aim to develop curious, caring and
                                            knowledgeable
                                            Children to
                                            create a better and peaceful world.</p>
                                        <a class="bg-theme-secondary text-theme-primary btn px-3 font-semiBold"
                                            href="manager-message">Read More
                                            &#10093;&#10093;</a>
                                        <img src="<?= $WebSettings::IMAGESURL ?>/images/comma.png" alt="comma">
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item">
                                <div class="message-card d-flex align-items-center position-relative wow fadeInLeftBig" data-wow-duration="2s">
                                    <img src="<?= $WebSettings::IMAGESURL ?>/images/principal.png" alt="president">
                                    <div class="message-inner px-3 text-light bg-theme-primary w-100">
                                        <h5>Dr. Jyotsna Sharma</h5>
                                        <h6 class="topHead font-bold text-light opacity-75 position-relative">Principal
                                        </h6>
                                        <p class="fs-6 opacity-75 w-100">We combine an ambitious academic education with
                                            pastoral care which values every individual.</p>
                                        <a class="bg-theme-secondary text-theme-primary btn px-3 font-semiBold"
                                            href="principal-message">
                                            Read More &#10093;&#10093;
                                        </a>
                                        <img src="<?= $WebSettings::IMAGESURL ?>/images/comma.png" alt="comma">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Celebration Section ------------------ -->
<section class="celebration py-3 py-md-5">
    <div class="container">
        <div class="row align-items-start justify-content-center">
            <div class="col-md-6 col-lg-4 my-2 my-lg-0 wow fadeInRightBig" data-wow-duration="2s">
                <div class="calendarPart text-center">
                    <h5 class="topHead">Academic</h5>
                    <h4 class="mb-3">CALENDAR</h4>
                    <div class="calendar-parent">
                        <div class="calendar-ifr rounded bg-white">
                            <iframe src="calendar/index.php" class="w-100" frameborder="0" height="390"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 my-2 my-lg-0 wow fadeInRightBig" data-wow-duration="2s">
                <div class="birthdayPart text-center mt-5 mt-md-0">
                    <h5 class="topHead">Birthday</h5>
                    <h4 class="mb-3">CELEBRATIONS</h4>
                    <div class="birthday-owl owl-carousel owl-theme owl-loaded">
                        <div class="owl-stage-outer">
                            <div class="owl-stage">
                                <?php
                                $getBirthday = $WebSettings->getWebServicesData('birthdayAll', '', '');
                                $arrcnt = count($getBirthday['birthdaystudentarray']);
                                if ($arrcnt > 0) {
                                    for ($i = 0; $i < $arrcnt; $i++) {
                                ?>
                                        <div class="owl-item">
                                            <div class="birth-card rounded text-center d-flex flex-column align-items-center">
                                                <img src="<?= $WebSettings::IMAGESURL ?>/images/hb.png" alt="icon"
                                                    class="img-fluid my-4">
                                                <img src="<?php if ($getBirthday['birthdaystudentarray'][$i]['studentimage'] != '') {
                                                                echo $getBirthday['birthdaystudentarray'][$i]['studentimage'];
                                                            } else {
                                                                echo $WebSettings::IMAGESURL . "/images/birthday-demo.png";
                                                            } ?>" alt="girl">
                                                <h6 class="mt-4 mb-0 text-theme-primary font-bold">
                                                    <?= $getBirthday['birthdaystudentarray'][$i]['name'] ?></h6>
                                                <p class="font-semiBold">CLASS -
                                                    <?= $getBirthday['birthdaystudentarray'][$i]['classname'] . " " . $getBirthday['birthdaystudentarray'][$i]['sectionname'] ?>
                                                </p>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 my-2 my-sm-5 my-lg-0 wow fadeInRightBig" data-wow-duration="2s">
                <div class="circularPart text-center">
                    <h5 class="topHead">Bulletin</h5>
                    <h4 class="mb-3">BOARD</h4>
                    <div class="circular-body position-relative rounded">
                        <ul class="circular-ul list-unstyled bg-white rounded">
                            <?php
                            $json = $WebSettings->getWebServicesData('circularServices', '', '');
                            $arrcnt = count($json['studentcircular']);
                            for ($i = 0; $i < $arrcnt; $i++) {
                                if ($i == 10) {
                                    break;
                                }
                            ?>
                                <li>
                                    <a class="py-1"
                                        href="circulars-details.php?id=<?php echo $json['studentcircular'][$i]['id'] ?>">
                                        <div class="row align-items-center justify-content-center bg-theme-primary mx-0">
                                            <div class="col-2">
                                                <div class="cir-left bg-theme-primary text-white px-0">
                                                    <h6 class="mb-0">
                                                        <?= date("d", strtotime($json['studentcircular'][$i]['date'])) ?>
                                                        </h5>
                                                        <p class="mb-0">
                                                            <?= date("M", strtotime($json['studentcircular'][$i]['date'])) ?>
                                                        </p>
                                                </div>
                                            </div>
                                            <div class="col-10 px-0">
                                                <div class="cir-right bg-white text-start px-2 py-1">
                                                    <p class="font-semiBold mb-0">
                                                        <?= $json['studentcircular'][$i]['name'] ?></p>
                                                    <p class="font-regular mb-2 lh-1">
                                                        <?= substr(strip_tags($json['studentcircular'][$i]['description']), 0, 120) ?>...
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                        <div class="bg-white text-center d-block w-100 rounded-bottom py-2">
                            <a class="bg-theme-secondary text-theme-primary btn px-3 font-semiBold"
                                href="circulars.php">View All &#10093;&#10093;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Section ------------------ -->
<section class="blog py-3 py-md-5">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center mb-3">
                <h5 class="topHead font-bold opacity-75 text-light">Explore Our</h5>
                <h4 class="text-white font-bold">BLOGS</h4>
            </div>
            <div class="col-12">
                <div class="blog-owl owl-carousel owl-theme owl-loaded wow slideInLeft" data-wow-duration="2s">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">
                            <?php
                            $a = 0;
                            foreach ($arrAwardsData as $sh) {
                                if ($sh['categoryname'] == "Blogs") {
                                    if ($a == 5) {
                                        break;
                                    }
                                    $a++;
                            ?>
                                    <div class="owl-item">
                                        <div class="card">
                                            <div class="card-images position-relative">
                                                <img src="<?= $sh['attachment'] ?>" class="card-img-top" alt="card-img">
                                                <img src="<?= $WebSettings::IMAGESURL ?>/images/white-logo.png" alt="logo"
                                                    class="card-img-top">
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title opacity-75"><?= $sh['name'] ?></h5>
                                                <p class="card-text opacity-75 lh-13">
                                                    <?= substr(strip_tags($sh['description']), 0, 175) ?>...</p>
                                                <a href="blog-details.php?id=<?= $sh['id'] ?>"
                                                    class="bg-white text-theme-primary mb-3 text-white btn px-3 font-semiBold">
                                                    Know More &#10093;&#10093;</a>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Social Section ------------------ -->
<section class="social">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="social-owl owl-carousel owl-theme owl-loaded">
                    <div class="owl-stage-outer py-5">
                        <div class="owl-stage">
                            <div class="owl-item">
                                <div class="social-img text-center position-relative wow fadeInRightBig" data-wow-duration="2s">
                                    <a href="<?= $WebSettings::FB_URL ?>">
                                        <img src="<?= $WebSettings::IMAGESURL ?>/images/fb.png" alt="img"
                                            class="img-fluid img-thumbnail">
                                        <span
                                            class="bg-theme-secondary px-3 py-2 text-theme-primary fs-6 font-bold rounded-2">
                                            <i class="fa-brands fa-facebook-f"></i>
                                            Facebook
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="owl-item">
                                <div class="social-img text-center position-relative wow fadeInRightBig" data-wow-duration="2s">
                                    <a href="<?= $WebSettings::INSTA_URL ?>">
                                        <img src="<?= $WebSettings::IMAGESURL ?>/images/insta.png" alt="img"
                                            class="img-fluid img-thumbnail">
                                        <span
                                            class="bg-theme-secondary px-3 py-2 text-theme-primary fs-6 font-bold rounded-2">
                                            <i class="fa-brands fa-instagram"></i>
                                            Instagram
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="owl-item">
                                <div class="social-img text-center position-relative wow fadeInRightBig" data-wow-duration="2s">
                                    <a href="<?= $WebSettings::YOUTUBE_URL ?>">
                                        <img src="<?= $WebSettings::IMAGESURL ?>/images/utube.png" alt="img"
                                            class="img-fluid img-thumbnail">
                                        <span
                                            class="bg-theme-secondary px-3 py-2 text-theme-primary fs-6 font-bold rounded-2">
                                            <i class="fa-brands fa-youtube"></i>
                                            Youtube
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonial Section ------------------ -->
<section class="testimonial py-3 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-3">
                <h5 class="topHead font-bold text-theme-primary">Voices of</h5>
                <h4 class="font-bold">OUR COMMUNITY</h4>
            </div>
            <div class="col-12">
                <div class="testimonial-owl owl-carousel owl-theme owl-loaded wow slideInLeft" data-wow-duration="2s">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">
                            <?php
                            $testi = $WebSettings->getWebServicesData('testimonialData', '', '');
                            $data = $testi['data'];
                            usort($data, [$WebSettings, 'compareAwardsDates']);
                            for ($b = 0; $b <= count($data) - 1; $b++) {
                                if ($b == 5) {
                                    $break;
                                }
                            ?>
                                <div class="owl-item">
                                    <div class="testimonial-card p-3 rounded position-relative">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="testi-text">
                                                    <h5 class="font-bold text-theme-primary mb-3"><?= $data[$b]['title'] ?>
                                                    </h5>
                                                    <p class="font-semiBold mb-0 lh-1 opacity-75">
                                                        <?= $data[$b]['parent_name'] ?></p>
                                                    <p class="font-bold fs-6"><?= $data[$b]['child_name'] ?></p>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <img src="<?= $data[$b]['attachment_path'] ?>" alt="img">
                                            </div>
                                            <div class="col-12 testi-h pt-4 pt-md-2">
                                                <p class="lh-13">
                                                    <?= substr(strip_tags($data[$b]['description']), 0, 150) ?>...
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
                <div class="col-12 text-center mt-3 mt-md-4">
                    <a class="bg-theme-primary text-white btn px-3 font-semiBold" href="testimonial.php">
                        View All &#10093;&#10093;
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require 'layout/footer.php'; ?>