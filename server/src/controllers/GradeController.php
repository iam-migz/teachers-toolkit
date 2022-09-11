<?php

namespace src\controllers;
use src\models\{Classrecord, ClassrecordDetail};

class GradeController
{
	private Classrecord $cr;
	private ClassrecordDetail $crd;
	public function __construct()
	{
		$this->cr = new Classrecord();
		$this->crd = new ClassrecordDetail();
	}

	public function getSubjectGrades($subject_assignment_id)
	{
		$final = [];
		$subject_cr = $this->cr->findBySubjectAssignment($subject_assignment_id);
		foreach ($subject_cr as $cr) {
			$crd = $this->crd->findBySubjectAssignment($subject_assignment_id, $cr['quarter']);
			$crd['total_highest_written'] =
				$crd['hw1'] +
				$crd['hw2'] +
				$crd['hw3'] +
				$crd['hw4'] +
				$crd['hw5'] +
				$crd['hw6'] +
				$crd['hw7'] +
				$crd['hw8'] +
				$crd['hw9'] +
				$crd['hw10'];
			$crd['total_highest_performance'] =
				$crd['hp1'] +
				$crd['hp2'] +
				$crd['hp3'] +
				$crd['hp4'] +
				$crd['hp5'] +
				$crd['hp6'] +
				$crd['hp7'] +
				$crd['hp8'] +
				$crd['hp9'] +
				$crd['hp10'];

			// classrecord
			$cr['written_total'] =
				$cr['w1'] +
				$cr['w2'] +
				$cr['w3'] +
				$cr['w4'] +
				$cr['w5'] +
				$cr['w6'] +
				$cr['w7'] +
				$cr['w8'] +
				$cr['w9'] +
				$cr['w10'];
			$cr['written_PS'] = $crd['total_highest_written']
				? ($cr['written_total'] / $crd['total_highest_written']) * 100
				: 0;
			$cr['written_WS'] = $cr['written_PS'] * ($crd['written_weight'] / 100);

			$cr['performance_total'] =
				$cr['p1'] +
				$cr['p2'] +
				$cr['p3'] +
				$cr['p4'] +
				$cr['p5'] +
				$cr['p6'] +
				$cr['p7'] +
				$cr['p8'] +
				$cr['p9'] +
				$cr['p10'];
			$cr['performance_PS'] = $crd['total_highest_performance']
				? ($cr['performance_total'] / $crd['total_highest_performance']) * 100
				: 0;
			$cr['performance_WS'] = $cr['performance_PS'] * ($crd['performance_weight'] / 100);

			$cr['quarterly_PS'] = $crd['hq1'] ? ($cr['q1'] / $crd['hq1']) * 100 : 0;
			$cr['quarterly_WS'] = $cr['quarterly_PS'] * ($crd['quarterly_weight'] / 100);

			$cr['initial_grade'] = $cr['written_WS'] + $cr['performance_WS'] + $cr['quarterly_WS'];
			$cr['final_grade'] = $this->transmutation_table($cr['initial_grade']);
			array_push($final, $cr);
		}
		echo json_encode(['result' => 1, 'data' => $final]);
	}

	public function getStudentGrades($student_id)
	{
		$final = [];
		$subject_cr = $this->cr->findStudentGrades($student_id);
		foreach ($subject_cr as $cr) {
			$crd = $this->crd->findBySubjectAssignment($cr['subject_assignment_id'], $cr['quarter']);
			$crd['total_highest_written'] =
				$crd['hw1'] +
				$crd['hw2'] +
				$crd['hw3'] +
				$crd['hw4'] +
				$crd['hw5'] +
				$crd['hw6'] +
				$crd['hw7'] +
				$crd['hw8'] +
				$crd['hw9'] +
				$crd['hw10'];
			$crd['total_highest_performance'] =
				$crd['hp1'] +
				$crd['hp2'] +
				$crd['hp3'] +
				$crd['hp4'] +
				$crd['hp5'] +
				$crd['hp6'] +
				$crd['hp7'] +
				$crd['hp8'] +
				$crd['hp9'] +
				$crd['hp10'];

			// classrecord
			$cr['written_total'] =
				$cr['w1'] +
				$cr['w2'] +
				$cr['w3'] +
				$cr['w4'] +
				$cr['w5'] +
				$cr['w6'] +
				$cr['w7'] +
				$cr['w8'] +
				$cr['w9'] +
				$cr['w10'];
			$cr['written_PS'] = $crd['total_highest_written']
				? ($cr['written_total'] / $crd['total_highest_written']) * 100
				: 0;
			$cr['written_WS'] = $cr['written_PS'] * ($crd['written_weight'] / 100);

			$cr['performance_total'] =
				$cr['p1'] +
				$cr['p2'] +
				$cr['p3'] +
				$cr['p4'] +
				$cr['p5'] +
				$cr['p6'] +
				$cr['p7'] +
				$cr['p8'] +
				$cr['p9'] +
				$cr['p10'];
			$cr['performance_PS'] = $crd['total_highest_performance']
				? ($cr['performance_total'] / $crd['total_highest_performance']) * 100
				: 0;
			$cr['performance_WS'] = $cr['performance_PS'] * ($crd['performance_weight'] / 100);

			$cr['quarterly_PS'] = $crd['hq1'] ? ($cr['q1'] / $crd['hq1']) * 100 : 0;
			$cr['quarterly_WS'] = $cr['quarterly_PS'] * ($crd['quarterly_weight'] / 100);

			$cr['initial_grade'] = $cr['written_WS'] + $cr['performance_WS'] + $cr['quarterly_WS'];
			$cr['final_grade'] = $this->transmutation_table($cr['initial_grade']);
			array_push($final, $cr);
		}
		echo json_encode(['result' => 1, 'data' => $final]);
	}

