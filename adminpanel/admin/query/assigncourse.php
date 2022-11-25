<?php 
 include("../../../conn.php");

 extract($_POST);

 $selCourse = $conn->query("SELECT * FROM assign_tbl WHERE t_id='$teacherSelected' AND c_id='$courseSelected' ");

 if($selCourse->rowCount() > 0)
 {
	$res = array("res" => "exist");
 }
 else
 {
    
	$insCourse = $conn->query("INSERT INTO assign_tbl(t_id,p_id,c_id) VALUES('$teacherSelected','$programSelected','$courseSelected') ");
	if($insCourse)
	{
		$res = array("res" => "success");
	}
	else
	{
		$res = array("res" => "failed");
	}


 }




 echo json_encode($res);
 ?>