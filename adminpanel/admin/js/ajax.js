// Admin Log in
$(document).on("submit","#adminLoginFrm", function(){
   $.post("query/loginExe.php", $(this).serialize(), function(data){
      if(data.res == "invalid")
      {
        Swal.fire(
          'Invalid',
          'Please input valid username / password',
          'error'
        )
      }
      else if(data.res == "success")
      {
        $('body').fadeOut();
        window.location.href='home.php';
      }
   },'json');

   return false;
});

// Add Department
$(document).on("submit","#addDepartmentFrm" , function(){
  $.post("query/addDepartmentExe.php", $(this).serialize() , function(data){
    if(data.res == "exist")
    {
      Swal.fire(
        'Already Exist',
        data.department_name.toUpperCase() + ' Already Exist',
        'error'
      )
    }
    else if(data.res == "success")
    {
      Swal.fire(
        'Success',
        data.department_name.toUpperCase() + ' Successfully Added',
        'success'
      )
          // $('#department_name').val("");
          refreshDiv();
            setTimeout(function(){ 
                $('#body').load(document.URL);
             }, 2000);
    }
  },'json')
  return false;
});

// Add Program
$(document).on("submit","#addProgramFrm" , function(){
  $.post("query/addProgramExe.php", $(this).serialize() , function(data){
    if(data.res == "exist")
    {
      Swal.fire(
        'Already Exist',
        data.program_name.toUpperCase() + ' Already Exist',
        'error'
      )
    }
    else if(data.res == "success")
    {
      Swal.fire(
        'Success',
        data.program_name.toUpperCase() + ' Successfully Added',
        'success'
      )
          // $('#program_name').val("");
          refreshDiv();
            setTimeout(function(){ 
                $('#body').load(document.URL);
             }, 2000);
    }
  },'json')
  return false;
});

