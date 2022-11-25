<?php 

 include("../../../conn.php");

$pid = $_POST['pid'];
$tid = $_POST['tid'];  
 
 $selCourse = $conn->query("SELECT * FROM assign_tbl WHERE p_id='$pid' AND t_id='$tid'");  

$users_arr = array();
while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)){
   $cid=$selCourseRow['c_id'];
    $selC = $conn->query("SELECT * FROM course_tbl WHERE cou_id ='$cid'");
    $selCRow = $selC->fetch(PDO::FETCH_ASSOC);

    $userid = $selCourseRow['c_id'];
    $name = $selCRow['cou_name'];

    $users_arr[] = array("id" => $userid, "name" => $name);

}
// encoding array to json format
echo json_encode($users_arr); 