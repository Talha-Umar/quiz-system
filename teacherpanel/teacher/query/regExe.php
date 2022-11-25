<?php 
 include("../../../conn.php");

 extract($_POST);

 $selCourse = $conn->query("SELECT * FROM teacher_tbl WHERE email='$email'");

 if($selCourse->rowCount() > 0)
 {
	$res = array("res" => "exist", "email" => $email);
 }
 else
 {
    
	$insCourse = $conn->query("INSERT INTO teacher_tbl(name,email,password) VALUES('$name','$email','$pass') ");
	if($insCourse)
	{
		$res = array("res" => "success", "email" => $email);
	}
	else
	{
		$res = array("res" => "failed", "course_name" => $course_name);
	}


 }




 echo json_encode($res);
 ?>