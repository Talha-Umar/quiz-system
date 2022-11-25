<?php 
 include("../../../conn.php");

extract($_POST);
foreach($question as $quet) {

$selQuest = $conn->query("SELECT * FROM exam_question_tbl WHERE exam_id ='$examId' AND que_id='$quet'");
if($selQuest->rowCount() > 0)
{
  $res = array("res" => "exist", "msg" => $question);
}
else
{
	$insQuest = $conn->query("INSERT INTO exam_question_tbl(exam_id,que_id) VALUES('$examId','$quet') ");

	if($insQuest)
	{
       $res = array("res" => "success", "msg" => $question);
	}
	else
	{
       $res = array("res" => "failed");
	}
}

}

echo json_encode($res);
 ?>