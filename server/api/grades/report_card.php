<?php

if ( !isset($_GET['section_id']) ){
    echo json_encode(
        array('result' => 0, 'message' => 'missing id')
    );
    return;
}

require '../../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

// from template
$spreadsheet = IOFactory::load('./template.xlsx');
$worksheet = $spreadsheet->getActiveSheet();

// get students
$response = file_get_contents('http://localhost/teachers-toolkit-app/server/api/student_assignment/read_by_section.php?section_id='.$_GET['section_id']);
$students = json_decode($response, true);
$students = $students['data'];

// get school
$response = file_get_contents('http://localhost/teachers-toolkit-app/server/api/school/read_one.php?id='.$students[0]['school_id']);
$school = json_decode($response, true);

// get section
$response = file_get_contents('http://localhost/teachers-toolkit-app/server/api/section/read_one.php?id='.$students[0]['section_id']);
$section = json_decode($response, true);

// get advisor
$response = file_get_contents('http://localhost/teachers-toolkit-app/server/api/teacher/read_one.php?id='.$section['advisor_id']);
$advisor = json_decode($response, true);
$advisor = $advisor['data'][0];

// echo '<pre>'; print_r($advisor); echo '</pre>';

foreach($students as $stud) {

    // clone tempsheet
    $cloneWorksheet = clone $spreadsheet->getSheetByName('tempsheet');
    $cloneWorksheet->setTitle($stud['student_name']);

    // set age
    $age = calcutateAge($stud['birthdate']);

    // set data
    $cloneWorksheet->setCellValue('AI50', 'Region VII, Central Visayas');
    $cloneWorksheet->setCellValue('AI51', 'Division of Bohol');
    $cloneWorksheet->setCellValue('AI53', $school['school_name']);
    $cloneWorksheet->setCellValue('AI54', $school['barangay']."  ".$school['city']." ".$school['province']);

    $cloneWorksheet->setCellValue('AI57', $stud['student_name']);
    $cloneWorksheet->setCellValue('AI58', $age);
    $cloneWorksheet->setCellValue('AI59', $section['grade']);
    $cloneWorksheet->setCellValue('AI60', $stud['LRN']);
    $cloneWorksheet->setCellValue('AI61', $section['track']);

    $cloneWorksheet->setCellValue('AK58', $stud['gender']);
    $cloneWorksheet->setCellValue('AK59', $section['section_name']);

    $cloneWorksheet->setCellValue('AH73', $school['principal_fn'].$school['principal_mn'].$school['principal_ln']);

    $cloneWorksheet->setCellValue('AJ70', $advisor['firstname'].' '.$advisor['middlename'].' '.$advisor['lastname']);



    // insert grade
    $sem1 = [];
    $sem2 = [];
    $response = file_get_contents('http://localhost/teachers-toolkit-app/server/api/grades/student_grades.php?student_id='.$stud['id']);
    $student_grade = json_decode($response, true);
    foreach($student_grade as $val) {
        if ($val['semester'] == 1) {
            array_push($sem1, $val);
        } else if ($val['semester'] == 2) {
            array_push($sem2, $val);
        }
    }

    // insert sem1

    // subject 1
    if (isset($sem1[0])){
        $cloneWorksheet->setCellValue('A8', $sem1[0]['subject_name'] ?? "");
        $cloneWorksheet->setCellValue('B8', $sem1[0]['hours'] ?? "");
        $cloneWorksheet->setCellValue('C8', $sem1[0]['final_grade'] ?? "");
        $cloneWorksheet->setCellValue('D8', $sem1[1]['final_grade'] ?? "");
        $cloneWorksheet->setCellValue('E8', ($sem1[0]['final_grade'] + $sem1[1]['final_grade'])/2 ?? "");
    }


    // subject 2
    if (isset($sem1[2])) {
        $cloneWorksheet->setCellValue('A9', $sem1[2]['subject_name'] ?? "");
        $cloneWorksheet->setCellValue('B9', $sem1[2]['hours'] ?? "");
        $cloneWorksheet->setCellValue('C9', $sem1[2]['final_grade'] ?? "");
        $cloneWorksheet->setCellValue('D9', $sem1[3]['final_grade'] ?? "");
        $cloneWorksheet->setCellValue('E9', ($sem1[2]['final_grade'] + $sem1[3]['final_grade'])/2 ?? "");
    }


    // subject 3
    if (isset($sem1[4])){
        $cloneWorksheet->setCellValue('A10', $sem1[4]['subject_name'] ?? "");
        $cloneWorksheet->setCellValue('B10', $sem1[4]['hours'] ?? "");
        $cloneWorksheet->setCellValue('C10', $sem1[4]['final_grade'] ?? "");
        $cloneWorksheet->setCellValue('D10', $sem1[5]['final_grade'] ?? "");
        $cloneWorksheet->setCellValue('E10', ($sem1[4]['final_grade'] + $sem1[5]['final_grade'])/2 ?? "");    
    }

    // insert sem2

    // subject 1
    if (isset($sem2[0])){
        $cloneWorksheet->setCellValue('A25', $sem2[0]['subject_name'] ?? "");
        $cloneWorksheet->setCellValue('B25', $sem2[0]['hours'] ?? "");
        $cloneWorksheet->setCellValue('C25', $sem2[0]['final_grade'] ?? "");
        $cloneWorksheet->setCellValue('D25', $sem2[1]['final_grade'] ?? "");
        $cloneWorksheet->setCellValue('E25', ($sem2[0]['final_grade'] + $sem2[1]['final_grade'])/2 ?? "");    
    }

    // subject 2
    if (isset($sem2[2])){
        $cloneWorksheet->setCellValue('A26', $sem2[2]['subject_name'] ?? "");
        $cloneWorksheet->setCellValue('B26', $sem2[2]['hours'] ?? "");
        $cloneWorksheet->setCellValue('C26', $sem2[2]['final_grade'] ?? "");
        $cloneWorksheet->setCellValue('D26', $sem2[3]['final_grade'] ?? "");
        $cloneWorksheet->setCellValue('E26', ($sem2[2]['final_grade'] + $sem2[3]['final_grade'])/2 ?? "");    
    }

    // subject 3
    if (isset($sem2[4])){
        $cloneWorksheet->setCellValue('A27', $sem2[4]['subject_name'] ?? "");
        $cloneWorksheet->setCellValue('B27', $sem2[4]['hours'] ?? "");
        $cloneWorksheet->setCellValue('C27', $sem2[4]['final_grade'] ?? "");
        $cloneWorksheet->setCellValue('D27', $sem2[5]['final_grade'] ?? "");
        $cloneWorksheet->setCellValue('E27', ($sem2[4]['final_grade'] + $sem2[5]['final_grade'])/2 ?? "");
    }

    $spreadsheet->addSheet($cloneWorksheet);
}

// remove tempsheet
$sheetIndex = $spreadsheet->getIndex($spreadsheet->getSheetByName('tempsheet'));
$spreadsheet->removeSheetByIndex($sheetIndex);


// writer
// set header, to make browser treat it as xlsx file

ob_clean();
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="result.xlsx"');

$writer->save('php://output');

// disconnect
$spreadsheet->disconnectWorksheets();
unset($spreadsheet);


function calcutateAge($dob){

    $dob = date("Y-m-d",strtotime($dob));

    $dobObject = new DateTime($dob);
    $nowObject = new DateTime();

    $diff = $dobObject->diff($nowObject);

    return $diff->y;

}