<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>MANAGE PROGRAM</div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Program List
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th class="text-left pl-4">Program Name</th>
                                <th class="text-center" width="20%">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selProgram = $conn->query("SELECT * FROM program_tbl ORDER BY prog_id DESC ");
                                if($selProgram->rowCount() > 0)
                                {
                                    while ($selProgramRow = $selProgram->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <td class="pl-4">
                                                <?php echo $selProgramRow['prog_name']; ?>
                                            </td>
                                            <td class="text-center">
                                                <a rel="facebox" style="text-decoration: none;" class="btn btn-primary btn-sm" href="facebox_modal/updateProgram.php?id=<?php echo $selProgramRow['prog_id']; ?>" id="updateProgram">Update</a>
                                             <button type="button" id="deleteProgram" data-id='<?php echo $selProgramRow['prog_id']; ?>'  class="btn btn-danger btn-sm">Delete</button>
                                            </td>
                                        </tr>

                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="2">
                                        <h3 class="p-3">No Course Found</h3>
                                      </td>
                                    </tr>
                                <?php }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      
        
</div>
         
