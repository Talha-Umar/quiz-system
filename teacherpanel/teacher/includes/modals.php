<!-- Modal For Add Exam -->
<div class="modal fade" id="modalForExam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addExamFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Exam</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Program</label>
            <input type="hidden" id="tid" name="t_id" value="<?php echo $teacher_id; ?>">
            <select class="form-control" name="programSelected" id="program" required>
              <option value="">Select Program</option>
              <?php 
                $selProgram = $conn->query("SELECT * FROM assign_tbl WHERE t_id='$teacher_id'");
                if($selProgram->rowCount() > 0)
                {
                  while ($selProgramRow = $selProgram->fetch(PDO::FETCH_ASSOC)) { ?>
                     <option value="<?php echo $selProgramRow['p_id']; ?>"><?php 
                     $pid=$selProgramRow['p_id'];
                     $selP = $conn->query("SELECT * FROM program_tbl WHERE prog_id='$pid'");
                     $selPRow = $selP->fetch(PDO::FETCH_ASSOC);
                     echo $selPRow['prog_name'];
                   ?></option>
                  <?php }
                }
                else
                { ?>
                  <option value="">No Program Found</option>
                <?php }
               ?>
            </select>
          </div>
          <div class="form-group">
            <label>Course</label>
            <select class="form-control" name="courseSelected" id="course" required>
               <option value="">Select Course</option>
            </select>
          </div>

          <div class="form-group">
            <label>Exam Time Limit</label>
            <select class="form-control" name="timeLimit" required="">
              <option value="0">Select time</option>
              <option value="10">10 Minutes</option> 
              <option value="20">20 Minutes</option> 
              <option value="30">30 Minutes</option> 
              <option value="40">40 Minutes</option> 
              <option value="50">50 Minutes</option> 
              <option value="60">60 Minutes</option> 
            </select>
          </div>

          <div class="form-group">
            <label>Question Limit to Display</label>
            <input type="number" name="examQuestDipLimit" id="" class="form-control" placeholder="Input question limit to display">
          </div>

          <div class="form-group">
            <label>Exam Title</label>
            <input type="" name="examTitle" class="form-control" placeholder="Input Exam Title" required="">
          </div>

          <div class="form-group">
            <label>Exam Description</label>
            <textarea name="examDesc" class="form-control" rows="4" placeholder="Input Exam Description" required=""></textarea>
          </div>


        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Now</button>
      </div>
    </div>
   </form>
  </div>
</div>


<!-- Modal For Add Examinee -->
<div class="modal fade" id="modalForAddExaminee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addExamineeFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Examinee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Fullname</label>
            <input type="" name="fullname" id="fullname" class="form-control" placeholder="Input Fullname" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Birhdate</label>
            <input type="date" name="bdate" id="bdate" class="form-control" placeholder="Input Birhdate" autocomplete="off" >
          </div>
          <div class="form-group">
            <label>Gender</label>
            <select class="form-control" name="gender" id="gender">
              <option value="0">Select gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
           <div class="form-group">
            <label>Program</label>
            <input type="hidden" id="Tid" name="t_id" value="<?php echo $teacher_id; ?>">
            <select class="form-control" name="programSelected" id="Program" required>
              <option value="">Select Program</option>
              <?php 
                $selProgram = $conn->query("SELECT * FROM assign_tbl WHERE t_id='$teacher_id'");
                if($selProgram->rowCount() > 0)
                {
                  while ($selProgramRow = $selProgram->fetch(PDO::FETCH_ASSOC)) { ?>
                     <option value="<?php echo $selProgramRow['p_id']; ?>"><?php 
                     $pid=$selProgramRow['p_id'];
                     $selP = $conn->query("SELECT * FROM program_tbl WHERE prog_id='$pid'");
                     $selPRow = $selP->fetch(PDO::FETCH_ASSOC);
                     echo $selPRow['prog_name'];
                   ?></option>
                  <?php }
                }
                else
                { ?>
                  <option value="">No Program Found</option>
                <?php }
               ?>
            </select>
          </div>
          <div class="form-group">
            <label>Course</label>
            <select class="form-control" name="courseSelected" id="Course" required>
               <option value="">Select Course</option>
            </select>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Input Email" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Input Password" autocomplete="off" required="">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Now</button>
      </div>
    </div>
   </form>
  </div>
</div>



