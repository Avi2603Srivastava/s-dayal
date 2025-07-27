<?php
$url = $_SERVER["SCRIPT_NAME"];
$break = Explode('/', $url);
$lastURL = $break[count($break) - 1];
$pageName = $_GET['PAGE'] ?? '';
$Yblog = strpos($url, "/blog") !== false ? "../" : "";
require $Yblog . "process/global.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $Yblog == "../" ? $blogData['META_TITLE'] ?? $WebSettings::META_TITLE : $pageData['META_TITLE'] ?? $WebSettings::META_TITLE; ?></title>
    <meta name="description" content="<?= $Yblog == "../" ? $blogData['META_DESCRIPTION'] ?? $WebSettings::META_DESCRIPTION : $pageData['META_DESCRIPTION'] ?? $WebSettings::META_DESCRIPTION ?>" />
    <meta name="keywords" content="<?= $Yblog == "../" ? $blogData['META_KEYWORDS'] ?? $WebSettings::META_KEYWORDS : $pageData['META_KEYWORDS'] ?? $WebSettings::META_KEYWORDS ?>" />
    <link rel="canonical" href="https://sdglobalschool.com/<?= $Yblog == "../" ? "blog/" . $blogData['CUSTOM_URL'] : $canonicalUrl ?><?= $Yblog == "../" ? "blog/" . $blogData['CUSTOM_URL'] : $canonicalUrl ?>">
    <link rel="shortcut icon" href="<?= $WebSettings::IMAGESURL ?>/images/onlyIcon-bg.png" type="image/x-icon">
    <link rel="icon" href="<?= $WebSettings::IMAGESURL ?>/images/onlyIcon-bg.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz@0,14..32;1,14..32&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Source+Sans+3:ital@0;1&display=swap"
        rel="stylesheet">

    <!-- font family here  -->

    <link href="<?= $Yblog ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $Yblog ?>assets/css/responsive.css?v=<?= time() ?>" rel="stylesheet">
    <link href="<?= $Yblog ?>assets/css/style.css?v=<?= time() ?>" rel="stylesheet">
    <link href="<?= $Yblog ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?= $Yblog ?>assets/css/owl.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.12.0/baguetteBox.min.css">
    <link rel="stylesheet" href="https://resources.edunexttechnologies.com/default-form/css/duDatepicker.css" />
</head>

