<?php
error_reporting(0);
// include 'C:\xampp\htdocs\webglobal\main.php';
include '/var/www/webglobal/main.php';
class WebSettings
{
    public const ERPURL = 'sdgsg.edunexttechnologies.com';
    public const blankAlt = "Top School in Ghaziabad";
    public const IMAGESURL = 'https://resources.edunexttechnologies.com/web-data/s-dayal';
    public const COLOR404CODE = '#F48120';
    public const META_TITLE = "Best School in Ghaziabad | Top School in Ghaziabad | Admission Open in Ghaziabad - Shambhu Dayal Global School Ghaziabad";
    public const META_DESCRIPTION = "Educational Society laid the foundation of veritable learning in Ghaziabad";
    public const META_KEYWORDS = "Best School in Ghaziabad, Best School Ghaziabad, Top School in Ghaziabad, Top School Ghaziabad, Top School in Ghaziabad, Top School Ghaziabad, Best Education School in Ghaziabad, Top CBSE School in Ghaziabad, Admission Open in Ghaziabad";
    public const WEBSITE_URL = '';
    public const INSTA_URL = "https://www.instagram.com/sdgsgzb/";
    public const FB_URL = "https://www.facebook.com/sdgsgzb";
    public const TWITTER_URL = "";
    public const LINKDIN_URL = "https://linkedin.com/in/sdglobalschool";
    public const YOUTUBE_URL = "https://youtube.com/@sdglobalschool6777?si=qQjD4o9qdur7_Oqi";
    public const WHATSAPP_NUMBER_1 = "";
    public const WHATSAPP_NUMBER_2 = "";
    public const CONTACT_NUMBER_1 = "";
    public const CONTACT_NUMBER_2 = "";
    public const CONTACT_NUMBER_3 = "";
    public const GMAIL_1 = "";
    public const GMAIL_2 = "";
    public const GMAIL_3 = "";
    public const ADDRESS_1 = "";
    public const ADDRESS_LINK_1 = "";
    public const ADDRESS_2 = "";
    public const ADDRESS_LINK_2 = "";
    public const ADDRESS_3 = "";
    public const ADDRESS_LINK_3 = "";
    public const MAP_URL = "";

    public function websiteUrl()
    {
        return  $_SERVER['HTTP_HOST'];
    }

    public const DATA = [
        'UL_1' => "class='navigation addHome forBlogNavigation webMainMenu'",
        'LI_1' => '',
        'LI_1sub' => "class='dropdown'",
        'A_1' => '',
        'UL_2' => "",
        'LI_2' => "class='dropdown subMenu'",
        'LI_2sub' => "",
        'A_2' => '',
        'UL_3' => "",
        'LI_3' => 'class="lastSubMenu"',
        'A_3' => '',
        'MENU_DROP' => '',
    ];
    private $process;
    public function __construct($processInstance)
    {
        $this->process = $processInstance;
    }
    public function getWebServicesData($headname, $param, $sparam)
    {
        $getParam = $param != '' ? $param : '';
        $errormsg = [
            'ErrorMsgFromCode' => "Failed to retrieve Data from --$headname-- for this URL ---" . WebSettings::ERPURL . "---.",
            'error' => "Wrong path Name Called ---- $headname",
            "status" => "404",
        ];
        $getdata = in_array($headname, [
            'manageMenus',
            'pages',
            'singlePageData',
            'singlePageDataMenuid',
            'AchievementsData',
            'AchievementsSingleData',
            'imageGalleries',
            'imageGalleryCategories',
            'imageGalleryCategoriesSingle',
            'videoData',
            'liveStream',
            'popupData',
            'attachmentsData',
            'activitiesData',
            'activitiesSingleData',
            'websiteSliders',
            'TodayThoughts',
            'websiteTC',
            'awardsData',
            'awardsSingleData',
            'pressReleases',
            'manageSubMenus',
            'manageSubMenusSingle',
            'childMenus',
            'testimonialData',
            'testimonialSingleData',
            'magazineThumbnails',
            'schoolNews',
            'circularServices',
            'circularServicesAcademicYear',
            'birthdayAll',
            'birthdayToday',
            'calenderServices',
            'calenderServicesParam',
            'transferCertificateService'
        ]) ? $this->process->getServiceData($headname, WebSettings::ERPURL, $getParam, $sparam) : $errormsg;

        if (isset($getdata['status']) && $getdata['status'] == '404') {
            throw new Exception("Failed to retrieve Data from >>>>>>>>>>$headname<<<<<<<< for this URL >>>>>>>>>>" . WebSettings::ERPURL . "<<<<<<<<.");
        } else {
            return json_decode($getdata, true);
        }
    }
    public function getBlogData($headname)
    {
        return $this->process->sendBlogData($headname, WebSettings::ERPURL);
    }

