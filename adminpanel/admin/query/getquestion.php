<?php
include("../../../conn.php");

$pgid = $_POST['pgid']; 
$crid = $_POST['crid']; 
$ctid = $_POST['ctid']; 


 $selQuest = $conn->query("SELECT * FROM question_tbl WHERE prog_id='$pgid' AND cou_id='$crid' AND cat_id='$ctid' ORDER BY eqt_id desc");
 
  if($selQuest->rowCount() > 0)
  {
    $i = 1;
     while ($selQuestionRow = $selQuest->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
                <td><?php echo $i++; ?></td>
                <td>
                  <div class="form-check">
                    <input class="form-check-input" name="question[]" type="checkbox" value="<?php echo $selQuestionRow['eqt_id'];?>" id="question<?php echo $selQuestionRow['eqt_id'];?>">
                    <label class="form-check-label" for="question<?php echo $selQuestionRow['eqt_id'];?>">
                     <?php echo $selQuestionRow['exam_question'];?>
                    </label>
                  </div>
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