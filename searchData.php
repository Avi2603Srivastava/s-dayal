<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
function isAjaxRequest()
{
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
}

if (isAjaxRequest()) {
    $pageName = $lastURL = "";
    require 'process/global.php';
    if (isset($_REQUEST['admno']) && $_REQUEST['admno'] != '' && isset($_REQUEST['dob']) && $_REQUEST['dob'] != '') {
        $tdata = $WebSettings->getWebServicesData('transferCertificateService', $_REQUEST['admno'], $_REQUEST['dob']);
        if (isset($tdata) && $tdata != '' && isset($tdata['student_array'][0]['name'])) {
            $stuname = $tdata['student_array'][0]['name'];
            $fatherName = $tdata['student_array'][0]['father_name'];
            $motherName = $tdata['student_array'][0]['mother_name'];
            $className = $tdata['student_array'][0]['class_name'];
            $viewimagepath = $tdata['student_array'][0]['viewimagepath'];
            $enrollmentno = $tdata['student_array'][0]['enrollmentno'];
            $transfer_certificate_no = $tdata['student_array'][0]['transfer_certificate_no'];
            $enrollmentno = $tdata['student_array'][0]['enrollmentno'];
            $id = $tdata['student_array'][0]['id'];
            $studentid = $tdata['student_array'][0]['studentid'];
            $deactive_date = $tdata['student_array'][0]['deactive_date'];
            $url = isset($viewimagepath) && $viewimagepath != "" ? $viewimagepath : "https://" . $WebSettings::ERPURL . "/TransferCertificateTemplate?templateid=40&studentid=$studentid";
            $fdata = [
                "stuName" => $stuname,
                "fatherName" => $fatherName,
                "motherName" => $motherName,
                "className" => $className,
                "tcUrl" => $url,
                "enrollmentno" => $enrollmentno,
                "deactive_date" => $deactive_date,
                "transfer_certificate_no" => $transfer_certificate_no
            ];
            echo json_encode($fdata, JSON_UNESCAPED_SLASHES);
        } else {
            $fdata = ['error' => "error"];
            echo json_encode($fdata, JSON_UNESCAPED_SLASHES);
        }
    }
    if (isset($_REQUEST['gallerySearchParam']) && $_REQUEST['gallerySearchParam'] != "") {
        $galParam = $_REQUEST['gallerySearchParam'];
        $singlePage = "gallery-details.php";
        $arrData = $WebSettings->getWebServicesData('imageGalleryCategories', '', '');
        $data = $WebSettings->getGalleryWebSearchData($arrData, $galParam, $singlePage);
        echo $data;
    }
    if (isset($_REQUEST['labDa']) && $_REQUEST['labDa'] != "") {
        $dataId =  $WebSettings->decrypt($_REQUEST['labDa']);
        $data = $WebSettings->getWebServicesData('awardsSingleData', $dataId, '');
        $awardsData =  $data['data'][0];
        $title = $awardsData['name'];
        $description = $awardsData['description'];
        $fdata = [
            "name" => $title,
            "desc" => $description
        ];
        echo json_encode($fdata, JSON_UNESCAPED_SLASHES);
    }
    if (isset($_REQUEST['blogSearchParam']) && $_REQUEST['blogSearchParam'] != "") {
        $param = $_REQUEST['blogSearchParam'];
        echo $WebSettings->getBlogSearchData($param);
    }
    if (isset($_REQUEST['blogMonthdata']) && $_REQUEST['blogMonthdata'] && isset($_REQUEST['blogYearData']) && isset($_REQUEST['blogYearData'])) {
        $year = $_REQUEST['blogYearData'];
        $month = $_REQUEST['blogMonthdata'];
        $data = $WebSettings->getBlogData('websiteBlog');
        usort($data, [$WebSettings, 'compareAwardsDates']);
        foreach ($data as $val) {
            if ($year == date('Y', strtotime($val['date'])) && $month == date('m', strtotime($val['date']))) {
                echo "<article class='mb-3'><h3 class='mb-3'>" . $val['title'] . "</h3><p class='text-dark'> <i class='fa-regular fa-calendar-days me-1 text-theme-primary'></i>" . date('M d, Y', strtotime($val['date'])) . "</p><hr><p class='text-body-secondary'>" . substr(strip_tags($val['description']), 0, 300) . "...</p><a href='" . $val['custom_url'] . "' class='btn blog-btn btn-sm ms-auto'>Continue Reading <i class='fa fa-chevron-right ms-1'></i> </a></article>";
            }
        }
    }
    if (isset($_REQUEST['className']) && $_REQUEST['className'] != '') {
        $className = $_REQUEST['className'];
        $categoryName = $_REQUEST['className'] == "10" ? "Competency Based Books - 10th Class" : ($_REQUEST['className'] == "12" ? "Competency Based Books - 12th Class" : "");
        // echo $categoryName;die();
        $awardsData = $WebSettings->getWebServicesData('awardsData', '', '');
        $data = $awardsData['data'];
        usort($data, [$WebSettings, 'compareAwardsDates']);
        $html = "";
        $seq = 0;
        foreach ($data as $sh) {
            if ($sh['categoryname'] == $categoryName) {
                $seq++;
                $html .= "<tr><td>$seq</td><td align='left'>" . $sh['name'] . "</td><td><a href='" . $sh['attachment'] . "' target='_blank'>Download</a></td></tr>";
            }
        }
        echo $html;
    }
} else {
    echo 'Unauthorized request!';
}