    public function getBlogSearchData($param)
    {
        return $this->process->sendSearchBlogData(WebSettings::ERPURL, $param);
    }

    public function getSingleBlogData($url)
    {
        $blogData = $this->process->sendSingleBlogData($url, WebSettings::ERPURL);
        return $blogData;
    }
    public function getPrevData($customUrl)
    {
        return $this->process->sendPreviousBlog($customUrl, WebSettings::ERPURL);
    }
    public function getNextData($customUrl)
    {
        return $this->process->sendNextBlog($customUrl, WebSettings::ERPURL);
    }
    public function getDomianUrl()
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
        $host = $_SERVER['HTTP_HOST'];
        $uri = $_SERVER['REQUEST_URI'];
        $base_url = $protocol . "://" . $host . dirname($uri) . "/";
        return $base_url;
    }

    public function Menu()
    {
        $data = WebSettings::DATA;
        return $this->process->GET_MENU(WebSettings::ERPURL, $data['UL_1'], $data['LI_1'], $data['LI_1sub'], $data['A_1'], $data['UL_2'], $data['LI_2sub'], $data['LI_2'], $data['A_2'], $data['UL_3'], $data['LI_3'], $data['A_3'], $data['MENU_DROP']);
    }
    public function GET_SINGLE_MENU_INTERNAL($menuid)
    {
        return $this->process->GET_SINGLE_MENU(WebSettings::ERPURL, $menuid);
    }
    public function encrypt($input)
    {
        $get = file_get_contents('https://forms.edunexttechnologies.com/studio/api/target/encrypt.php');
        $get = json_decode($get, true);
        if (isset($get['data']['key'])) {
            $key = $get['data']['key'];
        }
        $cipher = "AES-128-ECB"; // Cipher method
        $cipherText = openssl_encrypt($input, $cipher, $key, OPENSSL_RAW_DATA);
        $encodedTxt = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($cipherText));
        return $encodedTxt;
    }
    public function decrypt($encryptedInput)
    {
        $get = file_get_contents('https://forms.edunexttechnologies.com/studio/api/target/encrypt.php');
        $get = json_decode($get, true);
        if (!isset($get['data']['key'])) {
            return false;
        }
        $key = $get['data']['key'];
        $encryptedInput = str_replace(['-', '_'], ['+', '/'], $encryptedInput);
        $encryptedInput = base64_decode($encryptedInput);
        $cipher = "AES-128-ECB";
        $decrypted = openssl_decrypt($encryptedInput, $cipher, $key, OPENSSL_RAW_DATA);
        return $decrypted;
    }

    public function pageData($pagename)
    {
        $pageData = $this->process->getPageData($pagename, WebSettings::ERPURL);
        return $pageData;
    }
    public function getSearchData($menuName, $ClassName)
    {
        $sData = $this->process->searchMenuData(WebSettings::ERPURL, $menuName, $ClassName);
        return $sData;
    }
    public function compareAwardsDates($a, $b)
    {
        $dateA = strtotime($a['date']);
        $dateB = strtotime($b['date']);
        if ($dateA === false || $dateB === false) {
            return 0;
        }
        return $dateB - $dateA;
    }
    public function compareGalleryDates($a, $b)
    {
        $dateA = strtotime($a['image_date']);
        $dateB = strtotime($b['image_date']);
        if ($dateA === false || $dateB === false) {
            return 0;
        }
        return $dateB - $dateA;
    }

    public function compareSeq($a, $b)
    {
        return intval($a['seq']) - intval($b['seq']);
    }
    public function  getGalleryWebSearchData($dataArray, $searchParam, $singlePage)
    {
        return $this->process->getSearchWebGalleryData($dataArray, $searchParam, $singlePage);
    }
}
if (!isset($process)) {
    die('<html lang="en"><head><meta charset="UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1" /><title>Server unavailable. Please retry shortly.</title><style> body { overflow: hidden; } html, body { position: relative; min-height: 100%; width: 100%; align-items: center; justify-content: center; display: flex; color: #274c5e; padding:20px; } .header_logo { position: absolute; top: 0; left: 0; } .container { display: inline-block; } </style></head><body><div class="Container"><div class="MainGraphic" style="display:flex;justify-content:center;"><img src="https://resources.edunexttechnologies.com/web-data/edunext-website/img/bg-new.jpg" alt="Server unavailable. Please retry shortly." style="width: 350px; max-width: 100%;" /></div><h1 style="text-align:center;">Server unavailable. Please retry shortly.<br> Kindly connect with us at <a href="web@edunnexttechnologies.com">web@edunnexttechnologies.com</a></h1></div></body></html>');
}

