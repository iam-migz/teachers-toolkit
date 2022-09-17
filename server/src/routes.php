<?php

use src\controllers\{
  UserController, 
  AdminController, 
  SchoolController, 
  SchoolYearController,
  StudentController, 
  TeacherController, 
  SubjectController, 
  SectionController, 
  StudentAssignController, 
  SubjectAssignController,
  ClassrecordController, 
  ClassrecordDetailController, 
  GradeController
};

return [
  ['POST', '/user/login', UserController::class . '@login'],
  ['POST', '/user/changePass', UserController::class . '@changePass'],
  ['GET', '/user/test', UserController::class . '@funBee'],

  ['POST', '/admin/create', AdminController::class . '@create'],
  ['GET', '/admin/findOne/{id:\d+}', AdminController::class . '@findOne'],

  ['POST', '/school/create', SchoolController::class . '@create'],
  ['PUT', '/school/update', SchoolController::class . '@update'],
  ['GET', '/school/findOne/{id:\d+}', SchoolController::class . '@findOne'],

  ['POST', '/schoolyear/create', SchoolYearController::class . '@create'],
  ['GET', '/schoolyear/findOne/{id:\d+}', SchoolYearController::class . '@findOne'],
  ['GET', '/schoolyear/findAll/{id:\d+}', SchoolYearController::class . '@findAll'],

  ['POST', '/student/create', StudentController::class . '@create'],
  ['PUT', '/student/update', StudentController::class . '@update'],
  ['GET', '/student/findOne/{id:\d+}', StudentController::class . '@findOne'],
  ['GET', '/student/findBySchoolId/{id:\d+}', StudentController::class . '@findBySchoolId'],

  ['POST', '/teacher/create', TeacherController::class . '@create'],
  ['PUT', '/teacher/update', TeacherController::class . '@update'],
  ['GET', '/teacher/findOne/{id:\d+}', TeacherController::class . '@findOne'],
  ['GET', '/teacher/findBySchoolId/{id:\d+}', TeacherController::class . '@findBySchoolId'],

  ['POST', '/subject/create', SubjectController::class . '@create'],
  ['PUT', '/subject/update', SubjectController::class . '@update'],
  ['GET', '/subject/findById/{id:\d+}', SubjectController::class . '@findById'],
  ['GET', '/subject/findBySchoolYearId/{id:\d+}', SubjectController::class . '@findBySchoolYearId'],
  ['GET', '/subject/findBySectionId/{id:\d+}', SubjectController::class . '@findBySectionId'],

  ['POST', '/section/create', SectionController::class . '@create'],
  ['PUT', '/section/update', SectionController::class . '@update'],
  ['GET', '/section/findById/{id:\d+}', SectionController::class . '@findById'],
  ['GET', '/section/findBySYID/{id:\d+}', SectionController::class . '@findBySYID'],
  ['GET', '/section/findByAdvisorIdAndSYID/{id:\d+}/{sy_id:\d+}', SectionController::class . '@findByAdvisorIdAndSYID'],

  ['POST', '/studentassign/create', StudentAssignController::class . '@create'],
  ['GET', '/studentassign/findUnassignedStudents/{id:\d+}', StudentAssignController::class . '@findUnassignedStudents'],
  ['GET', '/studentassign/findBySectionId/{id:\d+}', StudentAssignController::class . '@findBySectionId'],

  ['POST', '/subjectassign/create', SubjectAssignController::class . '@create'],
  ['GET', '/subjectassign/findBySYID/{id:\d+}', SubjectAssignController::class . '@findBySYID'],
  ['GET', '/subjectassign/findTeacherSubjects/{id:\d+}/{sy_id:\d+}', SubjectAssignController::class . '@findTeacherSubjects'],

  ['PUT', '/classrecord/update', ClassrecordController::class . '@update'],
  ['GET', '/classrecord/findBySubjectAssignment/{id:\d+}', ClassrecordController::class . '@findBySubjectAssignment'],
  ['GET', '/classrecord/findStudentGrades/{id:\d+}', ClassrecordController::class . '@findStudentGrades'],

  ['PUT', '/classrecorddetail/update', ClassrecordDetailController::class . '@update'],
  ['GET', '/classrecorddetail/findBySubjectAssignment/{id:\d+}/{quarter:\d+}', ClassrecordDetailController::class . '@findBySubjectAssignment'],

  ['GET', '/grade/getSubjectGrades/{subject_assignment_id:\d+}', GradeController::class . '@getSubjectGrades'],
  ['GET', '/grade/getStudentGrades/{student_id:\d+}', GradeController::class . '@getStudentGrades'],
];
