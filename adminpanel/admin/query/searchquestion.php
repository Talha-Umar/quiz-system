<?php
include("../../../conn.php");

$pid = $_POST['pid']; 
$cid = $_POST['cid']; 


 $selQuest = $conn->query("SELECT * FROM question_tbl WHERE prog_id='$pid' AND cou_id='$cid' ORDER BY eqt_id desc");
 
  if($selQuest->rowCount() > 0)
  {
    $i = 1;
     while ($selQuestionRow = $selQuest->fetch(PDO::FETCH_ASSOC)) { ?>
  <tr>
   <td >
    <b><?php echo $i++ ; ?> .) <?php echo $selQuestionRow['exam_question']; ?></b><br>
<?php 
 // Choice A
   if($selQuestionRow['exam_ch1'] == $selQuestionRow['exam_answer'])
    { ?>
        <span class="pl-4 text-success">A - <?php echo  $selQuestionRow['exam_ch1']; ?></span><br>
     <?php }
      else { ?>
         <span class="pl-4">A - <?php echo $selQuestionRow['exam_ch1']; ?></span><br>
     <?php }

 // Choice B
    if($selQuestionRow['exam_ch2'] == $selQuestionRow['exam_answer'])
     { ?>
         <span class="pl-4 text-success">B - <?php echo $selQuestionRow['exam_ch2']; ?></span><br>
      <?php }
      else { ?>
       <span class="pl-4">B - <?php echo $selQuestionRow['exam_ch2']; ?></span><br>
      <?php }

// Choice C
    if($selQuestionRow['exam_ch3'] == $selQuestionRow['exam_answer'])
     { ?>
        <span class="pl-4 text-success">C - <?php echo $selQuestionRow['exam_ch3']; ?></span><br>
     <?php }
     else { ?>
      <span class="pl-4">C - <?php echo $selQuestionRow['exam_ch3']; ?></span><br>
     <?php }
 
  // Choice D
    if($selQuestionRow['exam_ch4'] == $selQuestionRow['exam_answer'])
    { ?>
       <span class="pl-4 text-success">D - <?php echo $selQuestionRow['exam_ch4']; ?></span><br>
    <?php }
      else { ?>
      <span class="pl-4">D - <?php echo $selQuestionRow['exam_ch4']; ?></span><br>
     <?php }
     ?>
                                                            
 </td>
 <td class="text-center">
     <a rel="facebox" href="facebox_modal/updateQuestion.php?id=<?php echo $selQuestionRow['eqt_id']; ?>" class="btn btn-sm btn-primary">Update</a>
    <button type="button" id="deleteQuestion" data-id='<?php echo $selQuestionRow['eqt_id']; ?>'  class="btn btn-danger btn-sm">Delete</button>
 </td>
</tr>
 <?php }
   }
    else
      { ?>
       <tr>
        <td colspan="2">
            <h3 class="p-3">No Question Found</h3>
        </td>
         </tr>
           <?php } ?>