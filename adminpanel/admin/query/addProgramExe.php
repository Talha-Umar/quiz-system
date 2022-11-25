<?php 
 include("../../../conn.php");

 extract($_POST);

$program_name = strtoupper($program_name);
 $selProgram = $conn->query("SELECT * FROM program_tbl WHERE prog_name='$program_name'");

 if($selProgram->rowCount() > 0)
 {
	$res = array("res" => "exist", "program_name" => $program_name);
 }
 else
 {
    
	$insProgram = $conn->query("INSERT INTO program_tbl(prog_name) VALUES('$program_name') ");
	if($insProgram)
	{
		$res = array("res" => "success", "program_name" => $program_name);
	}
	else
	{
		$res = array("res" => "failed", "program_name" => $program_name);
	}


 }




 echo json_encode($res);
 ?>