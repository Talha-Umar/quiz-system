<?php 
 include("../../../conn.php");


extract($_POST);

$delProgram = $conn->query("DELETE  FROM program_tbl WHERE prog_id='$id'  ");
if($delProgram)
{
	$res = array("res" => "success");
}
else
{
	$res = array("res" => "failed");
}



	echo json_encode($res);
 ?>