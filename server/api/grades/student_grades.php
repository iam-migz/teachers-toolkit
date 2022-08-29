<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    if ( !isset($_GET['student_id']) ){
        echo json_encode(
            array('result' => 0, 'message' => 'missing id')
        );
        return;
    }

    // student grades all subjects
    $response = file_get_contents('http://localhost/teachers-toolkit-app/server/api/classrecord/read_student_grades.php?student_id='.$_GET['student_id']);
    $student_data = json_decode($response, true);

    if (empty($student_data)) {
        return;
   }
    $student_data = $student_data['data'];
    $student_grade = [];

    foreach($student_data as $cr) {

        // classrecord detail
        $response = file_get_contents('http://localhost/teachers-toolkit-app/server/api/classrecord_detail/read_by_subject_assignment.php?subject_assignment_id='.$cr['subject_assignment_id'].'&quarter='.$cr['quarter']);
        $crd = json_decode($response, true);
        $crd['total_highest_written'] = $crd['hw1'] + $crd['hw2'] + $crd['hw3'] + $crd['hw4'] + $crd['hw5'] + $crd['hw6'] + $crd['hw7'] + $crd['hw8'] + $crd['hw9'] + $crd['hw10'];  
        $crd['total_highest_performance'] = $crd['hp1'] + $crd['hp2'] + $crd['hp3'] + $crd['hp4'] + $crd['hp5'] + $crd['hp6'] + $crd['hp7'] + $crd['hp8'] + $crd['hp9'] + $crd['hp10'];  

        // classrecord
        $cr['written_total'] = $cr['w1'] + $cr['w2'] + $cr['w3'] + $cr['w4'] + $cr['w5'] + $cr['w6'] + $cr['w7'] + $cr['w8'] + $cr['w9'] + $cr['w10'];
        $cr['written_PS'] = $crd['total_highest_written'] ? ($cr['written_total']/$crd['total_highest_written']) * 100 : 0; 
        $cr['written_WS'] = $cr['written_PS'] * ($crd['written_weight']/100);

        $cr['performance_total'] = $cr['p1'] + $cr['p2'] + $cr['p3'] + $cr['p4'] + $cr['p5'] + $cr['p6'] + $cr['p7'] + $cr['p8'] + $cr['p9'] + $cr['p10'];
        $cr['performance_PS'] = $crd['total_highest_performance'] ? ($cr['performance_total']/$crd['total_highest_performance']) * 100 : 0; 
        $cr['performance_WS'] = $cr['performance_PS'] * ($crd['performance_weight']/100);

        $cr['quarterly_PS'] = $crd['hq1'] ? ($cr['q1'] / $crd['hq1'])*100 : 0 ;
        $cr['quarterly_WS'] = $cr['quarterly_PS'] * ($crd['quarterly_weight']/100);

        $cr['initial_grade'] = $cr['written_WS'] + $cr['performance_WS'] + $cr['quarterly_WS'];
        $cr['final_grade'] = transmutation_table($cr['initial_grade']);

        array_push($student_grade, $cr);
    }

    echo json_encode($student_grade);
    


    function transmutation_table($initial_grade){

        if($initial_grade >= 100){
            $transmuted_grade = 100;
        } else if ($initial_grade <= 99.99 && $initial_grade >= 98.40){
            $transmuted_grade = 99;
        }  else if ($initial_grade <= 98.39 && $initial_grade >= 96.80){
            $transmuted_grade = 98;
        }  else if ($initial_grade <= 96.79 && $initial_grade >= 95.20){
            $transmuted_grade = 97;
        }  else if ($initial_grade <= 95.19 && $initial_grade >= 93.60){
            $transmuted_grade = 96;
        }  else if ($initial_grade <= 93.59 && $initial_grade >= 92.00){
            $transmuted_grade = 95;
        }  else if ($initial_grade <= 91.99 && $initial_grade >= 90.40){
            $transmuted_grade = 94;
        } else if ($initial_grade <= 90.39 && $initial_grade >= 88.80){
            $transmuted_grade = 93;
        } else if ($initial_grade <= 88.79 && $initial_grade >= 87.20){
            $transmuted_grade = 92;
        } else if ($initial_grade <= 87.19 && $initial_grade >= 85.60){
            $transmuted_grade = 91;
        } else if ($initial_grade <= 85.59 && $initial_grade >= 84.00){
            $transmuted_grade = 90;
        } else if ($initial_grade <= 83.99 && $initial_grade >= 82.40){
            $transmuted_grade = 89;
        } else if ($initial_grade <= 82.39 && $initial_grade >= 80.80){
            $transmuted_grade = 88;
        } else if ($initial_grade <= 80.79 && $initial_grade >= 79.20){
            $transmuted_grade = 87;
        } else if ($initial_grade <= 79.19 && $initial_grade >= 77.60){
            $transmuted_grade = 86;
        } else if ($initial_grade <= 77.59 && $initial_grade >= 76.00){
            $transmuted_grade = 85;
        } else if ($initial_grade <= 75.99 && $initial_grade >= 74.40){
            $transmuted_grade = 84;
        } else if ($initial_grade <= 74.39 && $initial_grade >= 72.80){
            $transmuted_grade = 83;
        } else if ($initial_grade <= 72.79 && $initial_grade > 71.20){
            $transmuted_grade = 82;
        } else if ($initial_grade <= 71.19 && $initial_grade >= 69.60){
            $transmuted_grade = 81;
        } else if ($initial_grade <= 69.59 && $initial_grade >= 68.00){
            $transmuted_grade = 80;
        } else if ($initial_grade <= 67.99 && $initial_grade >= 66.40){
            $transmuted_grade = 79;
        } else if ($initial_grade <= 66.39 && $initial_grade >= 64.80){
            $transmuted_grade = 78;
        } else if ($initial_grade <= 64.79 && $initial_grade >= 63.20){
            $transmuted_grade = 77;
        } else if ($initial_grade <= 63.19 && $initial_grade >= 61.60){
            $transmuted_grade = 76;
        } else if ($initial_grade <= 61.59 && $initial_grade >= 60.00){
            $transmuted_grade = 75;
        } else if ($initial_grade <= 59.99 && $initial_grade >= 56.00){
            $transmuted_grade = 74;
        } else if ($initial_grade <= 55.99 && $initial_grade >= 52.00){
            $transmuted_grade = 73;
        } else if ($initial_grade <= 51.99 && $initial_grade >= 48.00){
            $transmuted_grade = 72;
        } else if ($initial_grade <= 47.99 && $initial_grade >= 44.00){
            $transmuted_grade = 71;
        } else if ($initial_grade <= 43.99 && $initial_grade >= 40.00){
            $transmuted_grade = 70;
        } else if ($initial_grade <= 39.99 && $initial_grade >= 36.00){
            $transmuted_grade = 69;
        } else if ($initial_grade <= 35.99 && $initial_grade >= 32.00){
            $transmuted_grade = 68;
        } else if ($initial_grade <= 31.99 && $initial_grade >= 28.00){
            $transmuted_grade = 67;
        } else if ($initial_grade <= 27.99 && $initial_grade >= 24.00){
            $transmuted_grade = 66;
        } else if ($initial_grade <= 23.99 && $initial_grade >= 16.00){
            $transmuted_grade = 65;
        } else if ($initial_grade <= 19.99 && $initial_grade >= 20.00){
            $transmuted_grade = 64;
        } else if ($initial_grade <= 15.99 && $initial_grade >= 12.00){
            $transmuted_grade = 63;
        } else if ($initial_grade <= 11.99 && $initial_grade >= 8.00){
            $transmuted_grade = 62;
        } else if ($initial_grade <= 7.99 && $initial_grade >= 4.00){
            $transmuted_grade = 61;
        } else if ($initial_grade <= 3.99 && $initial_grade >= 0){
            $transmuted_grade = 60;
        } 
        return $transmuted_grade;
    }