$WebSettings = new WebSettings($process);
$mainUrl = $pageName == "" ? $lastURL : $pageName;
$canonicalUrl = $mainUrl == "index.php" ? '' : $mainUrl;

if (isset($pageName) && $pageName != '') {
    $PageSrc = $pageName;
    $pageData = $WebSettings->pageData($pageName);
    if (isset($pageData['error'])) {
        header('Location: 404.php');
    }
} else {
    $url = $_SERVER["SCRIPT_NAME"];
    $break = Explode('/', $url);
    $PageSrc = $break[count($break) - 1];
    $pageData = $WebSettings->pageData($PageSrc);
}
if (isset($Yblog) && $Yblog != "") {
    if (isset($_GET['blog'])) {
        $blogData = $WebSettings->getSingleBlogData($_GET['blog']);
        if (isset($blogData['error']) && $blogData['error'] == "Page not found") {
            header('Location: 404.php');
        }
    }
}
function sanitize_output_safe($buffer)
{
    $chunks = preg_split('/(<\/?script.*?>|<\/?style.*?>)/i', $buffer, -1, PREG_SPLIT_DELIM_CAPTURE);

    foreach ($chunks as $i => $chunk) {
        if ($i % 2 == 0) {
            $chunk = preg_replace('/\s+/', ' ', $chunk);
            $chunk = preg_replace('/>\s+</', '><', $chunk);

            $chunk = preg_replace_callback(
                '/<img\b[^>]*>/i',
                function ($matches) {
                    $imgTag = $matches[0];
                    if (!preg_match('/\balt\s*=/', $imgTag)) {
                        $imgTag = preg_replace('/<img/i', '<img alt="' . WebSettings::blankAlt . '"', $imgTag);
                    } elseif (preg_match('/\balt\s*=\s*([\'"]) *\1/i', $imgTag)) {
                        $imgTag = preg_replace('/\balt\s*=\s*([\'"]) *\1/i', 'alt="' . WebSettings::blankAlt . '"', $imgTag);
                    }

                    return $imgTag;
                },
                $chunk
            );

            $chunks[$i] = trim($chunk);
        }
    }

    return implode('', $chunks);
}

ob_start("sanitize_output_safe");
