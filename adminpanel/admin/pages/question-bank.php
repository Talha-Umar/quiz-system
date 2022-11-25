<div class="app-main__outer">
        <div class="app-main__inner">
                <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div><b>QUESTION BANK</b></div>
                    </div>
                </div>
                </div> 

    <div class="col-md-12">
    <?php 
 $selQuest = $conn->query("SELECT * FROM question_tbl ORDER BY eqt_id desc"); ?>
        <div class="main-card mb-3 card">
             <div class="card-header">
                <div  class="row" style="width: 100% !important;">
                    <div  class="col-md-4">
                        <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>
                        Question's 
                       <span class="badge badge-pill badge-primary ml-2">
                              <?php echo $selQuest->rowCount(); ?>
                            </span>
                    </div>
        <div class="col-md-4">
       <form id="searchQ" method="post">
            <div class="form-row">
             <div class="col-md-6">
              <select class="form-control" name="programSelected" id="sprogram" required>
              <option value="">Select Program</option>
               <?php 
                $selProgram = $conn->query("SELECT * FROM program_tbl ORDER BY prog_id DESC");
                if($selProgram->rowCount() > 0)
                {
                  while ($selProgramRow = $selProgram->fetch(PDO::FETCH_ASSOC)) { ?>
                     <option value="<?php echo $selProgramRow['prog_id']; ?>"><?php echo $selProgramRow['prog_name']; ?></option>
                  <?php }
                }
                else
                { ?>
                  <option value="0">No Program Found</option>
                <?php }
               ?>
            </select>
              </div>
           <div class="col-md-6">
              <select class="form-control" name="courseSelected" id="scourse" required>
               <option value="">Select Course</option>
            </select>
              </div>
            </div>
        </form>
  </div>
  <div class="col-md-4">

    <a class="btn btn-success float-right" href="#" data-toggle="modal" data-target="#modalForAddQuestion">
                                                <i class="metismenu-icon"></i>
                                                Add Question
                                            </a>
      
  </div>
                </div>
                
  
    </div>
                          <div class="card-body" >
                            <div class="scroll-area-sm" style="min-height: 400px;">
                               <div class="scrollbar-container">

<div class="table-responsive">
    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
<tbody id="searchresult">
<?php 
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
           <?php }?>
            </tbody>
             </table>
              </div>
                                               </div>
                            </div>


                          </div>
                        
                      </div>
                  </div>   
                    
     
      
        
</div>