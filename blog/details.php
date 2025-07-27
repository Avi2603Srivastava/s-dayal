<?php require "../layout/header.php"; ?>

<section class="page-title mt-1">
    <div class="auto-container">
        <div class="content-box">
            <div class="content-wrapper">
                <div class="title">
                    <!-- <h1 class="Times px-3 px-md-5">Blog</h1> -->
                </div>

            </div>
        </div>
    </div>
    <div class="inner-overlay"></div>
</section>
<main class="container-fluid container-lg py-5">
    <div class="row g-md-5 g-4">
        <div class="col-12 mb-4 d-md-none">
            <div class="input-group">
                <input type="search" class="form-control" placeholder="Search...">
                <button class="btn btn-theme-primary">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
        <div class="col-md-8 filterSearchBlogData">
            <article class="mb-3">
                <h1 class="mb-3 blogMainTitle text-theme-primary"><?= $blogData['TITLE'] ?></h1>
                <p class="text-dark">
                    <i class="fa-regular fa-calendar-days me-1 text-theme-primary"></i> <?= date('M d, Y', strtotime($blogData['DATE'])) ?> <i class="fa ms-2 fa-user me-1 text-theme-primary"></i> Admin
                </p>
                <hr>
                <div class="text-body-secondary blog-content">
                    <img src="<?= $blogData['COVER_PHOTO'] ?>" class="img-fluid w-100 img-thumbnail shadow-sm bg-theme-primary-light rounded-4">
                    <?= $blogData['DESCRIPTION'] ?>
                </div>
            </article>

            <hr>
            <p class="mt-3 d-flex justify-content-between">
                <?php
                $prevBlog = $WebSettings->getPrevData($blogData['CUSTOM_URL']);
                if (isset($prevBlog) && $prevBlog != '') { ?>
                    <a href="<?= $prevBlog ?>" class="btn blog-btn"><i class="fa fa-chevron-left me-1"></i> Prev Post </a>
                <?php
                }
                $nextBlog = $WebSettings->getNextData($blogData['CUSTOM_URL']);
                if (isset($nextBlog) && $nextBlog != '') { ?>
                    <a href="<?= $nextBlog ?>" class="btn blog-btn"> Next Post <i class="fa fa-chevron-right me-1"></i></a>
                <?php  }  ?>
            </p>
        </div>
        <div class="col-md-4">
            <div class="input-group d-none d-lg-flex position-relative">
                <input type="search" class="form-control searchInput" from="blog" placeholder="Search...">
                <button class="btn btn-theme-primary">
                    <i class="fa fa-search"></i>
                </button>
                <div class="searchDiv searchBox" style="display: none;">
                    <ul class="SearchUl finalSearchData">
                        <li><a href="javascript:void(0)">Searching...</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-4">
                <h4 class="text-theme-primary mb-3">Recent Posts</h4>
                <hr>
                <div class="list-group list-group-flush mb-3">
                    <?php
                    $data = $WebSettings->getBlogData('websiteBlog');
                    usort($data, [$WebSettings, 'compareAwardsDates']);
                    $mi = 0;
                    foreach ($data as $sh) {
                        if ($mi == 5) {
                            break;
                        }
                        $mi++;
                    ?>
                        <a href="<?= $sh['custom_url'] ?>" class="list-group-item blog-link"><?= substr(strip_tags($sh['title']), 0, 40) ?>...</a>
                    <?php } ?>
                </div>
                <h4 class="text-theme-primary mb-3">Archives</h4>
                <hr>
                <div class="dropdown-custom bg-theme-primary text-white mb-3">
                    <label class="initiateYearDropdown w-100 selectedBlogYear">Select Years</label>
                    <ul class="yearDropdown blogYear" style="display: none;">
                        <?php
                        $printedYears = [];
                        $hasBlankDate = false;
                        foreach ($data as $sh) {
                            $nyear = $sh['date'] != '' ? date('Y', strtotime($sh['date'])) : "Blank Date";
                            $selectedYear = ($nyear == date('Y')) ? "selected" : "";
                            if ($nyear === "Blank Date") {
                                $hasBlankDate = true;
                                continue;
                            }
                            if (!in_array($nyear, $printedYears)) {
                                echo "<li data-val={$nyear} {$selectedYear}>{$nyear}</li>";
                                $printedYears[] = $nyear;
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="blog-years-filter selectedBlogMonth blogMonth years-filter justify-content-center gap-2 mb-3">
                    <span data-val="01">
                        <div class="blogmonth"><i class="fa-regular fa-calendar-days me-1"></i> January</div>
                    </span>
                    <span data-val="02">
                        <div class="blogmonth"><i class="fa-regular fa-calendar-days me-1"></i> Fabruary</div>
                    </span>
                    <span data-val="03">
                        <div class="blogmonth"><i class="fa-regular fa-calendar-days me-1"></i> March</div>
                    </span>
                    <span data-val="04">
                        <div class="blogmonth"><i class="fa-regular fa-calendar-days me-1"></i> April</div>
                    </span>
                    <span data-val="05">
                        <div class="blogmonth"><i class="fa-regular fa-calendar-days me-1"></i> May</div>
                    </span>
                    <span data-val="06">
                        <div class="blogmonth"><i class="fa-regular fa-calendar-days me-1"></i> June</div>
                    </span>
                    <span data-val="07">
                        <div class="blogmonth"><i class="fa-regular fa-calendar-days me-1"></i> July</div>
                    </span>
                    <span data-val="08">
                        <div class="blogmonth"><i class="fa-regular fa-calendar-days me-1"></i> August</div>
                    </span>
                    <span data-val="09">
                        <div class="blogmonth"><i class="fa-regular fa-calendar-days me-1"></i> September</div>
                    </span>
                    <span data-val="10">
                        <div class="blogmonth"><i class="fa-regular fa-calendar-days me-1"></i> October</div>
                    </span>
                    <span data-val="11">
                        <div class="blogmonth"><i class="fa-regular fa-calendar-days me-1"></i> November</div>
                    </span>
                    <span data-val="12">
                        <div class="blogmonth"><i class="fa-regular fa-calendar-days me-1"></i> December</div>
                    </span>
                </div>
            </div>
        </div>
    </div>

</main>

<?php require "../layout/footer.php"; ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const links = document.querySelectorAll('.forBlogNavigation a');
        links.forEach(function(link) {
            const href = link.getAttribute('href');
            if (href && !href.startsWith('https://') && href !== 'javascript:void(0)') {
                link.setAttribute('href', '../' + href);
            }
        });
    });
</script>