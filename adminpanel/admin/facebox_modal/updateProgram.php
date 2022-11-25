
<?php 
  include("../../../conn.php");
  $id = $_GET['id'];
 
  $selCourse = $conn->query("SELECT * FROM program_tbl WHERE prog_id ='$id' ")->fetch(PDO::FETCH_ASSOC);

 ?>

<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;Update Program Name ( <?php echo strtoupper($selCourse['prog_name']); ?> )</i></legend>
  <div class="col-md-12 mt-4">
<form method="post" id="updateProgramFrm">
     <div class="form-group">
      <legend>Program Name</legend>
    <input type="hidden" name="program_id" value="<?php echo $id; ?>">
    <input type="" name="newProgramName" class="form-control" required="" value="<?php echo $selCourse['prog_name']; ?>" >
  </div>
  <div class="form-group" align="right">
    <button type="submit" class="btn btn-sm btn-primary">Update Now</button>
  </div>
</form>
  </div>
</fieldset>







