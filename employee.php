<?php
error_reporting(1);
header('Content-Type: application/json');
$str = file_get_contents('https://sdgsg.edunexttechnologies.com/rest/schoolConfig/erpdata?server_key=U2FsdGVkX18x4onGDdLxhRy9oe-40UrU0DqtA59iOyHgKMk1ktu2m3qVEJmatHqT');
$json = json_decode($str, true);
if ($json['success']) {
    $data = $json['data'];
    $mainemployee = [];
    $mainemployeetwo = [];
    $tgtEmloyeeData = [];
    $prtEmloyeeData = [];
    $ntEmloyeeData = [];
    $pgtEmloyeeData = [];
    $gradeFourEmloyeeData = [];
    $ntDseq = 0;
    $gfDseq = 0;
    $tgtDseq = 0;
    $prtDseq = 0;
    $pgtDseq = 6;
    foreach ($data['Employees'] as $employee) {
        $emailid = $employee['Personal Mail Id'];
        $empCode = $employee['Employee Code'];
        $search_string = "JBACADEMY";
        $mainemail = ($emailid != '') ? $emailid : '';
        if (!isset($employee['Relieving Date'])) {
            $matchEmpCode = match ($empCode) {
                "173" => false,
                "183" => false,
                "233" => false,
                "234" => false,
                "235" => false,
                "236" => false,
                "237" => false,
                "238" => false,
                "239" => false,
                default => true
            };
            if ($matchEmpCode) {
                $designationname = $employee['Designation'];
                $departmentname = $employee['Department'];
                $sub_department = $employee['sub_department'];
                $head_of_department = $employee['head_of_department'];
                $doj = $employee['Date of Joining'];
                $currentSeq = match (strtolower($employee['Name'])) {
                    'dr. jyotsna sharma' => 1,
                    "deepa pradhan" => 2,
                    "ritu batra" => 3,
                    "pinki malik" => 4,
                    "chanda jha" => 5,
                    "dolly gupta" => 6,
                    default => "9999",
                };
                $pgtSeq = strpos(strtolower($employee['Designation']), "pgt") !== false ? $pgtDseq++ : "9999";
                $tgtSeq = strpos(strtolower($employee['Designation']), "tgt") !== false ? $tgtDseq++ : "9999";
                $prtSeq = strpos(strtolower($employee['Designation']), "prt") !== false ? $prtDseq++ : "9999";
                $ntSeq = $employee['Department'] == "Non-Teaching" && (strpos(strtolower($employee['Designation']), "prt") === false && strpos(strtolower($employee['Designation']), "pgt") === false  && strpos(strtolower($employee['Designation']), "tgt") === false)  ? $ntDseq++ : "9999";
                $gfseq = $employee['Department'] == "Class IV"  && (strpos(strtolower($employee['Designation']), "prt") === false && strpos(strtolower($employee['Designation']), "pgt") === false  && strpos(strtolower($employee['Designation']), "tgt") === false) ? $gfDseq++ : "9999";

                if ($currentSeq != "9999") {
                    $mainemployee[] = [
                        "name" => $employee['Name With Salutation'],
                        "ImageURL" =>  $employee['ImageURL'],
                        "designation" => $employee['Designation'],
                        "emailid" => $mainemail,
                        "department" => $employee['Department'],
                        "seq" => intval($currentSeq)
                    ];
                }
                if ($currentSeq == "9999") {
                    if ($pgtSeq != "9999") {
                        $pgtEmloyeeData[] = [
                            "name" => $employee['Name With Salutation'],
                            "ImageURL" =>  $employee['ImageURL'],
                            "designation" => $employee['Designation'],
                            "emailid" => $mainemail,
                            "department" => $employee['Department'],
                            "seq" => intval($pgtSeq)
                        ];
                    }
                    if ($tgtSeq != "9999") {
                        $tgtEmloyeeData[] = [
                            "name" => $employee['Name With Salutation'],
                            "ImageURL" =>  $employee['ImageURL'],
                            "designation" => $employee['Designation'],
                            "emailid" => $mainemail,
                            "department" => $employee['Department'],
                            "seq" => intval($tgtSeq)
                        ];
                    }
                    if ($prtSeq != "9999") {
                        $prtEmloyeeData[] = [
                            "name" => $employee['Name With Salutation'],
                            "ImageURL" =>  $employee['ImageURL'],
                            "designation" => $employee['Designation'],
                            "emailid" => $mainemail,
                            "department" => $employee['Department'],
                            "seq" => intval($prtSeq)
                        ];
                    }
                    if ($ntSeq != "9999") {
                        $ntEmloyeeData[] = [
                            "name" => $employee['Name With Salutation'],
                            "ImageURL" =>  $employee['ImageURL'],
                            "designation" => $employee['Designation'],
                            "emailid" => $mainemail,
                            "department" => $employee['Department'],
                            "seq" => intval($ntSeq)
                        ];
                    }
                    if ($gfseq != "9999") {
                        $gradeFourEmloyeeData[] = [
                            "name" => $employee['Name With Salutation'],
                            "ImageURL" =>  $employee['ImageURL'],
                            "designation" => $employee['Designation'],
                            "emailid" => $mainemail,
                            "department" => $employee['Department'],
                            "seq" => intval($gfseq)
                        ];
                    }
                }
            }
        }
    }

    usort($mainemployee, function ($a, $b) {
        return intval($a['seq']) - intval($b['seq']);
    });
    usort($pgtEmloyeeData, function ($a, $b) {
        return intval($a['seq']) - intval($b['seq']);
    });
    usort($tgtEmloyeeData, function ($a, $b) {
        return intval($a['seq']) - intval($b['seq']);
    });
    usort($prtEmloyeeData, function ($a, $b) {
        return intval($a['seq']) - intval($b['seq']);
    });
    usort($ntEmloyeeData, function ($a, $b) {
        return intval($a['seq']) - intval($b['seq']);
    });
    usort($gradeFourEmloyeeData, function ($a, $b) {
        return intval($a['seq']) - intval($b['seq']);
    });

    if (isset($_GET['mainemployee']) && $_GET['mainemployee'] ==  "true") {
        echo json_encode([
            "success" => true,
            "message" => "Data retrieved successfully",
            "employees" => $mainemployee
        ], JSON_UNESCAPED_SLASHES);
    } else if (isset($_GET['mainemployeetwo']) && $_GET['mainemployeetwo'] ==  "true") {
        echo json_encode([
            "success" => true,
            "message" => "Data retrieved successfully",
            "employees" => $tgtEmloyeeData
        ], JSON_UNESCAPED_SLASHES);
    } else if (isset($_GET['mainemployeethree']) && $_GET['mainemployeethree'] ==  "true") {
        echo json_encode([
            "success" => true,
            "message" => "Data retrieved successfully",
            "employees" => $prtEmloyeeData
        ], JSON_UNESCAPED_SLASHES);
    } else if (isset($_GET['mainemployeefour']) && $_GET['mainemployeefour'] ==  "true") {
        echo json_encode([
            "success" => true,
            "message" => "Data retrieved successfully",
            "employees" => $ntEmloyeeData
        ], JSON_UNESCAPED_SLASHES);
    } else if (isset($_GET['mainemployeefive']) && $_GET['mainemployeefive'] ==  "true") {
        echo json_encode([
            "success" => true,
            "message" => "Data retrieved successfully",
            "employees" => $pgtEmloyeeData
        ], JSON_UNESCAPED_SLASHES);
    } else if (isset($_GET['mainemployeesix']) && $_GET['mainemployeesix'] ==  "true") {
        echo json_encode([
            "success" => true,
            "message" => "Data retrieved successfully",
            "employees" => $gradeFourEmloyeeData
        ], JSON_UNESCAPED_SLASHES);
    }
} else {
    echo json_encode([
        "success" => false,
        "message" => "Failed to retrieve data"
    ]);
}
