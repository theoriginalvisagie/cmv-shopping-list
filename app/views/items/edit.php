<?php require APPROOT . '/views/includes/header.php'; ?>

<a href="<?php echo URLROOT; ?>" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
      <div class="card card-body bg-light mt-5">
        <h2>Edit Item</h2>
        <p>Create a post with this form</p>
        <form action="<?php echo URLROOT; ?>/items/edit/<?php echo $data['id']; ?>" method="post">
          <div class="form-group">
              <label>Item:<sup>*</sup></label>
              <input type="text" name="item" class="form-control form-control-lg <?php echo (!empty($data['item_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['item']; ?>" placeholder="Add an item...">
              <span class="invalid-feedback"><?php echo $data['item_err']; ?></span>
          </div>    
          <div class="form-group">
              <label>Quantity:<sup>*</sup></label>
              <input type="number" name="quantity" class="form-control form-control-lg <?php echo (!empty($data['qty_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['qty']; ?>" placeholder="Add quantity of item...">
              <span class="invalid-feedback"><?php echo $data['qty_err']; ?></span>
          </div>
          <div class="form-group">
              <label>Done:</label>
              <?php
                $yesActive = "";
                $noActive = "";

                if($data['checked'] == "Yes"){
                  $yesActive = "active";
                }else if($data['checked'] == "No"){
                  $noActive = "active";
                }
              ?>
              <select name="checked" id="checked">
                <option value="Yes" <?php echo $yesActive; ?> >Yes</option>
                <option value="No" <?php echo $noActive; ?> >No</option>
              </select>
          </div>
          <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
          <input type="submit" class="btn btn-success" value="Update">
        </form>
      </div>
<?php require APPROOT . '/views/includes/footer.php'; ?>
