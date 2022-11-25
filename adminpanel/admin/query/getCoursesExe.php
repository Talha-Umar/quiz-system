<?php 

 include("../../../conn.php");

$pid = $_POST['pid'];  
 
 $selCourse = $conn->query("SELECT * FROM course_tbl WHERE prog_id='$pid' ORDER BY cou_id DESC");  

$users_arr = array();
while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)){

    $userid = $selCourseRow['cou_id'];
    $name = $selCourseRow['cou_name'];

    $users_arr[] = array("id" => $userid, "name" => $name);

}
// encoding array to json format
echo json_encode($users_arr); 