<body>
    <div class="page-wrapper">

        <!-- Main Header -->
        <header class="main-header header-style-one">
            <!-- top links section  -->
            <div class="headerTop bg-theme-primary text-light py-1">
                <div class="container-fluid px-lg-5">
                    <div class="d-block d-lg-flex align-items-center justify-content-between px-lg-5">
                        <ul
                            class="d-flex align-items-center justify-content-between justify-content-md-end header-social fs-5">
                            <li>
                                <a target="_blank" href="<?= $WebSettings::FB_URL ?>"><i class="fa-brands fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a target="_blank" href="<?= $WebSettings::INSTA_URL ?>"><i class="fa-brands fa-instagram"></i></a>
                            </li>
                            <li>
                                <a target="_blank" href="<?= $WebSettings::YOUTUBE_URL ?>"><i class="fa-brands fa-youtube"></i></a>
                            </li>
                            <li>
                                <a target="_blank" href="<?= $WebSettings::LINKDIN_URL ?>"><i class="fa-brands fa-linkedin-in"></i></a>
                            </li>
                        </ul>
                        <ul
                            class="d-none d-lg-flex align-items-center justify-content-center header-logins text-nowrap small">
                            <li class="border-0">
                                <a target="_blank"
                                    href="https://sdgsg.edunexttechnologies.com/DirectStudentOnlineFeeInstallmentwise">
                                    <img src="<?= $WebSettings::IMAGESURL ?>/images/fee.svg" alt="img">
                                    Online Fee Payment
                                </a>
                            </li>
                            <li>
                                <a class="d-none d-sm-inline" target="_blank"
                                    href="https://sdgsg.edunexttechnologies.com/mvc/std/DynamicEnquiryForm">
                                    <img src="<?= $WebSettings::IMAGESURL ?>/images/admission.svg" alt="img">
                                    Admission Enquiry
                                </a>
                            </li>
                            <li>
                                <a class="d-none d-sm-inline" target="_blank" href="mandatory-disclosure">
                                    <img src="<?= $WebSettings::IMAGESURL ?>/images/disclosure.svg" alt="img">
                                    Mandatory Disclosure
                                </a>
                            </li>
                            <li class="pe-0">
                                <a target="_blank" href="https://sdgsg.edunexttechnologies.com/Index" class="pe-0">
                                    <img src="<?= $WebSettings::IMAGESURL ?>/images/edunext.svg" alt="img">
                                    Edunext
                                    ERP<sup>TM</sup> Login
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Header Top -->
            <div class="header-top py-1 py-md-0 px-lg-5 bg-white shadow">
                <div class="container-fluid px-lg-5">
                    <div class="d-flex align-items-center justify-content-between align-items-center">
                        <div class="left-column d-flex align-items-center">
                            <div class="left-img-column py-0 py-md-2">
                                <a class="d-none d-xl-block" href="<?= $Yblog ?>index.php">
                                    <img src="<?= $WebSettings::IMAGESURL ?>/images/school-logo1.png" alt="logo"
                                        class="img-fluid logo">
                                </a>
                                <a class="d-block d-xl-none" href="<?= $Yblog ?>index.php">
                                    <img src="<?= $WebSettings::IMAGESURL ?>/images/onlyIcon.png" alt="logo"
                                        class="img-fluid logo">
                                </a>
                            </div>
                        </div>
                        <div class="together d-flex align-items-center w-100 justify-content-end">
                            <div class="middle-column py-0 py-md-1">
                                <ul
                                    class="d-none d-sm-flex align-items-center justify-content-center text-nowrap gap-3">
                                    <li>
                                        <a href="#">
                                            <span class="right-logo">
                                                <img src="<?= $WebSettings::IMAGESURL ?>/images/ib.svg" alt="logo">
                                            </span>
                                            <p>IB</p>
                                        </a>
                                        <ul class="hover-ul">
                                            <li><a target="_blank" href="<?= $Yblog ?>pyp">Primary Yearly Program</a></li>
                                            <li><a target="_blank" href="<?= $Yblog ?>myp">Middle Yearly Program</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="<?= $Yblog ?>calendar.php">
                                            <span class="right-logo">
                                                <img src="<?= $WebSettings::IMAGESURL ?>/images/calendar.svg"
                                                    alt="logo">
                                            </span>
                                            <p>Calendar</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= $Yblog ?>book-list">
                                            <span class="right-logo">
                                                <img src="<?= $WebSettings::IMAGESURL ?>/images/book.svg" alt="logo">
                                            </span>
                                            <p>Books</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= $Yblog ?>blog">
                                            <span class="right-logo">
                                                <img src="<?= $WebSettings::IMAGESURL ?>/images/blog.svg" alt="logo">
                                            </span>
                                            <p>Blogs</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <span class="right-logo">
                                                <img src="<?= $WebSettings::IMAGESURL ?>/images/mobile.svg" alt="logo">
                                            </span>
                                            <p>Apps</p>
                                        </a>
                                        <ul class="hover-ul">
                                            <li><a target="_blank" href="https://play.google.com/store/apps/details?id=com.edunext.sdgsg">Android App</a></li>
                                            <li><a target="_blank" href="https://apps.apple.com/in/app/edunext-parent/id1516241231">IOS App</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <span class="right-logo">
                                                <img src="<?= $WebSettings::IMAGESURL ?>/images/degree.png" alt="360">
                                            </span>
                                            <p>School Tour</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="right-column py-0">
                                <div class="bg-theme-secondary navMain-li p-0 pb-1 px-2 p-md-3">
                                    <span class="navMain mobile-nav-toggler d-inline-flex flex-column align-items-end">
                                        <div class="one mt-0"></div>
                                        <div class="two"></div>
                                        <div class="three mb-0">
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div class="mobile-menu">
                <div class="menu-backdrop"></div>
                <div class="close-btn"><span class="icon"><i class="fa fa-times" aria-hidden="true"></i></span></div>

                <nav class="menu-box" style="outline: none; cursor: grab;" tabindex="1">
                    <div class="nav-logo">
                        <a href="<?= $Yblog ?>index.php">
                            <img src="<?= $WebSettings::IMAGESURL ?>/images/tog-img.png" alt="logo"
                                style="display: block; margin: 0 auto;">
                        </a>
                    </div>
                    <p class="mb-0 py-2">C.B.S.E Affiliated | Affiliation No. 2132472</p>
                    <div class="menu-outer">
                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->

                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <div class="middle-column mt-4 d-block d-sm-none">
                                <div class="container-fluid">
                                    <div class="row align-items-center justify-content-center text-white">
                                        <div class="col-4 text-center col-li">
                                            <a href="#">
                                                <span class="right-logo">
                                                    <img src="<?= $WebSettings::IMAGESURL ?>/images/ib.svg" alt="logo">
                                                </span>
                                                <p>IB</p>
                                            </a>
                                            <ul class="nav-hover-ul px-0">
                                                <li><a target="_blank" href="<?= $Yblog ?>pyp">Primary Yearly Program</a></li>
                                                <li><a target="_blank" href="<?= $Yblog ?>myp">Middle Yearly Program</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-4 text-center col-li">
                                            <a href="<?= $Yblog ?>calendar.php">
                                                <span class="right-logo">
                                                    <img src="<?= $WebSettings::IMAGESURL ?>/images/calendar.svg"
                                                        alt="logo">
                                                </span>
                                                <p>Calendar</p>
                                            </a>
                                        </div>
                                        <div class="col-4 text-center col-li">
                                            <a href="<?= $Yblog ?>book-list">
                                                <span class="right-logo">
                                                    <img src="<?= $WebSettings::IMAGESURL ?>/images/book.svg"
                                                        alt="logo">
                                                </span>
                                                <p>Books</p>
                                            </a>
                                        </div>
                                        <div class="col-4 text-center col-li">
                                            <a href="<?= $Yblog ?>blog">
                                                <span class="right-logo">
                                                    <img src="<?= $WebSettings::IMAGESURL ?>/images/blog.svg"
                                                        alt="logo">
                                                </span>
                                                <p>Blogs</p>
                                            </a>
                                        </div>
                                        <div class="col-4 text-center col-li">
                                            <a href="#">
                                                <span class="right-logo">
                                                    <img src="<?= $WebSettings::IMAGESURL ?>/images/mobile.svg"
                                                        alt="logo">
                                                </span>
                                                <p>Apps</p>
                                            </a>
                                            <ul class="nav-hover-ul">
                                                <li><a target="_blank" href="https://play.google.com/store/apps/details?id=com.edunext.sdgsg">Android App</a></li>
                                                <li><a target="_blank" href="https://apps.apple.com/in/app/edunext-parent/id1516241231">IOS App</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-4 text-center col-li">
                                            <a href="#">
                                                <span class="right-logo">
                                                    <img src="<?= $WebSettings::IMAGESURL ?>/images/degree.png"
                                                        alt="360">
                                                </span>
                                                <p>School Tour</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?= $WebSettings->Menu() ?>
                        </div>
                    </div>
                    <!--Social Links-->

                </nav>

            </div>
            <!-- ------------------------------- -->

    </div>
    <!-- End Sticky Menu -->

    <!-- End Mobile Menu -->

    <div class="nav-overlay">
        <div class="cursor"></div>
        <div class="cursor-follower"></div>
    </div>
    </header>
    <!-- End Main Header -->