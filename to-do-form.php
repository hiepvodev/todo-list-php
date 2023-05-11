<?php
    include('create-to-do.php');
    include('edit-to-do.php');
    include('update-to-do.php');

    $editWork = editWorkById();
    $createWork = createWork();

    if(isset($_GET['edit-work'])) {
        $createWork = updateWorkById();

    }

    if(isset($_GET['delete-work'])) {
        $createWork = deleteWorkById();
    }

?>
<form method="post">   
    <p class="text-success">
      <?php 
          echo $createWork['success']??'';
      ?>
    </p> 
    <p class="text-danger">
        <?php 
         if($createWork && $createWork['workMsg'] && count($createWork['workMsg']) > 0){
          echo $createWork['workMsg'][0]??''; 
         }
         ?>
    </p>
 
    <div class="mb-3">
      <label for="work_name" class="form-label">Work Name</label>
      <input id="work_name" type="text" class="form-control" placeholder="Enter Something..." name="work_name" value="<?php echo $editWork['work_name']??''; ?>">
    </div>
    <div class="row mb-3">
      <div class="col">
        <label for="start_date" class="form-label">Starting Date</label>
        <input id="start_date" name="start_date" type="text" class="default" value="<?php echo $editWork['start_date']??''; ?>"/>
      </div>
      <div class="col">
        <label for="end_date" class="form-label">Ending Date</label>
        <input id="end_date" name="end_date" type="text" class="default" value="<?php echo $editWork['end_date']??''; ?>"/>
      </div>
    </div>
    <div class="form-status">
      <label class="form-check-label" for="inlineCheckbox1">Status</label>
      <div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="status" id="planning" value="1"<?php if(!$editWork) echo 'checked' ?> <?php if($editWork && $editWork['status'] == '1') echo 'checked'; ?>>
          <label class="form-check-label" for="planning">
            Planning
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="status" id="doing" value="2" <?php if($editWork && $editWork['status'] == '2') echo 'checked'; ?>>
          <label class="form-check-label" for="doing">
            Doing
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="status" id="complete" value="3" <?php if($editWork && $editWork['status'] == '3') echo 'checked'; ?>>
          <label class="form-check-label" for="complete">
            Complete
          </label>
        </div>
      </div>
    </div>
    
    <button type="submit" class="btn btn-primary mt-3" name="<?php echo count($editWork)?'update':'add'; ?>"><?php echo count($editWork)?'update':'add'; ?></button>

</form>
