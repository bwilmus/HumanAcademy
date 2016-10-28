<?php

function getStudentList() {
	
	$db = new PDO('mysql:host=localhost;dbname=hbtraining;charset=utf8', 'root', '');
    $students = $db->query('select * from student order by student_lastname');
    $db = null;
    return array("students" => $students);

}


function getStudentById($id) {
	
	$db = new PDO('mysql:host=localhost;dbname=hbtraining;charset=utf8', 'root', '');
    $rs = $db->query('select * from student where student_id ='.$id);
    $student = $rs->fetch();
    $db = null;
    return $student;

}

function getStudentForm($params) {

	$params['student_gender'] = "M";
	$message = "";

	if(isset($params["form_id"]) && $params["form_id"] == "student_form"){

		$db = new PDO('mysql:host=localhost;dbname=hbtraining;charset=utf8', 'root', '');

		if($params['student_id'] == 0){
			$action = "created";

				$sql = "INSERT INTO student (
				  student_firstname,
				  student_lastname,
				  student_email,
				  student_gender
				)
				VALUES
				  (
				    :student_firstname,
				    :student_lastname,
				    :student_email,
				    :student_gender
				  )";


		} else {
			$action = "updated";
			$sql = "UPDATE student
					SET
					  student_firstname = :student_firstname,
					  student_lastname = :student_lastname,
					  student_email = :student_email,
					  student_gender = :student_gender
					WHERE student_id = :student_id";			

		}



		$query = $db->prepare($sql);

		$query->bindValue(":student_firstname", $params['student_firstname'], PDO::PARAM_STR);
		$query->bindValue(":student_lastname", $params['student_lastname'], PDO::PARAM_STR);
		$query->bindValue(":student_email", $params['student_email'], PDO::PARAM_STR);
		$query->bindValue(":student_gender", $params['student_gender'], PDO::PARAM_STR);
		if($action == "updated") $query->bindValue(":student_id", $params['student_id'], PDO::PARAM_INT);

		$query->execute();

		if ($query->rowCount() == 1) {
			$message = "This student has been ".$action;
			if($action == "created") $params["id"] = $db->lastInsertId();
		} else {
			$message = "Nothing has changed";
		}

		$db = null;

		
		
	} 
	if(isset($params["id"])) {
		$student = getStudentById($params["id"]);
	} else {
		$student["student_id"] = 0;
		$student["student_firstname"] = "";
		$student["student_lastname"] = "";
		$student["student_email"] = "";
	}

	
	return array("student" => $student, "message" => $message);


}

?>