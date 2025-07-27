<?php
$pageName = $lastURL = "";
require "../process/global.php";
$json = $WebSettings->getWebServicesData('calenderServices', '', '');
$arrcnt = count($json['eventcalender']);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Event Calendar</title>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700,700italic,300,300italic' rel='stylesheet' type='text/css'>
    <!-- <link rel="stylesheet" href="fonts/stylesheet.css"> -->

    <!-- Jalendar files -->
    <link rel="stylesheet" href="jalendar/style/jalendar.css" type="text/css" />
    <script type="text/javascript" src="jalendar/js/jquery-1.10.2.min.js"></script>
    <!--jQuery-->
    <script type="text/javascript" src="jalendar/js/jalendar.min.js"></script>
    <!-- Jalendar files #end -->

    <script src="main.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

        body {
            font-family: "Inter", sans-serif;
            font-weight: 100;
            font-size: 16px;
            margin: 0px;
        }

        #yourId ul li span {
            color: #2E2E2E;
            cursor: pointer;
            font-size: 13px;
            font-weight: normal;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row demos">
            <div class="tab-container" data-name="a">
                <div class="tab-content selected">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">

                                <div id="yourId" class="jalendar">
                                    <!-- <ul class="jalender_month">
                                        <?php
                                        $currentMonth = date('F'); // Using full month name for comparison
                                        $months = [
                                            'January' => '01',
                                            'February' => '02',
                                            'March' => '03',
                                            'April' => '04',
                                            'May' => '05',
                                            'June' => '06',
                                            'July' => '07',
                                            'August' => '08',
                                            'September' => '09',
                                            'October' => '10',
                                            'November' => '11',
                                            'December' => '12'
                                        ];

                                        foreach ($months as $month => $value) {
                                            $activeClass = ($currentMonth == $month) ? "active" : "";
                                            echo "<li class=\"$activeClass\" data-month=\"$value\"><span onclick=\"changeMonth('$value');\">$month</span></li>";
                                        }
                                        ?>
                                    </ul> -->

                                    <?php
                                    for ($i = 0; $i < $arrcnt; $i++) {
                                        $ndate = date("j", strtotime($json['eventcalender'][$i]['eventdate']));
                                        $nmonth = date("n", strtotime($json['eventcalender'][$i]['eventdate']));
                                        $nyear = date("Y", strtotime($json['eventcalender'][$i]['eventdate']));
                                    ?>
                                        <div class="added-event" data-date="<?php echo $ndate; ?>-<?php echo $nmonth; ?>-<?php echo $nyear; ?>" data-title="<?php echo $json['eventcalender'][$i]['eventname']; ?> <?php if ($json['eventcalender'][$i]['isholiday'] == 'true') echo '|  Holiday'; ?> ">

                                        </div>
                                    <?php } ?>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>