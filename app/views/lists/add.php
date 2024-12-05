<?php require APPROOT . '/views/includes/header.php'; ?>
<a href="<?php echo URLROOT; ?>" class="btn btn-light"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
<div class="card card-body bg-light mt-5">
    <h2>Add List</h2>
    <p>Add a list to group your items</p>
    <form action="<?php echo URLROOT; ?>/lists/add" method="post">
        <div class="form-group">
            <label>List Name:<sup>*</sup></label>
            <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>" placeholder="Add a list...">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
        </div>
        <div class="form-group">
            <label>Description:<sup>*</sup></label>
            <input type="number" name="description" class="form-control form-control-lg <?php echo (!empty($data['description_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['description']; ?>" placeholder="Add a description...">
            <span class="invalid-feedback"><?php echo $data['description_err']; ?></span>
        </div>
        <input type="submit" class="btn btn-success" value="Submit">
    </form>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>