// Add Course 
$(document).on("submit","#addCourseFrm" , function(){
  $.post("query/addCourseExe.php", $(this).serialize() , function(data){
  	if(data.res == "exist")
  	{
  		Swal.fire(
  			'Already Exist',
  			data.course_name.toUpperCase() + ' Already Exist',
  			'error'
  		)
  	}
  	else if(data.res == "success")
  	{
  		Swal.fire(
  			'Success',
  			data.course_name.toUpperCase() + ' Successfully Added',
  			'success'
  		)
          // $('#course_name').val("");
          refreshDiv();
            setTimeout(function(){ 
                $('#body').load(document.URL);
             }, 2000);
  	}
  },'json')
  return false;
});
// Assign Course To Teacher
$(document).on("submit","#assignCourseFrm" , function(){
  $.post("query/assigncourse.php", $(this).serialize() , function(data){
    if(data.res == "exist")
    {
      Swal.fire(
        'Already Exist',
       ' Already Exist',
        'error'
      )
    }
    else if(data.res == "success")
    {
      Swal.fire(
        'Success',
        ' Successfully Added',
        'success'
      )
          // $('#course_name').val("");
          refreshDiv();
            setTimeout(function(){ 
                $('#body').load(document.URL);
             }, 2000);
    }
  },'json')
  return false;
});
//Get Course based on Program
$(document).on("change","#program" , function(){
        var pid = $(this).val();
        $.ajax({
            url: 'query/getCoursesExe.php',
            type: 'post',
            data: {pid:pid},
            dataType: 'json',
            success:function(response){
                
                var len = response.length;

                $("#course").empty();
                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    
                    $("#course").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
    });

$(document).on("change","#atprogram" , function(){
        var pid = $(this).val();
        $.ajax({
            url: 'query/getCoursesExe.php',
            type: 'post',
            data: {pid:pid},
            dataType: 'json',
            success:function(response){
                
                var len = response.length;

                $("#atcourse").empty();
                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    
                    $("#atcourse").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
    });

//Get Course based on Program
$(document).on("change","#Program" , function(){
        var pid = $(this).val();
        $.ajax({
            url: 'query/getCoursesExe.php',
            type: 'post',
            data: {pid:pid},
            dataType: 'json',
            success:function(response){
                
                var len = response.length;

                $("#Course").empty();
                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    
                    $("#Course").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
    });
//Get Course based on Program
$(document).on("change","#qprogram" , function(){
        var pid = $(this).val();
        $.ajax({
            url: 'query/getCoursesExe.php',
            type: 'post',
            data: {pid:pid},
            dataType: 'json',
            success:function(response){
                
                var len = response.length;

                $("#qcourse").empty();
                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    
                    $("#qcourse").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
    });

//Get Course based on Program
$(document).on("change","#sprogram" , function(){
        var pid = $(this).val();
        $.ajax({
            url: 'query/getCoursesExe.php',
            type: 'post',
            data: {pid:pid},
            dataType: 'json',
            success:function(response){
                
                var len = response.length;

                $("#scourse").empty();
                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    
                    $("#scourse").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
    });

//Get Questions based on Program and course
$(document).on("change","#scourse" , function(){
        var cid = $(this).val();
        var pid = $('#sprogram').val();
        $.ajax({
            url: 'query/searchquestion.php',
            type: 'post',
            data: {pid:pid,cid:cid},
            dataType: 'html',
            success:function(response){
                
                $('#searchresult').html(response);
            }
        });
    });

$(document).on("click","#scourse" , function(){
        var cid = $(this).val();
        var pid = $('#sprogram').val();
        $.ajax({
            url: 'query/searchquestion.php',
            type: 'post',
           data: {pid:pid,cid:cid},
            dataType: 'html',
            success:function(response){
                
                $('#searchresult').html(response);
            }
        });
    });

// Update Course
$(document).on("submit","#updateCourseFrm" , function(){
  $.post("query/updateCourseExe.php", $(this).serialize() , function(data){
     if(data.res == "success")
     {
        Swal.fire(
            'Success',
            'Selected course has been successfully updated!',
            'success'
          )
          refreshDiv();
     }
  },'json')
  return false;
});
// Update Program
$(document).on("submit","#updateProgramFrm" , function(){
  $.post("query/updateProgramExe.php", $(this).serialize() , function(data){
     if(data.res == "success")
     {
        Swal.fire(
            'Success',
            'Selected course has been successfully updated!',
            'success'
          )
          refreshDiv();
     }
  },'json')
  return false;
});
// Delete Department
$(document).on("click", "#deleteDepartment", function(e){
    e.preventDefault();
    var id = $(this).data("id");
     $.ajax({
      type : "post",
      url : "query/deleteDepartmentExe.php",
      dataType : "json",  
      data : {id:id},
      cache : false,
      success : function(data){
        if(data.res == "success")
        {
          Swal.fire(
            'Success',
            'Selected Course successfully deleted',
            'success'
          )
          refreshDiv();
        }
      },
      error : function(xhr, ErrorStatus, error){
        console.log(status.error);
      }

    });
    
   

    return false;
  });

// Delete Program
$(document).on("click", "#deleteProgram", function(e){
    e.preventDefault();
    var id = $(this).data("id");
     $.ajax({
      type : "post",
      url : "query/deleteProgramExe.php",
      dataType : "json",  
      data : {id:id},
      cache : false,
      success : function(data){
        if(data.res == "success")
        {
          Swal.fire(
            'Success',
            'Selected Program successfully deleted',
            'success'
          )
          refreshDiv();
        }
      },
      error : function(xhr, ErrorStatus, error){
        console.log(status.error);
      }

    });
    
   

    return false;
  });


// Delete Course
$(document).on("click", "#deleteCourse", function(e){
    e.preventDefault();
    var id = $(this).data("id");
     $.ajax({
      type : "post",
      url : "query/deleteCourseExe.php",
      dataType : "json",  
      data : {id:id},
      cache : false,
      success : function(data){
        if(data.res == "success")
        {
          Swal.fire(
            'Success',
            'Selected Course successfully deleted',
            'success'
          )
          refreshDiv();
        }
      },
      error : function(xhr, ErrorStatus, error){
        console.log(status.error);
      }

    });
    
   

    return false;
  });
// Delete Course Assign
$(document).on("click", "#deleteCourseAssign", function(e){
    e.preventDefault();
    var id = $(this).data("id");
     $.ajax({
      type : "post",
      url : "query/deleteCourseAssignExe.php",
      dataType : "json",  
      data : {id:id},
      cache : false,
      success : function(data){
        if(data.res == "success")
        {
          Swal.fire(
            'Success',
            'Selected Course successfully Removed',
            'success'
          )
          refreshDiv();
        }
      },
      error : function(xhr, ErrorStatus, error){
        console.log(status.error);
      }

    });
    
   

    return false;
  });

// Delete Exam
$(document).on("click", "#deleteExam", function(e){
    e.preventDefault();
    var id = $(this).data("id");
     $.ajax({
      type : "post",
      url : "query/deleteExamExe.php",
      dataType : "json",  
      data : {id:id},
      cache : false,
      success : function(data){
        if(data.res == "success")
        {
          Swal.fire(
            'Success',
            'Selected Course successfully deleted',
            'success'
          )
          refreshDiv();
        }
      },
      error : function(xhr, ErrorStatus, error){
        console.log(status.error);
      }

    });
    
   

    return false;
  });



// Add Exam 
$(document).on("submit","#addExamFrm" , function(){
  $.post("query/addExamExe.php", $(this).serialize() , function(data){
    if(data.res == "noSelectedCourse")
   {
      Swal.fire(
          'No Course',
          'Please select course',
          'error'
       )
    }
    if(data.res == "noSelectedTime")
   {
      Swal.fire(
          'No Time Limit',
          'Please select time limit',
          'error'
       )
    }
    if(data.res == "noDisplayLimit")
   {
      Swal.fire(
          'No Display Limit',
          'Please input question display limit',
          'error'
       )
    }

     else if(data.res == "exist")
    {
      Swal.fire(
        'Already Exist',
        data.examTitle.toUpperCase() + '<br>Already Exist',
        'error'
      )
    }
    else if(data.res == "success")
    {
      Swal.fire(
        'Success',
        data.examTitle.toUpperCase() + '<br>Successfully Added',
        'success'
      )
          $('#addExamFrm')[0].reset();
          $('#course_name').val("");
          refreshDiv();
    }
  },'json')
  return false;
});



// Update Exam 
$(document).on("submit","#updateExamFrm" , function(){
  $.post("query/updateExamExe.php", $(this).serialize() , function(data){
     alert("hello");
    if(data.res == "success")
    {
      Swal.fire(
          'Update Successfully',
          data.msg + ' <br>are now successfully updated',
          'success'
       )
          refreshDiv();
    }
    else if(data.res == "failed")
    {
      Swal.fire(
        "Something's went wrong!",
         'Somethings went wrong',
        'error'
      )
    }
   
  },'json')
  return false;
});

// Update Question
$(document).on("submit","#updateQuestionFrm" , function(){
  $.post("query/updateQuestionExe.php", $(this).serialize() , function(data){
     if(data.res == "success")
     {
        Swal.fire(
            'Success',
            'Selected question has been successfully updated!',
            'success'
          )
          refreshDiv();
     }
  },'json')
  return false;
});

// Remove Question
$(document).on("click", "#removeQuestion", function(e){
    e.preventDefault();
    var id = $(this).data("id");
     $.ajax({
      type : "post",
      url : "query/removeQuestionExe.php",
      dataType : "json",  
      data : {id:id},
      cache : false,
      success : function(data){
        if(data.res == "success")
        {
          Swal.fire(
            'Deleted Success',
            'Selected question successfully removed',
            'success'
          )
          refreshDiv();
        }
      },
      error : function(xhr, ErrorStatus, error){
        console.log(status.error);
      }

    });
    
   

    return false;
  });


// Delete Question
$(document).on("click", "#deleteQuestion", function(e){
    e.preventDefault();
    var id = $(this).data("id");
     $.ajax({
      type : "post",
      url : "query/deleteQuestionExe.php",
      dataType : "json",  
      data : {id:id},
      cache : false,
      success : function(data){
        if(data.res == "success")
        {
          Swal.fire(
            'Deleted Success',
            'Selected question successfully deleted',
            'success'
          )
          refreshDiv();
        }
      },
      error : function(xhr, ErrorStatus, error){
        console.log(status.error);
      }

    });
    
   

    return false;
  });


// Add Question to question bank
$(document).on("submit","#addQuestionFrm" , function(){
  $.post("query/addQuestionExe.php", $(this).serialize() , function(data){
    if(data.res == "exist")
    {
      Swal.fire(
          'Already Exist',
          data.msg + ' question <br>already exist in this exam',
          'error'
       )
    }
    else if(data.res == "success")
    {
      Swal.fire(
        'Success',
         data.msg + ' question <br>Successfully added',
        'success'
      )
        $('#addQuestionFrm')[0].reset();
        refreshDiv();
    }
   
  },'json')
  return false;
});

// Add Question  to exams
$(document).on("submit","#addQuestionFrmExe" , function(){
  $.post("query/addQuestion.php", $(this).serialize() , function(data){
    if(data.res == "exist")
    {
      Swal.fire(
          'Already Exist',
          data.msg + ' question <br>already exist in this exam',
          'error'
       )
    }
    else if(data.res == "success")
    {
      Swal.fire(
        'Success',
         data.msg + ' question <br>Successfully added',
        'success'
      )
        $('#addQuestionFrmExe')[0].reset();
        refreshDiv();
    }
   
  },'json')
  return false;
});


// Add Examinee
$(document).on("submit","#addExamineeFrm" , function(){
  $.post("query/addExamineeExe.php", $(this).serialize() , function(data){
    if(data.res == "noGender")
    {
      Swal.fire(
          'No Gender',
          'Please select gender',
          'error'
       )
    }
    else if(data.res == "noCourse")
    {
      Swal.fire(
          'No Course',
          'Please select course',
          'error'
       )
    }
    else if(data.res == "noLevel")
    {
      Swal.fire(
          'No Year Level',
          'Please select year level',
          'error'
       )
    }
    else if(data.res == "fullnameExist")
    {
      Swal.fire(
          'Fullname Already Exist',
          data.msg + ' are already exist',
          'error'
       )
    }
    else if(data.res == "emailExist")
    {
      Swal.fire(
          'Email Already Exist',
          data.msg + ' are already exist',
          'error'
       )
    }
    else if(data.res == "success")
    {
      Swal.fire(
          'Success',
          data.msg + ' are now successfully added',
          'success'
       )
        refreshDiv();
        $('#addExamineeFrm')[0].reset();
    }
    else if(data.res == "failed")
    {
      Swal.fire(
          "Something's Went Wrong",
          '',
          'error'
       )
    }


    
  },'json')
  return false;
});



// Update Examinee
$(document).on("submit","#updateExamineeFrm" , function(){
  $.post("query/updateExamineeExe.php", $(this).serialize() , function(data){
     if(data.res == "success")
     {
        Swal.fire(
            'Success',
            data.exFullname + ' <br>has been successfully updated!',
            'success'
          )
          refreshDiv();
     }
  },'json')
  return false;
});


function refreshDiv()
{
  $('#tableList').load(document.URL +  ' #tableList');
  $('#refreshData').load(document.URL +  ' #refreshData');

}

//get questions
$(document).on("change","#Category" , function(){
        var ctid = $(this).val();
        var pgid = $('#programId').val();
        var crid = $('#courseId').val();
        $.ajax({
            url: 'query/getquestion.php',
            type: 'post',
           data: {pgid:pgid,ctid:ctid,crid:crid},
            dataType: 'html',
            success:function(response){
                
                $('#searchresults').html(response);
            }
        });
    });
