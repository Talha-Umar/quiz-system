<?php 
 include("../../../conn.php");


extract($_POST);

$selExamineeEmail = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_email='$email' ");


if($selExamineeEmail->rowCount() > 0)
{
	$res = array("res" => "exist", "msg" => $email);
}
else
{
	$insData = $conn->query("INSERT INTO examinee_tbl(exmne_fullname,exmne_program,exmne_course,exmne_gender,exmne_birthdate,exmne_email,exmne_password,exmne_off) VALUES('$fullname','$programSelected','$courseSelected','$gender','$bdate','$email','$password','$t_id') ");
	if($insData)
	{
		$res = array("res" => "success", "msg" => $email);
	}
	else
	{
		$res = array("res" => "failed");
	}
}


echo json_encode($res);
 ?>