<!-- Modal For Add Question Bank -->
<div class="modal fade" id="modalForAddQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addQuestionFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Question </h5> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Program</label>
            <input type="hidden" id="tid" name="t_id" value="<?php echo $teacher_id; ?>">
            <select class="form-control" name="programSelected" id="qprogram" required>
              <option value="">Select Program</option>
              <?php 
                $selProgram = $conn->query("SELECT * FROM assign_tbl WHERE t_id='$teacher_id'");
                if($selProgram->rowCount() > 0)
                {
                  while ($selProgramRow = $selProgram->fetch(PDO::FETCH_ASSOC)) { ?>
                     <option value="<?php echo $selProgramRow['p_id']; ?>"><?php 
                     $pid=$selProgramRow['p_id'];
                     $selP = $conn->query("SELECT * FROM program_tbl WHERE prog_id='$pid'");
                     $selPRow = $selP->fetch(PDO::FETCH_ASSOC);
                     echo $selPRow['prog_name'];
                   ?></option>
                  <?php }
                }
                else
                { ?>
                  <option value="">No Program Found</option>
                <?php }
               ?>
            </select>
          </div>
          <div class="form-group">
            <label>Course</label>
            <select class="form-control" name="courseSelected" id="qcourse" required>
               <option value="">Select Course</option>
            </select>
          </div>

           <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="categoryselected" required>
              <option value="">Select Category</option>
              <?php 
                $selCategory= $conn->query("SELECT * FROM question_category");
                if($selCategory->rowCount() > 0)
                {
                  while ($selCategoryRow = $selCategory->fetch(PDO::FETCH_ASSOC)) { ?>
                     <option value="<?php echo $selCategoryRow['id']; ?>"><?php echo $selCategoryRow['type']; ?></option>
                  <?php }
                }
                else
                { ?>
                  <option value="">No Program Found</option>
                <?php }
               ?>
            </select>
          </div>
<hr>
          <div class="form-group">
            <label>Question</label>
            <input type="" name="question" id="course_name" class="form-control" placeholder="Input question" autocomplete="off">
          </div>

          <fieldset>
            <legend>Input word for choice's</legend>
            <div class="form-group">
                <label>Choice A</label>
                <input type="" name="choice_A" id="choice_A" class="form-control" placeholder="Input choice A" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Choice B</label>
                <input type="" name="choice_B" id="choice_B" class="form-control" placeholder="Input choice B" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Choice C</label>
                <input type="" name="choice_C" id="choice_C" class="form-control" placeholder="Input choice C" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Choice D</label>
                <input type="" name="choice_D" id="choice_D" class="form-control" placeholder="Input choice D" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Correct Answer</label>
                <input type="" name="correctAnswer" id="" class="form-control" placeholder="Input correct answer" autocomplete="off">
            </div>
          </fieldset>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Now</button>
      </div>
    </div>
   </form>
  </div>
</div>

<!-- Modal For Add Question Exam -->
<div class="modal fade" id="modalForAddQuestionEx" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addQuestionFrmExe" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Questions for <br><?php echo $selExamRow['ex_title']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            <div class="form-group">
              <input type="hidden" name="examId" value="<?php echo $exId; ?>">
              <input type="hidden" id="programId" value="<?php echo $selExamRow['prog_id']; ?>">
          </div>
          <div class="form-group">
                  <label>Course</label>
                  <select class="form-control" id="courseId" disabled>
                    <option value="<?php echo $selExamRow['cou_id']; ?>"><?php echo $selCourse['courseName']; ?></option>
                                 
                  </select>
              </div>

           <div class="form-group">
            <label>Category</label>
            <select class="form-control" id="Category" required>
              <option value="">Select Category</option>
              <?php 
                $selCategory= $conn->query("SELECT * FROM question_category");
                if($selCategory->rowCount() > 0)
                {
                  while ($selCategoryRow = $selCategory->fetch(PDO::FETCH_ASSOC)) { ?>
                     <option value="<?php echo $selCategoryRow['id']; ?>"><?php echo $selCategoryRow['type']; ?></option>
                  <?php }
                }
                else
                { ?>
                  <option value="">No Program Found</option>
                <?php }
               ?>
            </select>
          </div>
<hr>
          <table class="table table-bordered" style="width: 100%;">
            <thead>
              <tr>
              <th>Sr</th>
              <th>Question</th>
            </tr>
            </thead>
            <tbody id="searchresults">
              
              
            </tbody>
          </table>

         
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Now</button>
      </div>
    </div>
   </form>
  </div>
</div>