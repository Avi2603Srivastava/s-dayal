<?php require "../layout/header.php"; ?>
<!-- Page Title -->
<section class="page-title mt-1">
    <div class="auto-container">
        <div class="content-box">
            <div class="content-wrapper">
                <div class="title">
                    <h1 class="Times px-3 px-md-5">Blogs</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="inner-overlay"></div>
</section>
<main class="container-fluid container-lg py-5">
    <div class="row g-lg-5 g-4">
        <div class="col-12 mb-4 d-lg-none">
            <div class="input-group">
                <input type="search" class="form-control" placeholder="Search...">
                <button class="btn btn-theme-primary">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
        <div class="col-lg-8 filterSearchBlogData">

            <?php
            $data = $WebSettings->getBlogData('websiteBlog');
            usort($data, [$WebSettings, 'compareAwardsDates']);
            foreach ($data as $val) {
                if (date('Y') == date('Y', strtotime($val['date']))) {
            ?>

                    <article class="mb-3">
                        <h3 class="mb-3 text-theme-primary"><?= $val['title'] ?></h3>
                        <p class="text-dark">
                            <i class="fa-regular fa-calendar-days me-1 text-theme-primary"></i><?= date('M d, Y', strtotime($val['date'])) ?> <i class="fa ms-2 fa-user me-1 text-theme-primary"></i> Admin
                        </p>
                        <hr>
                        <p class="text-body-secondary">
                            <?= substr(strip_tags($val['description']), 0, 300) ?>...
                        </p>
                        <a href="<?= $val['custom_url'] ?>" class="btn blog-btn btn-sm ms-auto">Continue Reading <i
                                class="fa fa-chevron-right ms-1"></i> </a>
                    </article>
            <?php
                }
            }
            ?>
            <hr>
            <p class="mt-3 preYbd" year-val="<?= date('Y') ?>">
                <a href="javascript:void(0)" class="btn blog-btn btn-sm"><i class="fa fa-chevron-left me-1"></i> Older Post</a>
            </p>
        </div>
        <div class="col-lg-4">
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