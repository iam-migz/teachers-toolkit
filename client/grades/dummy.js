// create admin
({
	password: '',
	firstname: '',
	lastname: '',
	middlename: '',
	phone_no: '',
	email: '',
});

// update school
({
	id: '5',
	barangay: '',
	city: '',
	province: '',
	country: '',
	postal_code: '',
	principal_fn: '',
	principal_ln: '',
	principal_mn: '',
	school_name: '',
});

// create student
({
	firstname: 'firstname',
	lastname: 'lastname',
	middlename: 'middlename',
	email: 'email',
	province: 'province',
	city: 'city',
	barangay: 'barangay',
	gender: 'gender',
	LRN: 'LRN',
	birthdate: 'birthdate',
});

// create teacher
({
	firstname: 'firstname',
	lastname: 'lastname',
	middlename: 'middlename',
	phone_no: '092841042',
	email: 'example@gmail.com',
}(
	// create section

	{
		advisor_id: '1',
		section_name: 'section_name',
		strand: 'STEM',
		track: 'Academic',
		grade: '11',
	}
));

// create subject

({
	subject_name: 'math',
	semester: '1',
	hours: '80',
});

// school year
({
	school_id: '1',
	sy_start: '',
	sy_end: '',
});

// subject assignment
({
	section_id: '',
	subject_id: '',
	teacher_id: '',
	school_year_id: '',
});
