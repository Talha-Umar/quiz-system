<?php 
$exmneId = $_SESSION['examineeSession']['exmne_id'];

// Select Data sa nilogin nga examinee
$selExmneeTeacher = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_id='$exmneId' ")->fetch(PDO::FETCH_ASSOC);
$exmne_off  =  $selExmneeTeacher['exmne_off'];
$exmneCourse1=$selExmneeTeacher['exmne_course'];
$exmneProgram1=$selExmneeTeacher['exmne_program'];

$selExmneeData = $conn->query("SELECT * FROM assign_tbl WHERE t_id='$exmne_off' AND  c_id='$exmneCourse1' AND p_id='$exmneProgram1'")->fetch(PDO::FETCH_ASSOC);
$exmneCourse  =  $selExmneeData['c_id'];
$exmneProgram =  $selExmneeData['p_id'];



        
// Select and tanang exam depende sa course nga ni login 
$selExam = $conn->query("SELECT * FROM exam_tbl WHERE prog_id='$exmneProgram' AND cou_id='$exmneCourse' ORDER BY ex_id DESC ");


//

 ?>