	private function transmutation_table($initial_grade)
	{
		if ($initial_grade >= 100) {
			$transmuted_grade = 100;
		} elseif ($initial_grade <= 99.99 && $initial_grade >= 98.4) {
			$transmuted_grade = 99;
		} elseif ($initial_grade <= 98.39 && $initial_grade >= 96.8) {
			$transmuted_grade = 98;
		} elseif ($initial_grade <= 96.79 && $initial_grade >= 95.2) {
			$transmuted_grade = 97;
		} elseif ($initial_grade <= 95.19 && $initial_grade >= 93.6) {
			$transmuted_grade = 96;
		} elseif ($initial_grade <= 93.59 && $initial_grade >= 92.0) {
			$transmuted_grade = 95;
		} elseif ($initial_grade <= 91.99 && $initial_grade >= 90.4) {
			$transmuted_grade = 94;
		} elseif ($initial_grade <= 90.39 && $initial_grade >= 88.8) {
			$transmuted_grade = 93;
		} elseif ($initial_grade <= 88.79 && $initial_grade >= 87.2) {
			$transmuted_grade = 92;
		} elseif ($initial_grade <= 87.19 && $initial_grade >= 85.6) {
			$transmuted_grade = 91;
		} elseif ($initial_grade <= 85.59 && $initial_grade >= 84.0) {
			$transmuted_grade = 90;
		} elseif ($initial_grade <= 83.99 && $initial_grade >= 82.4) {
			$transmuted_grade = 89;
		} elseif ($initial_grade <= 82.39 && $initial_grade >= 80.8) {
			$transmuted_grade = 88;
		} elseif ($initial_grade <= 80.79 && $initial_grade >= 79.2) {
			$transmuted_grade = 87;
		} elseif ($initial_grade <= 79.19 && $initial_grade >= 77.6) {
			$transmuted_grade = 86;
		} elseif ($initial_grade <= 77.59 && $initial_grade >= 76.0) {
			$transmuted_grade = 85;
		} elseif ($initial_grade <= 75.99 && $initial_grade >= 74.4) {
			$transmuted_grade = 84;
		} elseif ($initial_grade <= 74.39 && $initial_grade >= 72.8) {
			$transmuted_grade = 83;
		} elseif ($initial_grade <= 72.79 && $initial_grade > 71.2) {
			$transmuted_grade = 82;
		} elseif ($initial_grade <= 71.19 && $initial_grade >= 69.6) {
			$transmuted_grade = 81;
		} elseif ($initial_grade <= 69.59 && $initial_grade >= 68.0) {
			$transmuted_grade = 80;
		} elseif ($initial_grade <= 67.99 && $initial_grade >= 66.4) {
			$transmuted_grade = 79;
		} elseif ($initial_grade <= 66.39 && $initial_grade >= 64.8) {
			$transmuted_grade = 78;
		} elseif ($initial_grade <= 64.79 && $initial_grade >= 63.2) {
			$transmuted_grade = 77;
		} elseif ($initial_grade <= 63.19 && $initial_grade >= 61.6) {
			$transmuted_grade = 76;
		} elseif ($initial_grade <= 61.59 && $initial_grade >= 60.0) {
			$transmuted_grade = 75;
		} elseif ($initial_grade <= 59.99 && $initial_grade >= 56.0) {
			$transmuted_grade = 74;
		} elseif ($initial_grade <= 55.99 && $initial_grade >= 52.0) {
			$transmuted_grade = 73;
		} elseif ($initial_grade <= 51.99 && $initial_grade >= 48.0) {
			$transmuted_grade = 72;
		} elseif ($initial_grade <= 47.99 && $initial_grade >= 44.0) {
			$transmuted_grade = 71;
		} elseif ($initial_grade <= 43.99 && $initial_grade >= 40.0) {
			$transmuted_grade = 70;
		} elseif ($initial_grade <= 39.99 && $initial_grade >= 36.0) {
			$transmuted_grade = 69;
		} elseif ($initial_grade <= 35.99 && $initial_grade >= 32.0) {
			$transmuted_grade = 68;
		} elseif ($initial_grade <= 31.99 && $initial_grade >= 28.0) {
			$transmuted_grade = 67;
		} elseif ($initial_grade <= 27.99 && $initial_grade >= 24.0) {
			$transmuted_grade = 66;
		} elseif ($initial_grade <= 23.99 && $initial_grade >= 16.0) {
			$transmuted_grade = 65;
		} elseif ($initial_grade <= 19.99 && $initial_grade >= 20.0) {
			$transmuted_grade = 64;
		} elseif ($initial_grade <= 15.99 && $initial_grade >= 12.0) {
			$transmuted_grade = 63;
		} elseif ($initial_grade <= 11.99 && $initial_grade >= 8.0) {
			$transmuted_grade = 62;
		} elseif ($initial_grade <= 7.99 && $initial_grade >= 4.0) {
			$transmuted_grade = 61;
		} elseif ($initial_grade <= 3.99 && $initial_grade >= 0) {
			$transmuted_grade = 60;
		}
		return $transmuted_grade;
	}
}
