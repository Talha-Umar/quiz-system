<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>MANAGE TEACHERS</div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Courses Assign List
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th class="text-left pl-4">Teacher Name</th>
                                <th class="text-left pl-4">Course Name</th>
                                <th class="text-left pl-4">Program Name</th>
                                <th class="text-center" width="20%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selCourse = $conn->query("SELECT * FROM assign_tbl ORDER BY id DESC ");
                                if($selCourse->rowCount() > 0)
                                {
                                    while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
   <tr>
    <td class="pl-4">
     <?php 
     $t_id=$selCourseRow['t_id'];
     $selTeacher = $conn->query("SELECT * FROM teacher_tbl WHERE id='$t_id' ");
        $selTeacherRow = $selTeacher->fetch(PDO::FETCH_ASSOC);
          echo $selTeacherRow['name'];
      ?>
    </td>
    <td class="pl-4">
     <?php 
     $c_id=$selCourseRow['c_id'];
     $selCourse1 = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$c_id' ");
        $selCourseRow1 = $selCourse1->fetch(PDO::FETCH_ASSOC);
          echo $selCourseRow1['cou_name'];
      ?>
    </td>
    <td class="pl-4">
      <?php 
      $p_id= $selCourseRow['p_id'];
       $selProgram = $conn->query("SELECT * FROM program_tbl WHERE prog_id='$p_id' ");
        $selProgramRow = $selProgram->fetch(PDO::FETCH_ASSOC);
          echo $selProgramRow['prog_name'];
       ?>
    </td>
                                             
    <td class="text-center">
        <button type="button" id="deleteCourseAssign" data-id='<?php echo $selCourseRow['id']; ?>'  class="btn btn-warning btn-sm">Remove</button>
    </td>
</tr>
 <?php }
}
else { ?>
    <tr>
        <td colspan="2">
         <h3 class="p-3">No Course Found</h3>
        </td>
    </tr>
   <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      
        
</div>
         
