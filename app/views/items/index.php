<?php require APPROOT . '/views/includes/header.php'; ?>
  <?php flash('item_message'); ?>
  <div class="row mb-3">
    <div class="col-md-6">
    <h1>Shopping Items</h1>
    </div>
    <div class="col-md-6">
      <a class="btn btn-primary pull-right" href="<?php echo URLROOT; ?>/items/add"><i class="fa fa-pencil" aria-hidden="true"></i> Add Post</a>
    </div>
  </div>
  
  <ul class="list-group list-group-flush">
  <?php foreach($data as $key=>$value) : ?>
      <li class="list-group-item align-items-center">
        <input type='checkbox' name='checkbox_<?php echo $value['id']?>' >
        <label for='checkbox_<?php echo $value['id']?>' class="card-title"><?php echo $value['item']." x ". $value['qty'] ?></label>
        <div class="tools">
          <button class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
          <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
        </div>
      </li>
  <?php endforeach; ?>
  </ul>
<?php require APPROOT . '/views/includes/footer.php'; ?>