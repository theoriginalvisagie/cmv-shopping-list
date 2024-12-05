<?php require APPROOT . '/views/includes/header.php'; ?>

<a href="<?php echo URLROOT; ?>" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
      <div class="card card-body bg-light mt-5">
        <h2>Edit List</h2>
        <form action="<?php echo URLROOT; ?>/lists/edit/<?php echo $data['id']; ?>" method="post">
          <div class="form-group">
              <label>List Name:<sup>*</sup></label>
              <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>" placeholder="Name your list...">
              <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
          </div>    
          <div class="form-group">
              <label>Description:<sup>*</sup></label>
              <input type="text" name="description" class="form-control form-control-lg <?php echo (!empty($data['description_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['description']; ?>" placeholder="Add a description...">
              <span class="invalid-feedback"><?php echo $data['description_err']; ?></span>
          </div>
<!--          <div class="form-group">-->
<!--              <label>Done:</label>-->
<!--              --><?php
//                $yesActive = "";
//                $noActive = "";
//
//                if($data['checked'] == "Yes"){
//                  $yesActive = "active";
//                }else if($data['checked'] == "No"){
//                  $noActive = "active";
//                }
//              ?>
<!--              <select name="checked" id="checked">-->
<!--                <option value="Yes" --><?php //echo $yesActive; ?><!-- >Yes</option>-->
<!--                <option value="No" --><?php //echo $noActive; ?><!-- >No</option>-->
<!--              </select>-->
<!--          </div>-->
          <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
          <input type="submit" class="btn btn-success" value="Update">
        </form>
      </div>
<?php require APPROOT . '/views/includes/footer.php'; ?>
