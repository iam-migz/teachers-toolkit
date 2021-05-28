<?php 
    class Classrecord {
        private $conn;

        // Properties
        public $id;
        public $subject_data_id;
        public $quarter;
        public $w1;
        public $w2;
        public $w3;
        public $w4;
        public $w5;
        public $w6;
        public $w7;
        public $w8;
        public $w9;
        public $w10;
        public $p1;
        public $p2;
        public $p3;
        public $p4;
        public $p5;
        public $p6;
        public $p7;
        public $p8;
        public $p9;
        public $p10;
        public $q1;

        public function __construct($db){
            $this->conn = $db;
        }

        public function create(){

            $query = "INSERT INTO classrecords
                      SET 
                        subject_data_id = :subject_data_id,
                        quarter = :quarter";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':subject_data_id', $this->subject_data_id);
            $stmt->bindParam(':quarter', $this->quarter);
            

            if ($stmt->execute()) {
                return true;
            }

            printf("Error Creating Classrecord: %s.\n", $stmt->error);
            return false;
        }

        public function update(){
            $query = "UPDATE classrecords 
                      SET 
                        w1 = :w1,   
                        w2 = :w2,   
                        w3 = :w3,   
                        w4 = :w4,   
                        w5 = :w5,   
                        w6 = :w6,   
                        w7 = :w7,   
                        w8 = :w8,   
                        w9 = :w9,   
                        w10 = :w10,   
                        p1 = :p1,   
                        p2 = :p2,   
                        p3 = :p3,   
                        p4 = :p4,   
                        p5 = :p5,   
                        p6 = :p6,   
                        p7 = :p7,   
                        p8 = :p8,   
                        p9 = :p9,   
                        p10 = :p10,   
                        q1 = :q1 
                    WHERE 
                        id = :id";
            $stmt = $this->conn->prepare($query);

            $this->w1 = htmlspecialchars(strip_tags($this->w1));
            $this->w2 = htmlspecialchars(strip_tags($this->w2));
            $this->w3 = htmlspecialchars(strip_tags($this->w3));
            $this->w4 = htmlspecialchars(strip_tags($this->w4));
            $this->w5 = htmlspecialchars(strip_tags($this->w5));
            $this->w6 = htmlspecialchars(strip_tags($this->w6));
            $this->w7 = htmlspecialchars(strip_tags($this->w7));
            $this->w8 = htmlspecialchars(strip_tags($this->w8));
            $this->w9 = htmlspecialchars(strip_tags($this->w9));
            $this->w10 = htmlspecialchars(strip_tags($this->w10));
            $this->p1 = htmlspecialchars(strip_tags($this->p1));
            $this->p2 = htmlspecialchars(strip_tags($this->p2));
            $this->p3 = htmlspecialchars(strip_tags($this->p3));
            $this->p4 = htmlspecialchars(strip_tags($this->p4));
            $this->p5 = htmlspecialchars(strip_tags($this->p5));
            $this->p6 = htmlspecialchars(strip_tags($this->p6));
            $this->p7 = htmlspecialchars(strip_tags($this->p7));
            $this->p8 = htmlspecialchars(strip_tags($this->p8));
            $this->p9 = htmlspecialchars(strip_tags($this->p9));
            $this->p10 = htmlspecialchars(strip_tags($this->p10));

            $this->q1 = htmlspecialchars(strip_tags($this->q1));
            $this->id = htmlspecialchars(strip_tags($this->id));
            
            $stmt->bindParam(':w1', $this->w1);
            $stmt->bindParam(':w2', $this->w2);
            $stmt->bindParam(':w3', $this->w3);
            $stmt->bindParam(':w4', $this->w4);
            $stmt->bindParam(':w5', $this->w5);
            $stmt->bindParam(':w6', $this->w6);
            $stmt->bindParam(':w7', $this->w7);
            $stmt->bindParam(':w8', $this->w8);
            $stmt->bindParam(':w9', $this->w9);
            $stmt->bindParam(':w10', $this->w10);
            
            $stmt->bindParam(':p1', $this->p1);
            $stmt->bindParam(':p2', $this->p2);
            $stmt->bindParam(':p3', $this->p3);
            $stmt->bindParam(':p4', $this->p4);
            $stmt->bindParam(':p5', $this->p5);
            $stmt->bindParam(':p6', $this->p6);
            $stmt->bindParam(':p7', $this->p7);
            $stmt->bindParam(':p8', $this->p8);
            $stmt->bindParam(':p9', $this->p9);
            $stmt->bindParam(':p10', $this->p10);

            $stmt->bindParam(':q1', $this->q1);
            $stmt->bindParam(':id', $this->id);

            if ($stmt->execute()) {
                return true;
            }

            printf("Error updating Classrecord: %s.\n", $stmt->error);
            return false;

        }
        // reads all grades of the student of a single subject
        public function read_by_subject_assignment($subject_assignment_id, $quarter){
            $query = "SELECT 	CONCAT(stud.lastname, ', ', stud.middlename, ' ', stud.firstname) as student_name, stud.gender,
                                cr.w1, cr.w2, cr.w4, cr.w3, cr.w5, cr.w6, cr.w7, cr.w8, cr.w9, cr.w10,
                                cr.p1, cr.p2, cr.p4, cr.p3, cr.p5, cr.p6, cr.p7, cr.p8, cr.p9, cr.p10,
                                cr.q1, cr.id as classrecord_id, cr.subject_data_id
                      FROM 	    subject_data sd, students stud, classrecords cr
                      WHERE 	sd.subject_assignment_id = :subject_assignment_id
                                AND sd.student_id = stud.id
                                AND sd.id = cr.subject_data_id
                                AND cr.quarter = :quarter";
            
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':subject_assignment_id', $subject_assignment_id);
            $stmt->bindParam(':quarter', $quarter);
            $stmt->execute();

            return $stmt;
        }

        // reads all the grades of each subjects of a single student
        public function read_student_grades($student_id){

            $query = "SELECT 	sub.subject_name, sub.semester, subject_data.subject_assignment_id, cr.quarter, sy.sy_start, sy.sy_end, sy.id as sy_id,
                                cr.w1, cr.w2, cr.w4, cr.w3, cr.w5, cr.w6, cr.w7, cr.w8, cr.w9, cr.w10,
                                cr.p1, cr.p2, cr.p4, cr.p3, cr.p5, cr.p6, cr.p7, cr.p8, cr.p9, cr.p10,
                                cr.q1
                        FROM 	students stud, 
                                sections sec, 
                                school_years sy,
                                subjects sub, 
                                subject_assignments, 
                                student_assignments, 
                                subject_data,
                                classrecords cr
                        WHERE 	
                                stud.id = :student_id AND 
                                stud.id = student_assignments.student_id AND 
                                student_assignments.section_id = sec.id AND 
                                sec.id = subject_assignments.section_id AND 
                                sec.school_year_id = sy.id AND 
                                sub.id = subject_assignments.subject_id AND 
                                subject_data.subject_assignment_id = subject_assignments.id AND 
                                subject_data.student_id = stud.id AND 
                                subject_data.id = cr.subject_data_id";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':student_id', $student_id);
            $stmt->execute();

            return $stmt;
        }

    }